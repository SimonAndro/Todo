<?php
namespace app\Models;

class User {

	public $id;
	public $email;
	public $password;
    public $name;
	public $created_at;

	public function __construct() {
	
	}

	public function getUserId(){
		return $this->id;
	}

    public function getUserEmail(){
		return $this->email;
	}

	public function getUserName(){
		return $this->name;
	}

}