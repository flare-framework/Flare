<?php
namespace Controllers;
//use Respect\Validation\Validator as v;
//use Email ;
//use Libraries\Captcha ;
use Latte\Engine;
use Latte\Essential\RawPhpExtension as d;
class BaseController
{
    public function latte( $template ,$params=array(),$output=false){
        $latte = new Engine ;
        $latte->addExtension(new d);
        $latte->setTempDirectory(__DIR__.'/../View/latte/temp');
        $latte->setAutoRefresh();
        $latte->render(__DIR__.'/../View/latte/'.$template.'.latte', $params);
        if ($output!=false){
            return  $latte->renderToString($template.'.latte', $params);
        }
    }
}
