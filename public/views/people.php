<?php
session_start();
if(!isset($_SESSION["useremail"]) || !isset($_SESSION["userid"])){
    header("location: ../login");
}
$currentpage = "people";
include(__DIR__.'/../inc/header.php');
include(__DIR__.'/../inc/upper_panel.php');
include(__DIR__.'/../inc/mobile_upper_panel.php');
?>
    <div class="content">
        <?php
        foreach($users as $user){
        ?>
        <div class="person" role="button" onclick="location.href='profile?id=<?=$user->getId()?>'">
            <div class="image-cropper">
                <img src="/public/pics/<?=$user->getImage()?>" alt="prof_pic">
            </div>
            <div class = "line"></div>
            <p class="name_age"><?=$user->getName()?> <?=$user->getSurname()?>, <?=$user->getAge()?></p>
            <p class="location">Lives near: <?=$user->getLocation()->getName()?></p>
            <div class="tags">
                <?php
                foreach($user->getTags() as $tag){
                ?>
                <div class="tag">
                    <p><?=$tag->getName()?></p>
                </div>
                <?php
                }
                ?>
            </div>
            <div class="invite" role="button">
                <p>Invite</p>
                <svg width="22" height="17" viewBox="0 0 22 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2.33317 16.5834H0.166504C0.166504 12.9935 3.07665 10.0834 6.6665 10.0834C10.2564 10.0834 13.1665 12.9935 13.1665 16.5834H10.9998C10.9998 14.1901 9.05974 12.25 6.6665 12.25C4.27327 12.25 2.33317 14.1901 2.33317 16.5834ZM18.5832 13.3334H16.4165V10.0834H13.1665V7.91671H16.4165V4.66671H18.5832V7.91671H21.8332V10.0834H18.5832V13.3334ZM6.6665 9.00004C4.27327 9.00004 2.33317 7.05994 2.33317 4.66671C2.33317 2.27347 4.27327 0.333374 6.6665 0.333374C9.05974 0.333374 10.9998 2.27347 10.9998 4.66671C10.9969 7.0587 9.0585 8.99706 6.6665 9.00004ZM6.6665 2.50004C5.48285 2.50124 4.51922 3.45213 4.50225 4.63566C4.48529 5.81919 5.42128 6.7973 6.60442 6.83242C7.78755 6.86754 8.77991 5.94666 8.83317 4.76421V5.19754V4.66671C8.83317 3.47009 7.86312 2.50004 6.6665 2.50004Z" fill="white"/>
                </svg>
            </div>
        </div>
        <?php
        }
        ?>
    </div>
</div>
</body>
</html>