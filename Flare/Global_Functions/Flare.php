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
    header('Location: ' . filter_var(URL.$url, FILTER_SANITIZE_URL));
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
function url($appendQuery = '', $stripQuery = false)
{
    $host = filter_var($_SERVER['HTTP_HOST'], FILTER_SANITIZE_URL);
    $requestUri = strtok($_SERVER['REQUEST_URI'], "\n\r");
    $scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? 'https' : 'http';
    $url = $scheme . '://' . $host . $requestUri;
    if ($stripQuery) {
        $url = strtok($url, '?');
    }
    if (!empty($appendQuery)) {
        $url .= $appendQuery;
    }
    return $url;
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
function check_input($input = null, $text = null, $method = 'AUTO', $type = 'value') {
    $value = null;
    if ($method === 'POST') {
        $value = $_POST[$input] ?? null;
    } elseif ($method === 'GET') {
        $value = $_GET[$input] ?? null;
    } else { // AUTO
        $value = $_POST[$input] ?? $_GET[$input] ?? null;
    }
    if (is_null($value)) {
        return '';
    }
    if (!is_null($text)) {
        if ($value == $text || $text === 'checked' || $text === 'selected') {
            return $type === 'selected' ? 'selected' : 'checked';
        } else {
            return '';
        }
    }
    return htmlspecialchars($value);
}
function json_response($data = [], $status = 200)
{
    http_response_code($status);
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($data);
    exit();
}
function sanitizeInput($input) {
    $input = preg_replace("/[^a-zA-Z0-9آ-ی۰-۹\s@._-]/u", "", $input);
    $input = trim($input);
    $input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');

    return $input;
}
