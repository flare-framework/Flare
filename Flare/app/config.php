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
if ($CONF_SPA === true && ($_SERVER['HTTP_X_REQUESTED_WITH'] ?? '') === 'Flare-SPA') {
    function extractSpaPart($html, $startTag, $endTag): string
    {
    $start = strpos($html, $startTag);
    $end   = strpos($html, $endTag);
    if ($start === false || $end === false) return '';

    $start += strlen($startTag);
    return substr($html, $start, $end - $start);
    }

    $output = ob_get_clean();

    $title   = extractSpaPart($output, '<!-- [SPA-TITLE] -->',   '<!-- [/SPA-TITLE] -->');
    $sidebar = extractSpaPart($output, '<!-- [SPA-SIDEBAR] -->', '<!-- [/SPA-SIDEBAR] -->');
    $content = extractSpaPart($output, '<!-- [SPA-CONTENT] -->', '<!-- [/SPA-CONTENT] -->');

    $jsonOutput = [
        'title'   => trim(strip_tags($title)),
        'sidebar' => $sidebar,
        'content' => $content,
    ];

    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($jsonOutput);
    exit;
}
