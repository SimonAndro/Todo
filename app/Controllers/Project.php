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
	 * index page for project route
	 */
	public function index() {
		$title = "Project";
		if(isset($_GET['id']) and ($projectId = trim($_GET['id'])) and $projectId!="" )
		{
			$projectId = $_GET['id'];
			$project = $this->projectsTable->findById($projectId);
			//Todo: load tasks for this projects
			$pageContent = loadTemplate("project/index",['project'=>$project]);
			return [
				'title'=>$title,
				'pageContent'=>$pageContent
			];
		}

		return[
			'error'=>true
		];
	}

    public function projectPost()
    {

		if($val = $_POST['val'])
		{
			if(($name = $val['projectName']) && ($user = $this->authentication->getUser()) )
			{
				if(count($this->projectsTable->find("name",$name))>0)
				{
					return [
						'msg'=>"success",
						'notify'=>true,
						'notifMsg'=>"Project with this name exists",
						'notifMsgType'=>"info",
						'ajaxResponse'=>$val['ajax']
					];
				}else{
					$project['owner_id'] = $user->getUserId();
					$project['name'] = $name;
					$project['created_at'] = time();
					$this->projectsTable->save($project);
				}
				
			}
			return [
				'msg'=>"success",
				'action'=>'reload',
				'ajaxResponse'=>$val['ajax']
			];
		} 
		return [
			'msg'=>'fail',
			'ajaxResponse'=>$val['ajax'],
		]; 
    }
}