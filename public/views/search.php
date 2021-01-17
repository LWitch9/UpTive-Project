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
    <script src="https://kit.fontawesome.com/2f35c77861.js" crossorigin="anonymous"></script>
    <title>SEARCH PAGE</title>
</head>
<body>
<div class="base-container">
    <nav-bar>
        <!-- miejsce na home, search,friends ikonki img profilowe-->
        <div class="logo">
            <!--TODO Area for logo svg image-->
            <!--Temporarily-->
            UpTive
        </div>
        <a href="http://localhost:8080/addActivity" class="button">
            <div class="add-activity">
                <i class="fas fa-plus-circle"></i>
                ADD ACTIVITY
            </div>
        </a>
        <div class="navi">
            <a href="http://localhost:8080/home" class="button">
                HOME
            </a>
        </div>
        <div class="navi">
            <a href="#" class="button">
                <span>SEARCH</span>
            </a>
        </div>
        <div class="navi">FRIENDS</div>
        <div class="navi-icons">
            <i class="fas fa-cog"></i>
            <i class="far fa-bell" ></i>
            <form id ="logout" action="logout" method="GET">
                <button >
                    <i class="fas fa-sign-out-alt"></i>
                </button
            </form>

        </div>

        <div class="avatar-container">
            <a href="http://localhost:8080/profile" class="button">
                <div class="avatar">
                    <img src="public/img/basic.jpg" alt="Avatar">
                </div>
            </a>
            <br><br><br>
            Name Surname
        </div>


    </nav-bar>
    <upper-bar-mobile>
        <div class="logo">UpTive</div>
        <div class="upper-bar-lower">
            <i class="fas fa-bars"></i>
            <div class="add-activity">
                <i class="fas fa-plus-circle"></i>
                ADD ACTIVITY
            </div>
            <i class="fas fa-ellipsis-v"></i>

        </div>
    </upper-bar-mobile>
    <main>

        <left-bar>
            <div class="title-label">FILTERS</div>
            <div class="filters">
                <form>
                    <select id="location" name="location"  multiple="multiple">
                        <option value="" disabled selected>TIME</option>
                        <option value="kr-kro">KRAKOW,KROWODRZA</option>
                        <option value="kr-str">KRAKOW,STARE MIASTO</option>
                        <option value="kr-kzi">KRAKOW,KAZIMIERZ</option>
                    </select>
                </form>
            </div>

        </left-bar>
        <main-content>
            <div class="events-container">
                <?php foreach ($events as $event):?>
                <form id ="request" action="request" method="POST">
                <div class="event">
                    <input type=hidden name=eventID value=<?= $event['id']?> >
                    <input type=hidden name=ownerEmail value=<?= $event['owner']->getEmail() ?> >
                    <div class="squared-avatar">
                        <img src="public/img/avatars/<?= $event['owner']->getAvatar() ?>.jpg" alt="Avatar">
                        <?= $event['owner']->getName() ." ".$event['owner']->getSurname()?>
                    </div>

                    <div class="avatars-container">
                        <?php if(!$event['participants']): ?>
                        <div class="number">0</div>
                        <?php endif ?>
                        <?php foreach ($event['participants'] as $participant):?>
                            <div class="avatar_event">
                                <img src="public/img/avatars/<?= $participant->getAvatar() ?>.jpg" alt="Avatar">
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="event_search_labels">
                        <ul>
                            <li id="activity"><i class="fas fa-swimmer"></i><?= $event['event']->getActivity() ?> </li>
                            <li id="location"><i class="fas fa-map-marker-alt"></i><?= $event['event']->getLocation()?>  </li>
                            <li id="date"> <i class="far fa-calendar-alt"></i><?= $event['event']->getDate() ?> </li>
                            <li id="time"><i class="far fa-clock"></i><?= $event['event']->getTime() ?> </li>
                        </ul>
                    </div>
                    <div class="message-container">
                        <?= $event['event']->getMessage() ?>
                    </div>

                        <button>REQUEST</button>
                </div>
                </form>
                <?php endforeach; ?>
            </div>

        </main-content>


    </main>

    <nav-bar-mobile>
        <div class="icon-container-mobile">
            <i class="far fa-bell"></i>
            <h>NOTIFS</h>
        </div>
        <div class="icon-container-mobile">
            <i class="fas fa-home"></i>
            <h>HOME</h>
        </div>
        <div class="icon-container-mobile">
            <i class="far fa-calendar-alt"></i>
            <h>CALENDAR</h>
        </div>
        <div class="icon-container-mobile">
            <i class="fas fa-search"></i>
            <h>SEARCH</h>
        </div>
        <div class="icon-container-mobile">
            <i class="fas fa-users"></i>
            <h>FRIENDS</h>
        </div>
        <div class="avatar">
            <img src="public/img/basic.jpg" alt="Avatar">
        </div>

    </nav-bar-mobile>
</div>
</body>