<?php

abstract class BaseController {


    protected $db;

    public function __construct($db) {
        $this->db = $db;
        session_start();
    }

    /*
     * First param: the name of the html template, found in /app/templates/.
     * Second param: optional parameter, $data that will be available on the page.
     */
    public function html(string $template, array $data = null) {
        ob_start();
        include(__DIR__ . '/../app/templates/' . $template . '.php');
        $html = ob_get_clean();
        return $html;
    }

    function redirect($url, $permanent = false)
    {
        header('Location: ' . $url, true, $permanent ? 301 : 302);
        exit();
    }
}