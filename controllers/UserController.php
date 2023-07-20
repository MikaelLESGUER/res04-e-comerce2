<?php
  
class UserController extends AbstractController
{
    private UserManager $userManager;
    
    public function __construct()
    {
        $this->userManager = new UserManager();
       
    }

    public function login()
    {
        if (isset($_POST["email"], $_POST["password"])) {
            $user = $this->userManager->getUserByEmail($_POST["email"]);
            if (password_verify($_POST["password"], $user->getPassword())) {
                $_SESSION['user_id'] = $user->getId();
                header("Location:index.php?route=order-products");
            } else {
                $allUsers = $this->userManager->getAllUsers();
                $this->render('user/login.phtml', ["users" => $allUsers]);
            }
        } else {
            $allUsers = $this->userManager->getAllUsers();
            $this->render('user/login.phtml', ["users" => $allUsers]);
        }
    }

    public function register()
    {
        if(isset($_POST["first_name"], $_POST["last_name"], $_POST["email"], $_POST["username"], $_POST["password"], $_POST["confirm-password"]))
        {
            if($_POST['password'] === $_POST['confirm-password']){
                $pwd = $_POST['password'];
                $email = $_POST['email'];
                $username = $_POST['username'];
                
                $user = new User($username, $email, $pwd);
                $this->userManager->insertUser($user);
                
                $this->render('user/login.phtml', []);
            } 
            else 
            {
                $this->render('user/register.phtml', []);
            }
        }
        else
        {
            $this->render('user/register.phtml', []);
        }
    }
    
    
    public function logout(): void
    {
        if (isset($_SESSION['user_id'])) {
            unset($_SESSION['user_id']);
            session_destroy();
            header("Location:index.php?route=user-login");
        }
    }
    
}
