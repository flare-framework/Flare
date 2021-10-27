<?php

use JetBrains\PhpStorm\NoReturn;

function View($file , $data=null){
    return require_once (CONFIG.'/../View/'.$file.'.php') ;
}
function View2($filePath, $variables = array(), $print = true)
{
    $output = NULL;
    $filePath= CONFIG.'/../View/'.$filePath.'.php' ;
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
function redirect($url='') {
    $url=$_ENV['URL'].$url ;
    header("location: " . $url);
   return exit();
}
function autoLoader ($class ) {
    $dir='/../Flare_Libraries/';
    // don't us namespace in Global_Libraries !!!!!!!
    if (file_exists(__DIR__.$dir.$class.'.php')) {
        $parts = explode('\\', $class);
        require_once __DIR__.$dir.$class.'.php';
    }
}
function lautoLoader ($class ) {
    $dir='/../Libraries/';
    $classNameParts = explode('\\', $class);
    $class = end($classNameParts);
    if (file_exists(__DIR__.$dir.$class.'.php')) {
        $parts = explode('\\', $class);
        require_once __DIR__.$dir.$class.'.php';
    }
}
function shortlink($params,$length=59){
    $params= trim($params);
    $params = str_replace(' ', '-',$params);
    return mb_substr($params, 0, $length, "utf-8") ;
}
function debug( $value ) {
    switch ( $type = gettype( $value ) ) {

        case $type === 'object' || $type === 'array':
            $ret = print_r( $value, true );
            break;

        case $type === 'NULL':
            $ret = $type;
            break;

        default:
            $ret = '[ ' . $type . ' ] ' . htmlentities( $value );

    }

    echo '<style>
  .php-debug {
    position: fixed;
    overflow: auto;
    z-index: 99999;
    left: 0;
    bottom: 0;
    width: 100%;
    max-height: 80%;
    padding: 1em 2em;
    background: #292929;
    color: #fff;
    opacity: 0.92;
  }
  .php-debug::before {
    content: "[DEBUG]";
    position: fixed;
    bottom: 0;
    right: 0;
    color: #00f2ff;
    padding: 1em 2em;
  }
  </style>';
    if (isset($ret)){
        echo '<button onclick="myFunction()">[DEBUG]</button>' . '<div id="myDEBUG"><pre class="php-debug">'.$ret . '</pre></div>';
        echo '<script>
function myFunction() {
  var x = document.getElementById("myDEBUG");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
</script>
';

    }

}

