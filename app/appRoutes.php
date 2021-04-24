<?php
namespace app;

class appRoutes implements \Ninja\Routes {
    private $authentication;
	private $usersTable;
    private $projectsTable;
    private $tasksTable;

	public function __construct() {
		include __DIR__ . '/includes/DatabaseConnection.php';

        $this->usersTable = new \Ninja\DatabaseTable($pdo, 'user', 'id', '\app\Models\User');
        $this->authentication = new \Ninja\Authentication($this->usersTable, 'email', 'password');
        $this->tasksTable = new \Ninja\DatabaseTable($pdo, 'post', 'id', '\app\Models\Post',[&$this->usersTable]);
        $this->projectsTable = new \Ninja\DatabaseTable($pdo, 'project', 'id', '\app\Models\Project',[&$this->usersTable,&$this->tasksTable]);
	
	}

	public function getRoutes(): array {
        $userController = new \app\Controllers\User($this->usersTable);
		$homeController = new \app\Controllers\Home($this->authentication,$this->usersTable,$this->projectsTable);
        $projectController = new \app\Controllers\Project($this->usersTable,$this->tasksTable,$this->projectsTable);
        $taskController = new \app\Controllers\Task($this->usersTable,$this->tasksTable,$this->projectsTable);
        $dashboardController = new \app\Controllers\Dashboard($this->usersTable,$this->tasksTable,$this->projectsTable);

		$routes = [
			'user-register' => [
				'GET' => [
					'controller' => $userController,
					'action' => 'index'
				],
				'POST' => [
					'controller' => $userController,
					'action' => 'register'
                ],
                'login' => false
			],
			'user-login'=>[
				'GET'=>[
					'controller'=> $userController,
					'action'=>'index'
				],
				'POST'=>[
					'controller'=> $userController,
					'action'=>'login'
                ],
                'login' => false
			],
			'user-logout'=>[
				'POST'=>[
					'controller'=> $userController,
					'action'=>'logout'
                ],
                'login' => false
			],
			'home' => [
				'GET' => [
					'controller' => $homeController,
					'action' => 'index'
				],
				'login' => false
			],
			'project' => [
				'GET' => [
					'controller' => $projectController,
					'action' => 'index'
				],
				'POST' => [
					'controller' => $projectController,
					'action' => 'projectPost'
				],
				'login' => false
			],
			'task'=>[
				'GET' => [
					'controller' => $taskController,
					'action' => 'index'
				],
				'POST' => [
					'controller' => $taskController,
					'action' => 'taskPost'
				],
				'login' => false
			],
			'dashboard' => [
				'GET' => [
					'controller' => $dashboardController,
					'action' => 'index'
				],
				'login' => false
			]
		];

		return $routes;
	}

	public function getAuthentication(): \Ninja\Authentication {
		return $this->authentication;
	}

    public function checkPermission($permission): bool {
		$user = $this->authentication->getUser();

		if ($user && $user->hasPermission($permission)) {
			return true;
		} else {
			return false;
		}
	}

}