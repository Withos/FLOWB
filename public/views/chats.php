<?php
session_start();
if(!isset($_SESSION["useremail"]) || !isset($_SESSION["userid"])){
    header("location: ../login");
}
$currentpage = "chats";
include(__DIR__.'/../inc/header.php');
include(__DIR__.'/../inc/upper_panel.php');
include(__DIR__.'/../inc/mobile_upper_panel.php');
?>
    <section class="content">
        <div class="chat1">
            <div class="photo_activity">
                <div class="image-cropper">
                    <img src="/public/pics/womanpic1.jfif" alt="prof_pic">
                </div>
                <div class="activity"></div>
            </div>
            <p class="name">Kate Wilson</p>
            <p class="last_mess">Kate: Hey, wanna meet tommorow?</p>
            <p class="time">17:35</p>
        </div>
        <div class="chat2">
            <div class="photo_activity">
                <div class="image-cropper">
                    <img src="/public/pics/womanpic1.jfif" alt="prof_pic">
                </div>
                <div class="activity"></div>
            </div>
            <p class="name">Kate Wilson</p>
            <p class="last_mess">Kate: Hey, wanna meet tommorow?</p>
            <p class="time">17:35</p>
        </div>
        <div class="chat3">
            <div class="photo_activity">
                <div class="image-cropper">
                    <img src="/public/pics/womanpic1.jfif" alt="prof_pic">
                </div>
                <div class="activity"></div>
            </div>
            <p class="name">Kate Wilson</p>
            <p class="last_mess">Kate: Hey, wanna meet tommorow?</p>
            <p class="time">17:35</p>
        </div>
        <div class="chat4">
            <div class="photo_activity">
                <div class="image-cropper">
                    <img src="/public/pics/womanpic1.jfif" alt="prof_pic">
                </div>
                <div class="activity"></div>
            </div>
            <p class="name">Kate Wilson</p>
            <p class="last_mess">Kate: Hey, wanna meet tommorow?</p>
            <p class="time">17:35</p>
        </div>
        <div class="chat5">
            <div class="photo_activity">
                <div class="image-cropper">
                    <img src="/public/pics/womanpic1.jfif" alt="prof_pic">
                </div>
                <div class="activity"></div>
            </div>
            <p class="name">Kate Wilson</p>
            <p class="last_mess">Kate: Hey, wanna meet tommorow?</p>
            <p class="time">17:35</p>
        </div>
    </section>

</div>
</body>
</html>