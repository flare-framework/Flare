<?php

class jdf
{
    public static function gregorianToJalali($gy, $gm, $gd)
    {
        $g_d_m = [0, 31, 59, 90, 120, 151, 181, 212, 243, 273, 304, 334];
        $gy2 = ($gm > 2) ? ($gy + 1) : $gy;
        $days = 355666 + (365 * $gy) + (int)(($gy2 + 3) / 4)
            - (int)(($gy2 + 99) / 100) + (int)(($gy2 + 399) / 400)
            + $gd + $g_d_m[$gm - 1];

        $jy = -1595 + (33 * (int)($days / 12053));
        $days %= 12053;
        $jy += 4 * (int)($days / 1461);
        $days %= 1461;

        if ($days > 365) {
            $jy += (int)(($days - 1) / 365);
            $days = ($days - 1) % 365;
        }

        $jm = ($days < 186) ? 1 + (int)($days / 31) : 7 + (int)(($days - 186) / 30);
        $jd = 1 + (($days < 186) ? ($days % 31) : (($days - 186) % 30));
        return [$jy, $jm, $jd];
    }

    public static function jdate($format = 'Y/m/d H:i:s', $timestamp = null)
    {
        if (is_null($timestamp)) {
            $timestamp = time();
        }

        // پشتیبانی از strftime-style formats
        $format = self::convertStrftimeToDateFormat($format);

        $date = getdate($timestamp);
        list($jy, $jm, $jd) = self::gregorianToJalali($date['year'], $date['mon'], $date['mday']);

        $h24 = $date['hours'];
        $h12 = ($h24 % 12) ? ($h24 % 12) : 12;
        $am_pm = ($h24 < 12) ? 'am' : 'pm';
        $AM_PM = strtoupper($am_pm);

        $trans = [
            'Y' => $jy,
            'y' => substr($jy, -2),
            'm' => str_pad($jm, 2, '0', STR_PAD_LEFT),
            'n' => $jm,
            'd' => str_pad($jd, 2, '0', STR_PAD_LEFT),
            'j' => $jd,
            'H' => str_pad($h24, 2, '0', STR_PAD_LEFT),
            'h' => str_pad($h12, 2, '0', STR_PAD_LEFT),
            'i' => str_pad($date['minutes'], 2, '0', STR_PAD_LEFT),
            's' => str_pad($date['seconds'], 2, '0', STR_PAD_LEFT),
            'a' => $am_pm,
            'A' => $AM_PM,
            'l' => self::getPersianDayName(date('w', $timestamp)),
            'D' => self::getPersianDayNameShort(date('w', $timestamp)),
            'F' => self::getPersianMonthName($jm),
            'M' => self::getPersianMonthNameShort($jm),
            'w' => date('w', $timestamp),
            'N' => date('N', $timestamp),
            'z' => date('z', $timestamp),
            'W' => date('W', $timestamp),
            't' => date('t', $timestamp),
            'L' => date('L', $timestamp),
            'U' => $timestamp
        ];

        return preg_replace_callback('/([A-Za-z])/', function ($match) use ($trans) {
            return $trans[$match[0]] ?? $match[0];
        }, $format);
    }

    // تبدیل فرمت strftime به date
    private static function convertStrftimeToDateFormat($format)
    {
        $map = [
            '%a' => 'D', '%A' => 'l',
            '%b' => 'M', '%B' => 'F',
            '%c' => 'Y/m/d H:i:s',
            '%C' => 'Y', // Century
            '%d' => 'd', '%D' => 'm/d/y',
            '%e' => 'j', '%F' => 'Y-m-d',
            '%H' => 'H', '%I' => 'h',
            '%j' => 'z', '%k' => 'G',
            '%l' => 'g', '%m' => 'm',
            '%M' => 'i', '%n' => "\n",
            '%p' => 'A', '%P' => 'a',
            '%r' => 'h:i:s A', '%R' => 'H:i',
            '%S' => 's', '%T' => 'H:i:s',
            '%u' => 'N', '%U' => 'W',
            '%V' => 'W', '%w' => 'w',
            '%x' => 'Y/m/d', '%X' => 'H:i:s',
            '%y' => 'y', '%Y' => 'Y',
            '%Z' => 'T', '%z' => 'O',
            '%%' => '%'
        ];

        return strtr($format, $map);
    }

    private static function getPersianDayName($index)
    {
        $days = ['یکشنبه','دوشنبه','سه‌شنبه','چهارشنبه','پنجشنبه','جمعه','شنبه'];
        return $days[$index];
    }

    private static function getPersianDayNameShort($index)
    {
        $days = ['ی', 'د', 'س', 'چ', 'پ', 'ج', 'ش'];
        return $days[$index];
    }

    private static function getPersianMonthName($month)
    {
        $months = [
            1 => 'فروردین', 2 => 'اردیبهشت', 3 => 'خرداد',
            4 => 'تیر', 5 => 'مرداد', 6 => 'شهریور',
            7 => 'مهر', 8 => 'آبان', 9 => 'آذر',
            10 => 'دی', 11 => 'بهمن', 12 => 'اسفند'
        ];
        return $months[$month];
    }

    private static function getPersianMonthNameShort($month)
    {
        $months = [
            1 => 'فرو', 2 => 'ارد', 3 => 'خرد',
            4 => 'تیر', 5 => 'مرد', 6 => 'شهر',
            7 => 'مهر', 8 => 'آبا', 9 => 'آذر',
            10 => 'دی', 11 => 'بهم', 12 => 'اسف'
        ];
        return $months[$month];
    }
}
