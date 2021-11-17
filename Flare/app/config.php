<?php
declare(strict_types=1);
require  '../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable( '../');
$dotenv->safeLoad();
use Tracy\Debugger;
use Odan\Session\PhpSession;
$session = new PhpSession();

if (isset($_ENV['Dev_set'])) {
    if ($_ENV['Dev_set']=='development'){
        Debugger::DEVELOPMENT ;
        Debugger::$dumpTheme = 'dark';
        Debugger::$editor ;
        Debugger::enable();
    }elseif ($_ENV['Dev_set']=='production'){

    }else{
        echo 'Dev_set'.' Not set !' ;
    }
}
require_once (CONFIG.'../Global_Functions/Flare.php') ;
spl_autoload_register('autoLoader');
if (isset($_ENV['DB_HOST'])){
    if (isset( $_ENV['DB_PREFIX'])){$_FE_prefix =$_ENV['DB_PREFIX'];}else{$_FE_prefix="";}
    $db= new MysqliDb(Array (
        'host' => $_ENV['DB_HOST'],
        'username' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASS'],
        'db'=> $_ENV['DB_NAME'],
        'port' => 3306,
        'prefix' =>  $_FE_prefix ,
        'charset' => 'utf8'));
}
dbObject::autoload(CONFIG."../Models");
spl_autoload_register('lautoLoader');
require_once 'Router.php' ;