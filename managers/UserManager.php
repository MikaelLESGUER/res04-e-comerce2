<?php


    require_once "AbstractManager.php";

   class UserManager extends AbstractManager {

   public function getAllUsers() : array {
      $query = $this->db->prepare('SELECT * FROM users');
      $query->execute();
      $users = $query->fetchAll(PDO::FETCH_ASSOC);
      $usersTab = [];
		foreach($users as $user) {
         $userInstance = new User(
            $user['username'],
            $user['email'],
            $user['password']
         );
         $userInstance->setId($user['id']);
			array_push($usersTab,$user);
		}
		return $usersTab;
   }
   public function getUserById(int $id) : User {
		$query = $this->db->prepare('SELECT * FROM users WHERE id = :id');
		$parameters = [
			'id' => $id
		];
		$query->execute($parameters);
		$user = $query->fetch(PDO::FETCH_ASSOC);
		$userInstance = new User(
         $user['username'],
         $user['email'],
         $user['password']
      );
      $userInstance->setId($user['id']);
      return $userInstance;
	}
   public function getUserByEmail(string $email) : User {
		$query = $this->db->prepare('SELECT * FROM users WHERE email = :email');
		$parameters = [
			'email' => $email
		];
		$query->execute($parameters);
		$user = $query->fetch(PDO::FETCH_ASSOC);
		$userInstance = new User(
         $user['username'],
         $user['email'],
         $user['password']
      );
      $userInstance->setId($user['id']);
      return $userInstance;
	}
   public function insertUser(User $user) : User {
      $query = $this->db->prepare('
			INSERT INTO users (username, email,  password)
			VALUES (:username, :email,  :password)
		');
		$parameters = [
		   
		   'username' => $user->getUsername(),
			'email' => $user->getEmail(),
			'password' => password_hash($user->getPassword(),PASSWORD_DEFAULT)
		];
		$query->execute($parameters);

      $user = $this->getUserByEmail($user->getEmail());
      return $user;
   }
   
   
}