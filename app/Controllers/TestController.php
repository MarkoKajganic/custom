<?php

namespace App\Controllers;

class TestController extends \BaseController {
    public function index($p1, $p2) {
        return $this->json([
            'param1' => $p1,
            'param2' => $p2
        ]);
    }
}