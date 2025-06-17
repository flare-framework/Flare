<?php
require_once __DIR__.'/App.php' ;
require_once __DIR__.'/Router.php' ;
if ($Deb_set === true) {
        $DebugerGetContents  = ob_get_contents();
        ob_end_clean();
        if (!empty($db)){
            foreach ($db->trace as $trace) {
                $debugbar['queries']->addMessage($trace[0]);
            }
        }
    $DebugerGetContents= str_replace('</head>', $debugbarRenderer->renderHead().'</head>', $DebugerGetContents);
        echo str_replace('</body>',$debugbarRenderer->render().'</body>', $DebugerGetContents);
    $CONF_SPA=false;
}
if ($CONF_SPA === true) {
    $DebugerGetContents  = ob_get_contents();
    ob_end_clean();
    echo str_replace('</body>',spa().'</body>',$DebugerGetContents);
}
