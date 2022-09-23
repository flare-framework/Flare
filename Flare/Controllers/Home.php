<?php
namespace Controllers ;
class Home extends BaseController
{
    public function index()
    {
        // global $db,$session ;
        $data2 =['welcome' => 'Flare Framework '  ];
        $data = ['title' => 'Flare Framework ' ] ;
        $data['content'] =  View('Layout/welcome',$data2);
        echo View('/Layout/w-layout',$data) ;
      //  dump($data);
    }
    public function lattev()
    {
        $data = ['content'=> '','title' => 'Flare Framework ','welcome' => 'Flare Framework ' ] ;
        return $this->latte('page/welcome',$data) ;
    }
    public function debugbar()
    {
        $data = ['title' => 'Flare Framework debugbar' ] ;
        $data['content'] ='<p align="left" style="color: #00f2ff"><i>If you don\'t see Debugbar, check the URL and Dev_set. If there is no Debugbar folder in the \\public\\debugbar\\ path, use the mega_copy function inside the app.php file</i><br data-mce-bogus="1"></p>';
        return View2('/Layout/w-layout',$data) ;
    }
    public function alldata() {
        echo View('home') ;
    }
    public function alldata2() {
        // Array with names
        $a[] = "Anna";
        $a[] = "Brittany";
        $a[] = "Cinderella";
        $a[] = "Diana";
        $a[] = "Eva";
        $a[] = "Fiona";
        $a[] = "Gunda";
        $a[] = "Hege";
        $a[] = "Inga";
        $a[] = "Johanna";
        $a[] = "Kitty";
        $a[] = "Linda";
        $a[] = "Nina";
        $a[] = "Ophelia";
        $a[] = "Petunia";
        $a[] = "Amanda";
        $a[] = "Raquel";
        $a[] = "Cindy";
        $a[] = "Doris";
        $a[] = "Eve";
        $a[] = "Evita";
        $a[] = "Sunniva";
        $a[] = "Tove";
        $a[] = "Unni";
        $a[] = "Violet";
        $a[] = "Liza";
        $a[] = "Elizabeth";
        $a[] = "Ellen";
        $a[] = "Wenche";
        $a[] = "Vicky";
        // get the q parameter from URL
        $q = $_REQUEST["q"];

        $hint = "";
        // lookup all hints from array if $q is different from ""
        if ($q !== "") {
            $q = strtolower($q);
            $len=strlen($q);
            foreach($a as $name) {
                if (stristr($q, substr($name, 0, $len))) {
                    if ($hint === "") {
                        $hint = $name;
                    } else {
                        $hint .= ", $name";
                    }
                }
            }
        }
        // Output "no suggestion" if no hint was found or output correct values
        echo $hint === "" ? "no suggestion" : $hint;
    //   dump($_POST) ;
    }
}
