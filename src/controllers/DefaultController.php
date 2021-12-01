<?php

require_once 'AppController.php';

class DefaultController extends AppController {

    public function index()
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
}