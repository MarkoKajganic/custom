<?php


namespace App\Controllers;


class SearchController extends \BaseController
{
    /*
     * Send user to search page. If a user isn't logged in, redirect to the login page.
     */
    public function index() {
        $this->middleware();
        return $this->html('search');
    }

    /*
     * Lookup users for the given value. Match name and email. Partial strings allowed.
     */
    public function search() {
        $this->middleware();
        $keyword = $_POST['keyword'];
        $query = "SELECT `name`, `email` FROM users WHERE `name` LIKE '%$keyword%' OR `email` LIKE '%$keyword%'";
        $results = $this->db->query($query)->fetch_all(MYSQLI_ASSOC);

        return $this->html('search-results', ['results' => $results]);
    }

    private function middleware() {
        if(!isset($_SESSION['user'])) {
            $this->redirect('/login-form');
        }
    }
}