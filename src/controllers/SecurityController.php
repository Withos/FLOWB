<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

class SecurityController extends AppController
{

    private $userRepository;

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
    }

    public function login(){

        if(!$this->isPost()){
            return $this->render('login');
        }

        $email =$_POST["email"];
        $password =md5($_POST["password"]);

        $user = $this->userRepository->getUser($email);

        if(!$user){
            return $this->render('login', ['messages' => ["User doesn't exist"]]);
        }
        if($user->getEmail() !== $email){
            return $this->render('login', ['messages' => ["User with this email doesn't exist"]]);
        }

        if($user->getPassword() !== $password){
            return $this->render('login', ['messages' => ['Wrong password']]);
        }

        session_start();
        $_SESSION["useremail"] = $user->getEmail();
        $_SESSION["userid"] = $user->getId();
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/home");
    }

    public function logout(){
        session_start();
        session_unset();
        session_destroy();

        return $this->render('login', ['messages' => ["You've been logged out"]]);
    }

    public function register()
    {
        if (!$this->isPost()) {
            return $this->render('register');
        }

        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmedPassword = $_POST['confirm_password'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $date_of_birth = $_POST['date_of_birth'];

        if (empty($email)) {
            return $this->render('register', ['messages' => ['Please provide proper email']]);
        }

        if (empty($name)) {
            return $this->render('register', ['messages' => ['Please provide proper name']]);
        }

        if (empty($surname)) {
            return $this->render('register', ['messages' => ['Please provide proper surname']]);
        }

        if ($password !== $confirmedPassword || empty($password)) {
            return $this->render('register', ['messages' => ['Please provide proper password']]);
        }

        //TODO try to use better hash function
        $user = new User($email, md5($password), $name, $surname, $date_of_birth);
        $user->setDateOfBirth($date_of_birth);

        try {
            $this->userRepository->addUser($user);
        }
        catch(PDOException $pdoe){
            return $this->render('register', ['messages' => ['Account with this email already exists']]);
        }

        return $this->render('login', ['messages' => ['You\'ve been succesfully registrated!']]);
    }
}