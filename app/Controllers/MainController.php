<?php


namespace App\Controllers;


class MainController extends \BaseController
{
    public function index() {
        return $this->html('index');
    }
}