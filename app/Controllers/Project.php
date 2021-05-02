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
		$title = "Project";

		$pageContent = loadTemplate("project/index");
		return [
			'title'=>$title,
			'pageContent'=>$pageContent
		];
	}

    public function projectPost()
    {
		if($val = $_POST['val'])
		{
			if(($name = $val['projectName']) && ($user = $this->authentication->getUser()) )
			{
				$project['owner_id'] = $user->getUserId();
				$project['name'] = $name;
				$project['created_at'] = time();
				$projectsTable->save($project);
			}

			$pageContent = loadTemplate("home/index");
			return [
				'pageContent'=> $pageContent,
				'ajaxResponse'=>$val['ajax']
			];
		} 
		return [
			'msg'=>'unknown',
			'ajaxResponse'=>$val['ajax']
		]; 
    }
}