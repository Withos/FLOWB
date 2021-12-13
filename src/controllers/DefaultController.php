<?php

require_once 'AppController.php';

class DefaultController extends AppController {

    public function index()
    {
        $this->render('home');
    }

    public function login()
    {
        $this->render('login');
    }

    public function events()
    {
        $this->render('events');
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

    public function profile()
    {
        $this->render('profile');
    }
}