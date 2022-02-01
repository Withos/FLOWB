<?php
session_start();
if(!isset($_SESSION["useremail"]) || !isset($_SESSION["userid"])){
    header("location: ../login");
}
$currentpage = "event";
include(__DIR__.'/../inc/header.php');
?>
    <div class="content">
        <img src="/public/uploads/<?=$event->getImage()?>" alt="event_image" class="event_image">
        <h1 class="event_title"><?=$event->getTitle()?></h1>
        <p class="event_description"><?=$event->getDescription()?></p>
        <p class="event_date"><?=$event->getDate()?></p>
        <p class="event_location"><?=$event->getLocation()->getName()?></p>
        <?php
            if($event->getCreatorId() == $_SESSION["userid"]){
        ?>
                    <form action="deleteEvent" method="POST">
                        <input name="id" type="hidden" value=<?=$event->getId()?>>
                        <button class="delete_button" type="submit">Delete Event</button>
                    </form>
        <?php
            }
        ?>
    </div>
</div>
</body>
</html>