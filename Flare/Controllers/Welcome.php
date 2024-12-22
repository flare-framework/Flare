<?php
namespace Controllers ;
class Welcome extends BaseController
{
    public function index()
    {
        global $db,$session ;
        $data2 =['welcome' => 'Flare Framework '  ];
        $data = ['content'=> View('Layout/welcome',$data2) ,'title' => 'Flare Framework ' ] ;
        return View2('Layout/w-layout',$data) ;
    }
    public function lattev()
    {
        $data = ['content'=> '','title' => 'Flare Framework ','welcome' => 'Flare Framework ' ] ;
        return $this->latte('page/welcome',$data) ;
    }
}
