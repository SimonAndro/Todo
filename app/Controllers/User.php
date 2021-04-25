<?php
namespace app\Controllers;
use \Ninja\DatabaseTable;
use \Ninja\Authentication;

class User {
	private $usersTable;

	public function __construct(Authentication $authentication, DatabaseTable $usersTable) {
		$this->authentication = $authentication;
		$this->usersTable = $usersTable;
	}

	/***
	 * index page for home route
	 */
	public function index() {

		return "user info";
	}

    public function login(){
		return loadTemplate("user/login");
    }

	public function loginPost()
	{
		if($val = $_POST['val'])
		{
			$username = $val['username'];
			$password = $val['password'];

			if($this->authentication->login($username, $password))
			{
				header("Location: home");
			}
		}
		
	}

	public function register()
	{
		return loadTemplate("user/register");
	}

}