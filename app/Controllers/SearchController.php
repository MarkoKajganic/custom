<?php


namespace App\Controllers;


class SearchController extends \BaseController
{
    public function index() {
        return $this->html('search');
    }

    public function search() {

        $keyword = $_POST['keyword'];

        $query = "SELECT `name`, `email` FROM users WHERE `name` LIKE '%$keyword%' OR `email` LIKE '%$keyword%'";
//        echo $query;
//        exit();

        $results = $this->db->query($query)->fetch_all(MYSQLI_ASSOC);
//        var_dump($results);
//        exit();
//        foreach ($results as $result) {
//            echo $result['name'];
//        }
//        exit();

        return $this->html('search-results', ['results' => $results]);
    }
}