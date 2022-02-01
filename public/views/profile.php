<?php
session_start();
if(!isset($_SESSION["useremail"]) || !isset($_SESSION["userid"])){
    header("location: ../login");
}
$currentpage = "profile";
include(__DIR__.'/../inc/header.php');
?>

    <div class="content">
        <?php
        if($user->getId() == $_SESSION['userid']){
            ?>
            <div class="edit_window">
                <div id="close_edit_button">
                    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                         viewBox="0 0 460.775 460.775" style="enable-background:new 0 0 460.775 460.775;" xml:space="preserve">
                        <path d="M285.08,230.397L456.218,59.27c6.076-6.077,6.076-15.911,0-21.986L423.511,4.565c-2.913-2.911-6.866-4.55-10.992-4.55
                            c-4.127,0-8.08,1.639-10.993,4.55l-171.138,171.14L59.25,4.565c-2.913-2.911-6.866-4.55-10.993-4.55
                            c-4.126,0-8.08,1.639-10.992,4.55L4.558,37.284c-6.077,6.075-6.077,15.909,0,21.986l171.138,171.128L4.575,401.505
                            c-6.074,6.077-6.074,15.911,0,21.986l32.709,32.719c2.911,2.911,6.865,4.55,10.992,4.55c4.127,0,8.08-1.639,10.994-4.55
                            l171.117-171.12l171.118,171.12c2.913,2.911,6.866,4.55,10.993,4.55c4.128,0,8.081-1.639,10.992-4.55l32.709-32.719
                            c6.074-6.075,6.074-15.909,0-21.986L285.08,230.397z"/>
                    </svg>
                </div>
                <form action="editProfile" method="POST" ENCTYPE="multipart/form-data">
                    <input type="hidden" name="id" value=<?=$user->getId()?>>
                    <input type="text" name="name" class="nameinp" value=<?=$user->getName()?>>
                    <input type="text" name="surname" class="surnameinp" value=<?=$user->getSurname()?>>
                    <input type="file" name="file">
                    <select id="locationsselect" name="location">
                        <option selected="selected" value=<?=serialize($user->getLocation())?>><?=$user->getLocation()?></option>
                        <?php foreach($locations as $location):
                            if($location->getId() != $user->getLocation()->getId()){
                            ?>
                            <option value=<?=serialize($location)?>><?=$location?></option>
                        <?php }
                            endforeach; ?>
                    </select>
                    <textarea name="bio" rows="5"><?=$user->getBio()?></textarea>
                    <button type="submit">Save Changes</button>
                </form>
            </div>
            <?php
        }
        ?>
        <div class="photo_name">
            <div class="image-cropper">
                <img src="/public/pics/<?=$user->getImage()?>" alt="prof_pic">
            </div>
            <h1 class="name"><?=$user->getName()?> <?=$user->getSurname()?></h1>
            <?php
            if($user->getId() == $_SESSION['userid']){
            ?>
                <div role="button" class="edit_button" id="editButton">
                    <p>Edit Profile</p>
                </div>
                <?php
            }
            ?>
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