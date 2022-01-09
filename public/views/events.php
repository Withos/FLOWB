<!DOCTYPE html>
<html lang="en">
<head>
    <link rel= "stylesheet" type="text/css" href = "/public/css/style.css">
    <link rel= "stylesheet" type="text/css" href = "/public/css/events.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Maven+Pro&display=swap" rel="stylesheet">
    <title>Events</title>
</head>
<body>
    <div class = "ev_container">
        <div class = "left_panel">
            <div class  = "logo">
                <img src="/public/images/flowb_logo.svg" alt="Logo" class = "logo_image">
            </div>
            <div class = "buttons">
                <div class="events">
                    <img src="/public/images/events_icon.svg" alt="events_icon" class = "events_icon">
                    <button class = "events_button">Events</button>
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
            <div class="search_bar">
                <input type="search" class="search" placeholder="Search">
                <img src="/public/images/search_icon.svg" alt="search_icon" class = "search_icon">
            </div>
            <div class="filters">
                <button class="filters_button">Filters</button>
                <img src="/public/images/filter_icon.svg" alt="filter_icon" class = "filter_icon">
            </div>
            <div class="bottom_line"></div>
        </div>
        <div class="mobile_upper_panel">
            <div class="mobile_back_arrow" role="button" onclick="location.href='home'">
                <svg width="31" height="23" viewBox="0 0 31 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7.68125 9.625L14.3937 2.89375L11.75 0.25L0.5 11.5L11.75 22.75L14.3937 20.1063L7.68125 13.375H30.5V9.625H7.68125Z" fill="#e6e6e6"/>
                </svg>
            </div>
            <div class="mobile_upper_text">
                <p>Events</p>
            </div>
            <form>
                <input type="search" class="mobile_search" placeholder="Search">
                <button type="submit" class="mobile_search_icon">
                    <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19.8958 17.5833H18.6779L18.2463 17.1671C19.7571 15.4096 20.6667 13.1279 20.6667 10.6458C20.6667 5.11125 16.1804 0.625 10.6458 0.625C5.11125 0.625 0.625 5.11125 0.625 10.6458C0.625 16.1804 5.11125 20.6667 10.6458 20.6667C13.1279 20.6667 15.4096 19.7571 17.1671 18.2463L17.5833 18.6779V19.8958L25.2917 27.5887L27.5887 25.2917L19.8958 17.5833ZM10.6458 17.5833C6.80708 17.5833 3.70833 14.4846 3.70833 10.6458C3.70833 6.80708 6.80708 3.70833 10.6458 3.70833C14.4846 3.70833 17.5833 6.80708 17.5833 10.6458C17.5833 14.4846 14.4846 17.5833 10.6458 17.5833Z" fill="#e6e6e6"/>
                    </svg>
                </button>
            </form>
        </div>
        <section class="content">
            <div id="event_1">
                <img src="/public/pics/event1.jpg">
                <div>
                    <p class="date">FRI, DEC 17 AT 8 PM</p>
                    <h2>title</h2>
                    <p class="location">Gorlice Park</p>
                    <p class="description">description</p>
                    <div class="interested" role="button">
                        <p class="interested_text">Interested</p>
                        <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M14.875 2.625H6.125C5.1625 2.625 4.38375 3.4125 4.38375 4.375L4.375 18.375L10.5 15.75L16.625 18.375V4.375C16.625 3.4125 15.8375 2.625 14.875 2.625ZM14.875 15.75L10.5 13.8425L6.125 15.75V4.375H14.875V15.75Z" fill="#e6e6e6"/>
                        </svg>

                    </div>
                </div>
            </div>
            <div id="event_2">
                <img src="/public/pics/event1.jpg">
                <div>
                    <p class="date">FRI, DEC 17 AT 8 PM</p>
                    <h2>title</h2>
                    <p class="location">Gorlice Park</p>
                    <p class="description">description</p>
                    <div class="interested" role="button">
                        <p class="interested_text">Interested</p>
                        <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M14.875 2.625H6.125C5.1625 2.625 4.38375 3.4125 4.38375 4.375L4.375 18.375L10.5 15.75L16.625 18.375V4.375C16.625 3.4125 15.8375 2.625 14.875 2.625ZM14.875 15.75L10.5 13.8425L6.125 15.75V4.375H14.875V15.75Z" fill="#e6e6e6"/>
                        </svg>
                    </div>
                </div>
            </div>
            <div id="event_3">
                <img src="/public/pics/event1.jpg">
                <div>
                    <p class="date">FRI, DEC 17 AT 8 PM</p>
                    <h2>title</h2>
                    <p class="location">Gorlice Park</p>
                    <p class="description">description</p>
                    <div class="interested" role="button">
                        <p class="interested_text">Interested</p>
                        <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M14.875 2.625H6.125C5.1625 2.625 4.38375 3.4125 4.38375 4.375L4.375 18.375L10.5 15.75L16.625 18.375V4.375C16.625 3.4125 15.8375 2.625 14.875 2.625ZM14.875 15.75L10.5 13.8425L6.125 15.75V4.375H14.875V15.75Z" fill="#e6e6e6"/>
                        </svg>
                    </div>
                </div>
            </div>
            <div id="event_4">
                <img src="/public/pics/event1.jpg">
                <div>
                    <p class="date">FRI, DEC 17 AT 8 PM</p>
                    <h2>title</h2>
                    <p class="location">Gorlice Park</p>
                    <p class="description">description</p>
                    <div class="interested" role="button">
                        <p class="interested_text">Interested</p>
                        <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M14.875 2.625H6.125C5.1625 2.625 4.38375 3.4125 4.38375 4.375L4.375 18.375L10.5 15.75L16.625 18.375V4.375C16.625 3.4125 15.8375 2.625 14.875 2.625ZM14.875 15.75L10.5 13.8425L6.125 15.75V4.375H14.875V15.75Z" fill="#e6e6e6"/>
                        </svg>
                    </div>
                </div>
            </div>
        </section>
        
    </div>
</body>
</html>