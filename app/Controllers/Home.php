<?php
namespace app\Controllers;
use \Ninja\DatabaseTable;
use \Ninja\Authentication;

class Home {
	private $usersTable;
    private $projectsTable;
	private $authentication;

	private $user;

	public function __construct(Authentication $authentication, DatabaseTable $usersTable, DatabaseTable $projectsTable) {
		$this->authentication = $authentication;
		$this->usersTable = $usersTable;
		$this->projectsTable = $projectsTable;

		$this->user = $this->authentication->getUser();

	}

	/***
	 * index page for home route
	 */
	public function index() {
		$title = "Home";

		$sql = "SELECT name FROM ".$this->projectsTable->getTableName()." WHERE owner_id=?";
		$projects = $this->projectsTable->customQuery($sql,$this->user->getUserId());
		$pageContent = loadTemplate("home/index",['projects'=>$projects]);
		return [
			'title'=>$title,
			'pageContent'=>$pageContent
		];
	}

}