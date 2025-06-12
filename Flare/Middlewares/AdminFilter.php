<?php

namespace Middlewares;

class AdminFilter
{


    public function getIpAddress(): string
    {
        $headers = [
            'HTTP_CLIENT_IP',
            'HTTP_X_FORWARDED_FOR',
            'REMOTE_ADDR',
        ];

        foreach ($headers as $key) {
            if (!empty($_SERVER[$key])) {
                $ipList = explode(',', $_SERVER[$key]);
                foreach ($ipList as $ip) {
                    $cleanIp = trim($ip);
                    if (filter_var($cleanIp, FILTER_VALIDATE_IP)) {
                        return $cleanIp;
                    }
                }
            }
        }

        return '0.0.0.0';
    }
    public static function StartSsession()
    {
        global $session ;
        if (!$session->isStarted()) {
            $session->start();
        }
    }
   public static function filter()
    {
    if (empty($_SESSION['id'])){
        die("You don't have access".'<hr><a href="'.URL.'">'.URL.' </a>'  );}
    }
    public static function spaFalse()
    {
        global $CONF_SPA ;
        $CONF_SPA=false;
    }
    public  function BannedRate_limit():void
    {

        $ip = $this->getIpAddress();
        $userAgent = $_SERVER['HTTP_USER_AGENT'] ?? '';

        // لیست IP های ربات فیسبوک
        $bannedIps = [ //facebook_ip's
            '57.141.0.2', '57.141.0.3', '57.141.0.4', '57.141.0.5', '57.141.0.6',
            '57.141.0.7', '57.141.0.9', '57.141.0.10', '57.141.0.11', '57.141.0.13',
            '57.141.0.14', '57.141.0.16', '57.141.0.17', '57.141.0.18', '57.141.0.19',
            '57.141.0.20', '57.141.0.21', '57.141.0.22', '57.141.0.23', '57.141.0.24',
            '57.141.0.25', '57.141.0.26', '57.141.0.27', '57.141.0.28', '57.141.0.29',
            '57.141.0.30' ,'57.141.0.15','57.141.0.8','	57.141.0.1','57.141.0.12'
        ];

        // بلاک ربات فیسبوک یا IP ممنوعه
        if (in_array($ip, $bannedIps) || stripos($userAgent, 'facebookexternalhit') !== false) {
            http_response_code(403);
            exit('دسترسی شما مسدود شده است.');
            die();
        }

        // تنظیمات محدودیت
        $maxRequestsPerMinute = 30;
        $key = 'rate_limit_' . md5($ip);
        $minute = floor(time() / 60);
        $tmpDir = sys_get_temp_dir();
        $tmpFile = "$tmpDir/$key.json";

        $data = ['minute' => $minute, 'count' => 0];

        // جلوگیری از برخورد درخواست هم‌زمان با قفل فایل
        $fp = @fopen($tmpFile, 'c+');
        if ($fp === false) {
            // اگر فایل باز نشد، بدون محدودیت ادامه بده
            return;
        }

        flock($fp, LOCK_EX);

        // خواندن اطلاعات فعلی
        $contents = stream_get_contents($fp);
        if ($contents !== false && !empty($contents)) {
            $parsed = json_decode($contents, true);
            if (is_array($parsed) && isset($parsed['minute'], $parsed['count'])) {
                $data = $parsed;
            }
        }

        // بروزرسانی شمارنده
        if ($data['minute'] === $minute) {
            $data['count'] += 1;
        } else {
            $data['minute'] = $minute;
            $data['count'] = 1;
        }

        // اگر بیش از حد مجاز باشد، بلاک کن
        if ($data['count'] > $maxRequestsPerMinute) {
            flock($fp, LOCK_UN);
            fclose($fp);
            http_response_code(429);
            exit('شما بیش از حد مجاز درخواست ارسال کرده‌اید. لطفاً بعداً تلاش کنید.');
        }

        // بازنویسی اطلاعات
        ftruncate($fp, 0);
        rewind($fp);
        fwrite($fp, json_encode($data));
        fflush($fp);
        flock($fp, LOCK_UN);
        fclose($fp);

        // بررسی حجم فایل‌های دایرکتوری موقت (اختیاری)
        $maxTmpSizeMB = 5;
        $totalSize = 0;
        foreach (glob($tmpDir . '/rate_limit_*.json') as $file) {
            $totalSize += filesize($file);
            if ($totalSize > $maxTmpSizeMB * 1024 * 1024) {
                @unlink($file); // حذف فایل برای سبک کردن
            }
        }
    }





}
