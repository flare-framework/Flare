<?php
require  __DIR__.'/../../vendor/autoload.php';
use Odan\Session\PhpSession;
use Symfony\Component\ErrorHandler\Debug;
use Symfony\Component\ErrorHandler\DebugClassLoader;
use DebugBar\StandardDebugBar;
$DotenvDir=((php_sapi_name() == "cli")?'../../':'../');
$dotenv = Dotenv\Dotenv::createImmutable( $DotenvDir);unset($DotenvDir);
$dotenv->safeLoad();
ini_set('memory_limit', '2G');
ini_set('max_execution_time', '600');
date_default_timezone_set('Asia/Tehran');
$session = new PhpSession();
require_once (CONFIG.'/../Global_Functions/Flare.php') ;
if (isset($_ENV['Dev_set'])) {
    if (isset($_ENV['URL'])){
        define("URL", $_ENV['URL']);
        }else{
        define("URL", url());
    }
    if ($_ENV['Dev_set']==='on'){
        $Dev_set=$_ENV['Dev_set'] ;
        Debug::enable();
        DebugClassLoader::enable();
        ob_start();
        $debugbar = new StandardDebugBar();
       // $debugbarResources = PUPATH.'../vendor/maximebf/debugbar/src/DebugBar/Resources';
      //  mega_copy($debugbarResources, PUPATH.'DebugBar');
        $debugbarRenderer = $debugbar->getJavascriptRenderer(URL.'/DebugBar');
    }else{
        $Dev_set=false ;
    }
}
//spl_autoload_register('autoLoader');
spl_autoload_register('CautoLoader');
if (isset($_ENV['db'])){
    $db= new MysqliDb(Array (
        'host' => $_ENV['DB_HOST'],
        'username' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASS'],
        'db'=> $_ENV['DB_NAME'],
        'port' =>((isset( $_ENV['DB_PORT']))? $_ENV['DB_PORT']:3306)  ,
        'prefix' => ((isset( $_ENV['DB_PREFIX']))? $_ENV['DB_PREFIX']:'')  ,
        'charset' => 'utf8'));
    unset($_ENV,$dotenv) ;
}
dbObject::autoload(CONFIG."/../Models");

