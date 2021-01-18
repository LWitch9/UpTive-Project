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
    <link rel="stylesheet" type=text/css href="public/css/form.css">
    <script src="https://kit.fontawesome.com/2f35c77861.js" crossorigin="anonymous"></script>
    <title>ADD ACTIVITY</title>
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


                <form id="addEvent" action="addEvent" method="POST">

                    <div class="title-label">BASICS</div>
                    <div class="form-container">
                        <select id="activity" name="activity" required>
                            <option value="" disabled selected>Choose activity</option>
                            <option value="Swimming">Swimming</option>
                            <option value="Volleyball">Volleyball</option>
                            <option value="sw">Swimming</option>
                        </select>
                        <select id="type" name="type" >
                            <option value="" disabled selected>Choose preferred type of training</option>
                            <option value="ea">EASY</option>
                            <option value="mid">MEDIUM</option>
                            <option value="ha">HARD</option>
                        </select>

                    </div>
                    <div class="title-label">LOCATION AND TIME</div>
                    <div class="form-container">
                        <select id="location" name="location" required>
                            <option value="" disabled selected>Choose preferred location</option>
                            <option value="KRAKOW,KROWODRZA">KRAKOW,KROWODRZA</option>
                            <option value="KRAKOW,STARE MIASTO">KRAKOW,STARE MIASTO</option>
                            <option value="KRAKOW,KAZIMIERZ">KRAKOW,KAZIMIERZ</option>
                        </select>
                        <input type="date" name="date" id="date" min="2021-01-01" max="2023-12-31" required>
                        <input type="time" id="time" name="time" required>
                    </div>
                    <div class="title-label">OPTIONAL</div>
                    <textarea name="about" id="about" cols='50' rows='10' ></textarea>


                    <button>ADD ACTIVITY</button>

                </form>



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