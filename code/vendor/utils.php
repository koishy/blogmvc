<?php 
function _preq($ZmlsZUluY2x1ZGVQYXRo, $______params) {
        extract($______params);
        require($ZmlsZUluY2x1ZGVQYXRo);
    }
function view($name, $params = [])
{


    /**
    *
    *   ZmlsZUluY2x1ZGVQYXRo is base64 for fileIncludePath
    *
    */    
    
    ob_start();
    _preq($_SERVER['DOCUMENT_ROOT'].'/resources/views/'.trim($name, '/').'.view.php', $params);
    return ob_get_clean();
}
