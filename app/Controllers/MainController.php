<?php


namespace App\Controllers;


class MainController extends \BaseController
{
    /*
     * Send user to main page.
     */
    public function index() {
        return $this->html('index');
    }
}