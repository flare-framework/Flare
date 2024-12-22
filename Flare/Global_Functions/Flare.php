<?php
function View($filePath, $variables = array(), $print = false){
    $output = NULL;
    $filePath= CONFIG.'../View/'.$filePath.'.php' ;
    if(file_exists($filePath)){
        extract($variables);
        ob_start();
        include $filePath;
        $output = ob_get_clean();
    }
    if ($print) {
        print $output;
    }
    return $output;
}
function View2($file , $data=null){
    if (!empty($data)){
        extract($data);
    }
    require_once (CONFIG.'../View/'.$file.'.php') ;
}
function redirect($url='') {
    $url=$_ENV['URL'].$url ;
    header("location: " . $url);
    return exit();
}
function CautoLoader ($class) {
    $dirs=['Flare_Libraries','Libraries','Controllers','Middlewares'];
    foreach ($dirs as $dir){
        $dir="/../$dir/";
        $classNameParts = explode('\\', $class);
        $class = end($classNameParts);
        if (file_exists(__DIR__.$dir.$class.'.php')) {
            $parts = explode('\\', $class);
            require_once __DIR__.$dir.$class.'.php';
        }
    }
}
function url($string='',$x=false):string{
    $url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    if ($x) {return substr($url, 0, strpos($url, "?").$string);}
    return $url.$string;
}
function mega_copy($source, $destination) {
    if (!is_dir($destination)) {
        mkdir($destination, 0755, true);
    }
    $files = scandir($source);
    foreach ($files as $file) {
        if ($file !== '.' && $file !== '..') {
            $sourceFile = $source . '/' . $file;
            $destinationFile = $destination . '/' . $file;
            if (is_dir($sourceFile)) {
                mega_copy($sourceFile, $destinationFile);
            } else {
                copy($sourceFile, $destinationFile);
            }
        }
    }
}
function spa(){
    return '<script type="text/javascript" n:syntax="double" src="'.URL.'FlareFunctions.js"></script>' ;
}
