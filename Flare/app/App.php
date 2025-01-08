<?php
require  __DIR__.'/../../vendor/autoload.php';
use Odan\Session\PhpSession;
use Symfony\Component\ErrorHandler\Debug;
use Symfony\Component\ErrorHandler\DebugClassLoader;
use DebugBar\StandardDebugBar;
ini_set('memory_limit', '2G');
ini_set('max_execution_time', '600');
date_default_timezone_set('Asia/Tehran');
$session = new PhpSession();
require_once (CONFIG.'/../Global_Functions/Flare.php') ;
$CONF_SPA=false;
$Deb_set=true;
$Config=[
    'URL'      => 'http://localhost/myapp/public' ,
    'DB_HOST'  => 'localhost',
    'DB_NAME'  => 'Flare_Db',
    'DB_USER'  => 'root',
    'DB_PASS'  => '',
    'DB_PREFIX'=>'',
    'DB_PORT'  =>3306,
];
    if (isset($Config['URL'])){
        $Config['URL'] = (substr($Config['URL'], -2) === '//') ? substr($Config['URL'], 0, -1) : rtrim($Config['URL'], '/') . '/';
        define("URL", $Config['URL']);
        }else{
        define("URL", url());
    }
    if ($Deb_set==true){
        Debug::enable();
        DebugClassLoader::enable();
        ob_start();
        $debugbar = new StandardDebugBar();
       // $debugbarResources = PUPATH.'../vendor/maximebf/debugbar/src/DebugBar/Resources';
       // mega_copy($debugbarResources, PUPATH.'DebugBar');
        $debugbarRenderer = $debugbar->getJavascriptRenderer(URL.'/DebugBar');
    }else{
        $Deb_set=false ;
    }
spl_autoload_register('CautoLoader');
if (isset($Config['DB_NAME'])){
    $db= new MysqliDb(Array (
        'host' => $Config['DB_HOST'],
        'username' => $Config['DB_USER'],
        'password' => $Config['DB_PASS'],
        'db'=> $Config['DB_NAME'],
        'port' =>((isset( $Config['DB_PORT']))? $Config['DB_PORT']:3306)  ,
        'prefix' => ((isset( $Config['DB_PREFIX']))? $Config['DB_PREFIX']:'')  ,
        'charset' => 'utf8'));
    unset($Config) ;
}
dbObject::autoload(CONFIG."/../Models");

