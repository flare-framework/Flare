<?php
require  __DIR__.'/../../vendor/autoload.php';
use Odan\Session\PhpSession;
use Symfony\Component\ErrorHandler\Debug;
use Symfony\Component\ErrorHandler\DebugClassLoader;
$dotenv = Dotenv\Dotenv::createImmutable( '../');
$dotenv->safeLoad();
$session = new PhpSession();
if (isset($_ENV['Dev_set'])) {
    if ($_ENV['Dev_set']=='development'){
        Debug::enable();
        DebugClassLoader::enable();
    }
}else{
    echo '.env Dev_set :'.' Not set !' ;
}
require_once (CONFIG.'/../Global_Functions/Flare.php') ;
spl_autoload_register('autoLoader');
if (isset($_ENV['URL'])){
    define("URL", $_ENV['URL']);
     (isset( $_ENV['DB_PREFIX'])) ? $_FE_prefix =$_ENV['DB_PREFIX']:$_FE_prefix="" ;
    $db= new MysqliDb(Array (
        'host' => $_ENV['DB_HOST'],
        'username' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASS'],
        'db'=> $_ENV['DB_NAME'],
        'port' => 3306,
        'prefix' =>  $_FE_prefix ,
        'charset' => 'utf8'));
    unset($_ENV,$dotenv,$_FE_prefix) ;
}
dbObject::autoload(CONFIG."/../Models");
spl_autoload_register('lautoLoader');
spl_autoload_register('CautoLoader');
require_once __DIR__.'/Router.php' ;
