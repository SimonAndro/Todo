<?php
namespace app\Controllers;
use \Ninja\DatabaseTable;
use \Ninja\Authentication;

class Project {
	private $usersTable;
    private $tasksTable;
    private $projectsTable;

	public function __construct(Authentication $authentication, DatabaseTable $usersTable,DatabaseTable $tasksTable,DatabaseTable $projectsTable) {
		$this->authentication = $authentication;
		$this->usersTable = $usersTable;
        $this->tasksTable = $tasksTable;
        $this->projectsTable = $projectsTable;
	}

	/***
	 * index page for home route
	 */
	public function index() {
		return "project controller";
	}

    public function projectPost()
    {
		if($val = $_POST['val'])
		{
			if($name = $val['projectName'])
			{
				$project['owner_id'] = $
				$project['name'] = $name;
				$project['created_at'] = time();
				$projectsTable->save($project);
			}
			return [
				'ajaxResponse'=>$val['ajax']
			];
		}  
    }
}