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
		$error = array();
		if($val = $_POST['val'])
		{
			$username = $val['email'];
			$password = $val['password'];

			if($this->authentication->login($username, $password))
			{
				header("Location: home");
				die();
			}

			$error[] = "Invalid login Credentials";
		}

		return loadTemplate("user/login",[
			"error"=>$error
		]);
		
	}

	public function logout(){
		$this->authentication->logout();
		return loadTemplate("user/login");
    }

	public function register()
	{
		return loadTemplate("user/register");
	}

	public function registerPost()
	{
		$error = array();
		if($val = $_POST['val'])
		{
			$email= strtolower($val['email']);
			$psw1 = $val['password'];
			$psw2 = $val['passwordRepeat'];
			if($psw1 !== $psw2)
			{
				$error[] = "passwords don't match";
			}else{
				$psw = password_hash($psw1, PASSWORD_DEFAULT);
			}

			if(!filter_var($email, FILTER_VALIDATE_EMAIL))
			{
				$error[] = "invalid email address";
			}

			$sql = "SELECT * FROM ".$this->usersTable->getTableName()." WHERE email=?";
			if (count($this->usersTable->customQuery($sql,$email)) > 0)
			{
				$error[] = 'Submitted email address is already registered';
			}

			if(empty($error))
			{
				$user['email'] =  $email;
				$user['password'] = $psw;
				$user['created_at'] = time();
				$this->usersTable->save($user);

				return loadTemplate("user/login",[
					"message"=>"Registration Successful, Login to Continue"
					]);
			}
		}
		return loadTemplate("user/register",[
			"error"=>$error
		]);
	}
}