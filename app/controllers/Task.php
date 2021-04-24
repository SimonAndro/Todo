<?php
namespace app\Controllers;
use \Ninja\DatabaseTable;
use \Ninja\Authentication;

class Task {
	private $usersTable;
    private $tasksTable;
    private $projectsTable;

	public function __construct(DatabaseTable $usersTable,DatabaseTable $tasksTable,DatabaseTable $projectsTable) {
		$this->usersTable = $usersTable;
        $this->tasksTable = $tasksTable;
        $this->projectsTable = $projectsTable;
	}

	/***
	 * index page for home route
	 */
	public function index() {
		return "task controller";
	}

    public function taskPost()
    {
        return "taskPost";
    }
}