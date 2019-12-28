<?php

abstract class BaseController {

    protected $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function html(string $template, array $data = null) {
        ob_start();
        include(__DIR__ . '/../app/templates/' . $template . '.php');
        $html = ob_get_clean();
        return $html;
    }
}