<?php
session_start();
if(!isset($_SESSION["useremail"]) || !isset($_SESSION["userid"])){
    header("location: ../login");
}
$currentpage = "home";
include(__DIR__.'/../inc/header.php');
include(__DIR__.'/../inc/upper_panel.php');
?>
<section class="content">
    <div class="add_event" role="button" onclick="location.href='addEvent'">
        <p class="add_event_text">Add Event</p>
        <div id="add_event_plus_background">
            <svg id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                 viewBox="0 0 60.364 60.364" xml:space="preserve">
                            <path d="M54.454,23.18l-18.609-0.002L35.844,5.91C35.845,2.646,33.198,0,29.934,0c-3.263,0-5.909,2.646-5.909,5.91v17.269
                                L5.91,23.178C2.646,23.179,0,25.825,0,29.088c0.002,3.264,2.646,5.909,5.91,5.909h18.115v19.457c0,3.267,2.646,5.91,5.91,5.91
                                c3.264,0,5.909-2.646,5.91-5.908V34.997h18.611c3.262,0,5.908-2.645,5.908-5.907C60.367,25.824,57.718,23.178,54.454,23.18z"/>
                    </svg>
        </div>
    </div>
    <?php foreach($events as $event):?>
        <div class="event" id="event_1">
            <img src="/public/uploads/<?= $event->getImage() ?>">
            <div class="event_information">
                <p class="date"><?= $event->getDate() ?></p>
                <h2><?=$event->getTitle()?></h2>
                <p class="location"><?= $event->getLocation()?></p>
                <p class="description"><?= $event->getDescription() ?></p>
                <div class="interested" role="button">
                    <p class="interested_text">Interested</p>
                    <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M14.875 2.625H6.125C5.1625 2.625 4.38375 3.4125 4.38375 4.375L4.375 18.375L10.5 15.75L16.625 18.375V4.375C16.625 3.4125 15.8375 2.625 14.875 2.625ZM14.875 15.75L10.5 13.8425L6.125 15.75V4.375H14.875V15.75Z" fill="#e6e6e6"/>
                    </svg>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</section>

</div>
</body>
</html>