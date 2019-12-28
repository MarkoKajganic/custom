<?php

namespace App\Controllers;


class UserController extends \BaseController {

    public function registerForm() {
        return $this->html('register-form');
    }

    public function register() {
        $email = $_POST['email'];
        $name = $_POST['name'];
        $password = $_POST['psw'];
        $password_repeat =$_POST['psw-repeat'];

        if(empty($email)||empty($name)||empty($password)||empty($password_repeat)) {
            return $this->html('register-form', ['message' => 'Must set all fields!']);
        }

        if($password !== $password_repeat) {
            return $this->html('register-form', ['message' => 'Passwords must match!']);
        }
        $password = password_hash($password, PASSWORD_BCRYPT);

        $query = "INSERT INTO users (`email`, `name`, `password`) VALUES ('$email', '$name', '$password')";

        $result = $this->db->query($query);

        if($result) {
            session_start();
            $_SESSION['user'] = ['email' => $email, 'name' => $name];
        }

        return $this->html('test', ['test' => 'test string', 'test2' => 'test-string', 'users' => $result]);
    }

    public function loginForm() {
        return $this->html('login-form');
    }

    public function login() {
        $email = $_POST['email'];
        $password = $_POST['psw'];

        $query = "SELECT `name`, `password` FROM users WHERE email = '$email'";
        $result = $this->db->query($query)->fetch_array();
//        var_dump($result);

        if(password_verify($password, $result['password'])) {
            session_start();
            $_SESSION['user'] = ['email' => $email, 'name' => $result['name']];
        }

        return $this->html('test', ['test' => 'test string', 'test2' => 'test-string', 'users' => $result]);
    }
}