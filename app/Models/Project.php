<?php
namespace app\Models;

class Project{

	public $id;
	public $name;
	public $owner_id;
	public $created_at;


	public function __construct() {
	
	}

	public function getProjectId(){
		return $this->id;
	}

	public function getOwnerId(){
		return $this->owner_id;
	}

	public function getProjectName(){
		return $this->name;
	}

}