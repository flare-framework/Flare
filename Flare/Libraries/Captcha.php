<?php   namespace Libraries  ;

class Captcha {
    // (A) PRIME THE CAPTCHA - GENERATE RANDOM STRING IN SESSION
    function prime ($length=8) {
        $char = "abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $max = strlen($char) - 1;
        $random = "";
        for ($i=0; $i<=$length; $i++) {
            $random .= substr($char, rand(0, $max), 1);
        }
        $_SESSION['captcha'] = $random;
    }

    // (B) DRAW THE CAPTCHA IMAGE
//$font=base_url('arial.ttf');
 //   function draw ($output=1, $width=300, $height=100, $fontsize=24, $font="C:\Windows\Fonts\orial.ttf") {
    function draw ($output=1, $width=300, $height=100, $fontsize=24, $font=PUPATH.'Orial.ttf') {
        // (B1) OOPS
       // base_url()
        if (!isset($_SESSION['captcha'])) { throw new Exception("CAPTCHA NOT PRIMED"); }

        // (B2) CREATE BLANK IMAGE
        $captcha = imagecreatetruecolor($width, $height);

        // (B3) FUNKY BACKGROUND IMAGE
        $background = "captcha-back.jpg";
        list($bx, $by) = getimagesize($background);
        if ($bx-$width<0) { $bx = 0; }
        else { $bx = rand(0, $bx-$width); }
        if ($by-$height<0) { $by = 0; }
        else { $by = rand(0, $by-$height); }
        $background = imagecreatefromjpeg($background);
        imagecopy($captcha, $background, 0, 0, $bx, $by, $width, $height);

        // (B4) THE TEXT SIZE
        $text_size = imagettfbbox($fontsize, 0, $font, $_SESSION['captcha']);
        $text_width = max([$text_size[2], $text_size[4]]) - min([$text_size[0], $text_size[6]]);
        $text_height = max([$text_size[5], $text_size[7]]) - min([$text_size[1], $text_size[3]]);

        // (B5) CENTERING THE TEXT BLOCK
        $centerX = CEIL(($width - $text_width) / 2);
        $centerX = $centerX<0 ? 0 : $centerX;
        $centerX = CEIL(($height - $text_height) / 2);
        $centerY = $centerX<0 ? 0 : $centerX;

        // (B6) RANDOM OFFSET POSITION OF THE TEXT + COLOR
        if (rand(0,1)) { $centerX -= rand(0,55); }
        else { $centerX += rand(0,55); }
        $colornow = imagecolorallocate($captcha, rand(120,255), rand(120,255), rand(120,255)); // Random bright color
        imagettftext($captcha, $fontsize, rand(-10,10), $centerX, $centerY, $colornow, $font, $_SESSION['captcha']);

        // (B7) OUTPUT AS JPEG IMAGE
        if ($output==0) {
            header('Content-type: image/png');
            imagejpeg($captcha);
            imagedestroy($captcha);
        }

        // (B8) OUTPUT AS BASE 64 ENCODED HTML IMG TAG
        else {
            ob_start();
            imagejpeg($captcha);
            $ob = base64_encode(ob_get_clean());
            echo "<img src='data:image/jpeg;base64,$ob'/>";
        }
    }

    // (C) VERIFY CAPTCHA
    function verify ($check) {
        // (C1) CAPTCHA NOT SET!
//        if (!isset($_SESSION['captcha'])) { throw new Exception("CAPTCHA NOT PRIMED"); }
        if (!isset($_SESSION['captcha'])) {
           $khata="CAPTCHA NOT PRIMED";
        }

        // (C2) CHECK
        if(isset($_SESSION['captcha'])){
            $_SESSION['captcha']= strtolower( $_SESSION['captcha'] ) ;
            $check= strtolower( $check ) ;
            if ($check == $_SESSION['captcha']) {
                unset($_SESSION['captcha']);
                return true;
            } else {
                return false;
            }
        }

    }
}

// (D) CREATE CAPTCHA OBJECT
 // Remove if session already started
