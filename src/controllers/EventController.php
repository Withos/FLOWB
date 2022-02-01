<?php

require_once 'AppController.php';
require_once __DIR__ .'/../models/Event.php';
require_once __DIR__ .'/../models/Location.php';
require_once __DIR__.'/../repository/EventRepository.php';
require_once __DIR__.'/../repository/LocationRepository.php';

class EventController extends AppController {

    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpeg'];
    const UPLOAD_DIRECTORY = '/../public/uploads/';

    private $message = [];
    private $eventRepository;
    private $locationRepository;

    public function __construct()
    {
        parent::__construct();
        $this->eventRepository = new EventRepository();
        $this->locationRepository = new LocationRepository();
    }

    public function addEvent()
    {
        if ($this->isPost() && is_uploaded_file($_FILES['file']['tmp_name']) && $this->validate($_FILES['file'])) {
            move_uploaded_file(
                $_FILES['file']['tmp_name'],
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['file']['name']
            );

            // TODO create new project object and save it in database
            $event = new Event($_POST['title'], $_POST['description'], $_POST['date'], unserialize($_POST['location']), $_FILES['file']['name']);
            $this->eventRepository->addEvent($event);
            $interested_events = $this->eventRepository->getInterestedEvents();

            return $this->render('events', [
                'events' => $this->eventRepository->getEvents(),
                'messages' => $this->message, 'interested' => $interested_events]);
        }
        return $this->render('add_event', ['messages' => $this->message, 'locations' => $this->locationRepository->getLocations()]);
    }

    public function events()
    {
        $events = $this->eventRepository->getEvents();
        $interested_events = $this->eventRepository->getInterestedEvents();
        $this->render('events', ['events' => $events, 'interested' => $interested_events]);
    }

    public function home()
    {
        $events = $this->eventRepository->getEvents();
        $this->render('home', ['events' => $events]);
    }

    public function event(){
        $event = $this->eventRepository->getEvent($_GET['id']);
        $this->render('event', ['event' => $event]);
    }

    public function search(){
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if ($contentType === "application/json"){
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            header('Content-type: application/json');
            http_response_code(200);

            echo json_encode($this->eventRepository->getEventByTitle($decoded['search']));
        }
    }

    public function interested(){
        $id = intval($_POST['id']);
        $this->eventRepository->interested($id);
    }

    public function uninterested(){
        $id = intval($_POST['id']);
        $this->eventRepository->uninterested($id);
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
