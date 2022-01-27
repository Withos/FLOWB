<!DOCTYPE html>
<html lang="en">
<head>
    <link rel= "stylesheet" type="text/css" href = "/public/css/style.css">
    <link rel= "stylesheet" type="text/css" href = "/public/css/add_event.css">
    <script defer src="/public/js/create_event_date.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Maven+Pro&display=swap" rel="stylesheet">
    <title>Add Event</title>
</head>
<body>
<div class = "add_ev_container">
    <div class = "left_panel">
        <div class  = "logo">
            <img src="/public/images/flowb_logo.svg" alt="Logo" class = "logo_image">
        </div>
        <div class = "buttons">
            <div class="events">
                <img src="/public/images/events_icon.svg" alt="events_icon" class = "events_icon">
                <button class = "events_button" onclick="location.href='events'">Events</button>
            </div>
            <div class="videos">
                <img src="/public/images/videos_icon.svg" alt="videos_icon" class = "videos_icon">
                <button class = "videos_button">Videos</button>
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
                <button onclick="location.href='profile'" class="profile_button">Profile</button>
            </div>
            <div class="settings">
                <img src="/public/images/settings_icon.svg" alt="settings_icon" class = "settings_icon">
                <button class="settings_button">Settings</button>
            </div>
        </div>
    </div>
    <div class="upper_panel">
        <h1>Create your own event</h1>
        <div class="bottom_line"></div>
    </div>
    <div class="content">
        <form action="addEvent" method="POST" ENCTYPE="multipart/form-data">
            <?php if(isset ($messages)){
                foreach ($messages as $message) {
                    echo $message;
                }
            }
            ?>
            <input name="title" type="text" placeholder="Event Name">
            <textarea name="description" rows="5" placeholder="Description"></textarea>
            <input type="file" name="file">
            <input type="date" name="date" min="2022-01-01" id="dateField">
            <button type="submit">Create</button>
        </form>
    </div>
</div>
</body>
</html>