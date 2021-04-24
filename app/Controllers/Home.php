<?php
namespace app\Controllers;
use \Ninja\DatabaseTable;
use \Ninja\Authentication;

class Home {
	private $usersTable;
    private $projectsTable;
	private $authentication;

	public function __construct(Authentication $authentication, DatabaseTable $usersTable, DatabaseTable $projectsTable) {
		$this->authentication = $authentication;
		$this->usersTable = $usersTable;
		$this->projectsTable = $projectsTable;

	}

	/***
	 * index page for home route
	 */
	public function index() {
		$title = "Home";
		
		if(!($user = $this->authentication->getUser()))
		{
			header('Location: login');
		}

		$sql = "SELECT name FROM ".$this->projectsTable->getTableName()." WHERE owner_id=?";
		$projects = $this->projectsTable->customQuery($sql,$user->getUserId());
		$pageContent = loadTemplate("home/index",['projects'=>$projects]);
		return [
			'title'=>$title,
			'pageContent'=>$pageContent
		];
	}

}