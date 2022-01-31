<?php
session_start();
if(!isset($_SESSION["useremail"]) || !isset($_SESSION["userid"])){
    header("location: ../login");
}
$currentpage = "profile";
include(__DIR__.'/../inc/header.php');
?>

    <div class="content">
        <div class="photo_name">
            <div class="image-cropper">
                <img src="/public/pics/<?=$user->getImage()?>" alt="prof_pic">
            </div>
            <h1 class="name"><?=$user->getName()?> <?=$user->getSurname()?></h1>
        </div>
        <div class="line1"></div>
        <div class="information">
            <h2>Info about:</h2>
                <p class="location">Lives near <?=$user->getLocation()->getName()?></p>
            <p class="age"><?=$user->getAge()?> years old</p>
            <?php
                $tags = $user->getTags();
                if (!empty($tags)){
                ?>
            <p class="interests">Interests:</p>
            <div class="interests_tags">
                <?php
                foreach($tags as $tag){
                ?>
                <div class="tag">
                    <p><?=$tag->getName()?></p>
                </div>
                <?php
                    }
                ?>
            </div>
                    <?php
                }
            ?>
        </div>
        <div class="biography">
            <h2>Bio:</h2>
            <p class="bio_text"><?=$user->getBio()?></p>
        </div>
    </div>
</div>
</body>
</html>