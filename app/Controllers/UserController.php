<?php

namespace App\Controllers;

class UserController extends \BaseController {

    public function show($userId, $responseType) {
        $user = [
            'name' => 'Vladislav',
            'lname' => 'Mosnak',
            'id' => $userId
        ];

        return $responseType == 'xml' ? $this->xml($user) : $this->json($user);
    }

    public function all() {
        return $this->json(['allUsers' => []]);
    }

    public function index() {
//        echo 'hi';
//        var_dump($this->db);
        $query = "SELECT * FROM new_table";
        $result = $this->db->query($query)->fetch_all(MYSQLI_ASSOC);

//        var_dump($result[1]);
        return $this->html('test', ['test' => 'test string', 'test2' => 'test-string', 'users' => $result]);
    }

    public function registerForm() {
        return $this->html('register-form');
    }

    public function register() {

    }
}