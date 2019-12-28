<?php

namespace App\Controllers;


class UserController extends \BaseController {

    /*
     * Show the form for user registration.
     */
    public function registerForm() {
        return $this->html('register-form');
    }

    /*
     * Get and check form parameters, if any required not defined, return to registration form with an error message.
     * After that, check if the inserted password and the password repetition match.
     * If all these requirements pass, insert the new user into the database. Afterwards, login the newly registered user.
     */
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
            $_SESSION['user'] = ['email' => $email, 'name' => $name];
        }

        return $this->html('index', ['greet' => true]);
    }

    /*
     * Display the form for login, no params.
     */
    public function loginForm() {
        return $this->html('login-form');
    }

    /*
     * User login - first check if both email and password have been submitted. If not, go back and display an error.
     * Grab the first user with matching email. Check if the password hash from DB matches the given password.
     * If it matches, redirect to index and greet the user. Otherwise, redirect the user back and display an error message.s
     */
    public function login() {
        $email = $_POST['email'];
        $password = $_POST['psw'];

        if(empty($email)||empty($password)) {
            return $this->html('login-form', ['message' => 'You must enter email and password too!']);
        }

        $query = "SELECT `name`, `password` FROM users WHERE email = '$email'";
        $result = $this->db->query($query)->fetch_array();

        if(password_verify($password, $result['password'])) {
            $_SESSION['user'] = ['email' => $email, 'name' => $result['name']];
            return $this->html('index', ['greet' => true]);
        }

        return $this->html('login-form', ['message' => 'Invalid username or password.']);
    }

    /*
     * Removes the user from the session.
     */
    public function logout() {
        if(isset($_SESSION['user'])) {
            unset($_SESSION['user']);
        }

        $this->redirect('/');
    }
}