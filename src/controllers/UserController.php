<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

class UserController extends AppController
{

    private $userRepository;

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
    }

    public function profile(){
        $user = $this->userRepository->getUserbyId($_GET['id']);
        $this->render('profile', ['user' => $user]);
    }

    public function people(){
        $users = $this->userRepository->getUsers();
        $this->render('people', ['users' => $users]);
    }


}