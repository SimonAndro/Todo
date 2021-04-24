<?php
namespace app\Controllers;
use \Ninja\DatabaseTable;
use \Ninja\Authentication;

class Home {
	private $usersTable;
    private $projectsTable;

	public function __construct(Authentication $authentication, DatabaseTable $usersTable, DatabaseTable $projectsTable) {
		$this->authentication = $authentication;
		$this->usersTable = $usersTable;
		$this->projectsTable = $projectsTable;
	}

	/***
	 * index page for home route
	 */
	public function index() {
		return "home controller";
	}

}