<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://fonts.googleapis.com/css?family=Maven+Pro&display=swap" rel="stylesheet">
    <link rel= "stylesheet" type="text/css" href = "/public/css/style.css">
    <link rel= "stylesheet" type="text/css" href = "/public/css/<?=$currentpage?>.css">
    <?php
        if($currentpage === "events"){
    ?>
    <script type="text/javascript" defer src="/public/js/search.js"></script>
            <script type="text/javascript" defer src="/public/js/interested.js"></script>
    <?php
        }
    ?>
    <?php
    if($currentpage === "home"){
        ?>
        <script type="text/javascript" src="/public/js/home.js"></script>
        <?php
    }
    ?>
    <?php
    if($currentpage === "profile"){
        ?>
        <script type="text/javascript" defer src="/public/js/edit_profile.js"></script>
        <?php
    }
    ?>
    <script type="text/javascript" defer src="/public/js/log_out.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FLOWB</title>
</head>
<body>
<div class = "main_container" >
    <div class = "left_panel">
        <div class  = "logo">
            <img src="/public/images/flowb_logo.svg" alt="Logo" class = "logo_image">
        </div>
        <div class = "buttons">
            <div class="events">
                <img src="/public/images/events_icon.svg" alt="events_icon" class = "events_icon">
                <button onclick="location.href='events'" class = "events_button">Events</button>
            </div>

            <div class="people">
                <img src="/public/images/people_icon.svg" alt="people_icon" class = "people_icon">
                <button onclick="location.href='people'" class="people_button">People</button>
            </div>
            <div class="chats">
                <img src="/public/images/chats_icon.svg" alt="chats_icon" class = "chats_icon">
                <button onclick="location.href='chats'" class="chats_button">Chats</button>
            </div>
            <div class="profile">
                <img src="/public/images/profile_icon.svg" alt="profile_icon" class = "profile_icon">
                <button onclick="location.href='profile?id=<?=$_SESSION['userid']?>'" class="profile_button">Profile</button>
            </div>
            <div class="settings">
                <img src="/public/images/settings_icon.svg" alt="settings_icon" class = "settings_icon">
                <button class="settings_button">Log out</button>
            </div>
        </div>
    </div>
