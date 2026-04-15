<?php

class Core {
    
    public function run() {
        $url = '/';
        $url_get = filter_input(INPUT_GET, "url");
        if(isset($url_get)) {
            $url .= $url_get;
        }
        $params = array();        
        if(!empty($url) && $url != '/') {            
            $url = explode('/', $url);
            array_shift($url);
            $currentController = $url[0].'Controller';
            array_shift($url);            
            if(isset($url[0]) && !empty($url[0])) {
                $currentAction = $url[0];
                array_shift($url);
            }
            else {
                $currentAction = 'index';
            }            
            if(count($url) > 0) {
                $params = $url;
            }            
        }
        else {
            $currentController = 'ContatoController';
            $currentAction = 'index';
        }        
        $c = new $currentController();
        call_user_func_array(array($c, $currentAction), $params);        
    }
    
}
