<?php

require_once 'AppController.php';

class DefaultController extends AppController {

    public function index()
    {
        $this->render('login');
    }

    public function people()
    {
        $this->render('people');
    }

    public function chats()
    {
        $this->render('chats');
    }

    public function home()
    {
        $this->render('home');
    }

    public function register()
    {
        $this->render('register');
    }
}