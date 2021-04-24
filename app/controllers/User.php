<?php
namespace app\Controllers;
use \Ninja\DatabaseTable;
use \Ninja\Authentication;

class User {
	private $usersTable;

	public function __construct(DatabaseTable $usersTable) {
		$this->usersTable = $usersTable;
	}

	/***
	 * index page for home route
	 */
	public function index() {
		return "user login form";
	}

    public function login(){
        return "login form submission";
    }

}