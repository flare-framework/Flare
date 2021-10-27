<?php
namespace Controllers;
use Buki\Router\Http\Controller;
use Respect\Validation\Validator as v;
use League\Plates\Engine ;
//use Email ;
//use Libraries\Captcha ;
class EFTEKHARI extends Controller
{
    public function index()
    {

        global $db,$session ;
        $templates = new Engine(CONFIG.'../View/Plates');

            /*

             dump();
                dump($DB);
                 if you have a session exception in dump method  use this
                debug($templates ) ;

                $q= 'CREATE TABLE `first_table` (
                        `id` int(11) NOT NULL AUTO_INCREMENT,
                        `title` varchar(255) NOT NULL,
                        `url` varchar(255) NOT NULL,
                        `sorting` int(11) NOT NULL,
                        `created_at` datetime NOT NULL,
                        `update_at` datetime NOT NULL,
                        PRIMARY KEY (`id`),
                        UNIQUE KEY `idx_first_table_url` (`url`)
                    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;' ;

                $results =  $DB->rawQuery ($q);

               $session->start();
            //for use email use this
            $Email =new Email() ;
                $Email->Email() ;
        */

        //        $session->start();
        //        $PHPCAP =new Captcha() ;
                //  debug($ff);









        $data = ['welcome' => 'Flare Framework ' ] ;
        return   $templates->render('welcome',$data);
                // or use
              //  return View('Welcome/Welcome') ;

    }
}
