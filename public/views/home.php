<?php
if(!isset($_COOKIE['user'])){
    $url = "http://$_SERVER[HTTP_HOST]";
    header("Location: {$url}/login");
    exit();
}
?>
<!DOCTYPE html>
<head>
    <link rel="stylesheet" type=text/css href="public/css/style.css">
    <link rel="stylesheet" type=text/css href="public/css/events.css">
    <link rel="stylesheet" type=text/css href="public/css/glide.core.min.css">
    <link rel="stylesheet" type=text/css href="public/css/glide.theme.min.css">

    <script defer src="https://cdn.jsdelivr.net/npm/@glidejs/glide"></script>
    <script defer type="text/javascript" src="public/js/glide.js" ></script>
    <script defer src="https://kit.fontawesome.com/2f35c77861.js" crossorigin="anonymous"></script>
    <title>HOME PAGE</title>
</head>
<body>
    <div class="base-container">
        <?php include("navigation_bar.php") ?>
        <?php include("upper_navigation_bar_mobile.php") ?>
        <main>
            <left-bar>
                <?php include("calendar-bar.php") ?>
            </left-bar>
            <main-content>
                <div class="title-label">IN PROGRESS</div>
                <?php include("events-container.php") ?>
                <div class="title-label">RECOMMENDED</div>
                <div class="events-container">
                    <i class="fas fa-chevron-left"></i>
                    <div class="event">
                        <div class="avatars-container">
                            <div class="number">+2</div>
                            <div class="avatar_event">
                                <img src="public/img/basic.jpg" alt="Avatar">
                            </div>
                        </div>
                        <ul>
                            <li><i class="fas fa-swimmer"></i> </li>
                            <li><i class="fas fa-map-marker-alt"></i> </li>
                            <li> <i class="far fa-calendar-alt"></i></li>
                            <li><i class="far fa-clock"></i></li>
                        </ul>
                        <!--<div class="status">Waiting for response</div>-->
                        <div class="icons">
                            <i class="far fa-edit"></i>
                            <i class="far fa-comment-alt"></i>
                            <i class="fas fa-ellipsis-h"></i>
                            <i class="far fa-times-circle"></i>
                        </div>
                    </div>
                    <div class="event">
                        <div class="avatars-container">
                            <div class="number">+2</div>
                            <div class="avatar_event">
                                <img src="public/img/basic.jpg" alt="Avatar">
                            </div>
                        </div>
                        <ul>
                            <li><i class="fas fa-swimmer"></i> </li>
                            <li><i class="fas fa-map-marker-alt"></i> </li>
                            <li> <i class="far fa-calendar-alt"></i></li>
                            <li><i class="far fa-clock"></i></li>
                        </ul>
                        <!--<div class="status">Waiting for response</div>-->
                        <div class="icons">
                            <i class="far fa-edit"></i>
                            <i class="far fa-comment-alt"></i>
                            <i class="fas fa-ellipsis-h"></i>
                            <i class="far fa-times-circle"></i>
                        </div>
                    </div>
                    <div class="event">
                        <div class="avatars-container">
                            <div class="number">+2</div>
                            <div class="avatar_event">
                                <img src="public/img/basic.jpg" alt="Avatar">
                            </div>
                        </div>
                        <ul>
                            <li><i class="fas fa-swimmer"></i> </li>
                            <li><i class="fas fa-map-marker-alt"></i> </li>
                            <li> <i class="far fa-calendar-alt"></i></li>
                            <li><i class="far fa-clock"></i></li>
                        </ul>
                        <!--<div class="status">Waiting for response</div>-->
                        <div class="icons">
                            <i class="far fa-edit"></i>
                            <i class="far fa-comment-alt"></i>
                            <i class="fas fa-ellipsis-h"></i>
                            <i class="far fa-times-circle"></i>
                        </div>
                    </div>
                    <div class="event">
                        <div class="avatars-container">
                            <div class="number">+2</div>
                            <div class="avatar_event">
                                <img src="public/img/basic.jpg" alt="Avatar">
                            </div>
                        </div>
                        <ul>
                            <li><i class="fas fa-swimmer"></i> </li>
                            <li><i class="fas fa-map-marker-alt"></i> </li>
                            <li> <i class="far fa-calendar-alt"></i></li>
                            <li><i class="far fa-clock"></i></li>
                        </ul>
                        <!--<div class="status">Waiting for response</div>-->
                        <div class="icons">
                            <i class="far fa-edit"></i>
                            <i class="far fa-comment-alt"></i>
                            <i class="fas fa-ellipsis-h"></i>
                            <i class="far fa-times-circle"></i>
                        </div>
                    </div>
                    <i class="fas fa-chevron-right"></i>
                </div>

            </main-content>
        </main>
        <?php include("navigation_bar_mobile.php") ?>
    </div>

</body>