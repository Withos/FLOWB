<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';
require_once __DIR__.'/../repository/LocationRepository.php';

class UserController extends AppController
{

    const MAX_FILE_SIZE = 1024 * 1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpeg'];
    const UPLOAD_DIRECTORY = '/../public/uploads/';

    private $message = [];
    private $userRepository;
    private $locationRepository;

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
        $this->locationRepository = new LocationRepository();
    }

    public function profile()
    {
        $user = $this->userRepository->getUserbyId($_GET['id']);
        $this->render('profile', ['user' => $user, 'locations' => $this->locationRepository->getLocations()]);
    }

    public function people()
    {
        $users = $this->userRepository->getUsers();
        $this->render('people', ['users' => $users]);
    }

    public function editProfile()
    {
        session_start();



        $user = $this->userRepository->getUserbyId($_SESSION['userid']);

        if (!$this->isPost()) {
            return $this->render('profile', ['user' => $user]);
        }

        $id = $_POST["id"];
        $name = $_POST["name"];
        $surname = $_POST["surname"];
        $bio = $_POST["bio"];
        $location = unserialize($_POST["location"]);

        if(!empty($name)){
            $user->setName($name);
        }
        if(!empty($surname)) {
            $user->setSurname($surname);
        }
        $user->setLocation($location);
        if(!empty($bio)){
            $user->setBio($bio);
        }

        if ($this->isPost() && is_uploaded_file($_FILES['file']['tmp_name']) && $this->validate($_FILES['file'])) {
            move_uploaded_file(
                $_FILES['file']['tmp_name'],
                dirname(__DIR__) . self::UPLOAD_DIRECTORY . $_FILES['file']['name']
            );
            $file = $_FILES['file']['name'];
            $user->setImage($file);
        }

        $this->userRepository->editUser($user);
        return $this->render("profile", ['messages' => ['Profile edited succesfuly'], 'user' => $user, 'locations' => $this->locationRepository->getLocations()]);
    }


        private function validate(array $file): bool
        {
            if ($file['size'] > self::MAX_FILE_SIZE) {
                $this->message[] = 'File is too large for destination file system.';
                return false;
            }

            if (!isset($file['type']) || !in_array($file['type'], self::SUPPORTED_TYPES)) {
                $this->message[] = 'File type is not supported.';
                return false;
            }
            return true;
        }
    }
