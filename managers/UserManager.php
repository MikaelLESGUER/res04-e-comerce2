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
            $user['first_name'],
            $user['last_name'],
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
         $user['first_name'],
         $user['last_name'],
         $user['email'],
         $user['password']
      );
      $userInstance->setId($user['id']);
      return $userInstance;
	}
	
   public function getUserByEmail(string $email) : ? User {
		$query = $this->db->prepare('SELECT * FROM users WHERE email = :email');
		$parameters = [
			'email' => $email
		];
		$query->execute($parameters);
		$user = $query->fetch(PDO::FETCH_ASSOC);
		if($user)
		{
		   $userInstance = new User(
         $user['username'],
         $user['first_name'],
         $user['last_name'],
         $user['email'],
         $user['password']
         );
         $userInstance->setId($user['id']);
         return $userInstance;
		}
		else{
		   return null;
		}
		
	}
	
   public function insertUser(User $user) : User {
      $query = $this->db->prepare('
			INSERT INTO users (username, first_name, last_name, email,  password)
			VALUES (:username, :first_name, :last_name, :email,  :password)
		');
		$parameters = [
		   
		   'username' => $user->getUsername(),
		   'first_name' => $user->getFirstName(),
		   'last_name' => $user->getLastName(),
			'email' => $user->getEmail(),
			'password' => password_hash($user->getPassword(),PASSWORD_DEFAULT)
		];
		$query->execute($parameters);

      $user = $this->getUserByEmail($user->getEmail());
      return $user;
   }
   
   public function updateUser($user)
   {
      $query = $this->db->prepare('UPDATE users SET password = :password WHERE id = :id');
      $parameters = [
         'password' => $user->getPassword(),
         'id' => $user->getId()
         ];
         $query->execute($paremeters);
   }
   
}