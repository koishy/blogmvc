<?php


class Router
{
    /**
    *
    *   @param t_url defines template url, e.g. /project/{id}
    *
    */
    static public $found = false;
    static function is_param($st)
    {
        $st = str_split($st);
        return $st[0] == '{' && $st[sizeof($st)-1] == '}';
    }
    static function get_param($st)
    {
        $st = str_split($st);
        $result = "";
        $isParam = false;
        foreach ($st as $char) {
            if ($char == '{')
            {
                $isParam = true;
            }
            else if ($char == '}')
            {
                return $result;
            }
            else
            {
                $result .= $char;
            }
        }
    }
    static function url_params($t_url, $url)
    {
        $t_url = trim($t_url, '/');
        $url = trim($url, '/');
        if ($t_url == $url)
        {
            return [
                'matches' => true,
                'params' => []
            ];
        }
        $t_url = explode('/', $t_url);
        $url = explode('/', $url);
        if (sizeof($t_url) != sizeof($url))
        {
            return [
                'matches' => false,
                'params' => []
            ];
        }
        $params = [];

        foreach ($t_url as $key => $piece) {
            if ($piece == $url[$key] || Router::is_param($piece))
            {
                $params[Router::get_param($piece)] = $url[$key];
            }
            else
            {
                return ['params' => [], 'matches' => false];
            }
        }
        return ['params' => $params, 'matches' => true];
    }
    static function get($url, $callback)
    {
        if (Router::$found || $_SERVER['REQUEST_METHOD'] != 'GET') return;
        $url_results = Router::url_params($url, $_SERVER['REQUEST_URI']);
        if ($url_results['matches'])
        {
            echo $callback($url_results['params']);
            Router::$found = true;
        }
    }
    static function post($url, $callback)
    {
        if (Router::$found || $_SERVER['REQUEST_METHOD'] != 'POST') return;
        $url_results = Router::url_params($url, $_SERVER['REQUEST_URI']);
        if ($url_results['matches'])
        {
            echo $callback($url_results['params']);
            Router::$found = true;
        }
    }
    static function handleRest()
    {
        if (!Router::$found)
        {
            echo "Error 404";
        }
    }
}