<?php
namespace Cli;

require_once __DIR__.'/../app/cli-config.php' ;
class CorenJob
{
 public function coren1(){
     $day_of_week = getdate();
     $day_of_week = $day_of_week ["wday"] ;// 0-6
     $cdh = date('h');
     $cdm = date('i');
     $cdT = (int)$cdh*60 +(int)$cdm ;//one day = 1440

     echo $day_of_week.'-----'.$cdT.PUPATH  ;
 }
}
if (php_sapi_name() == 'cli') {
    $obj = new CorenJob();
    $obj->coren1();
}
