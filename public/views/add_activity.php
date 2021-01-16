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
    <nav-bar>
        <!-- miejsce na home, search,friends ikonki img profilowe-->
        <div class="logo">
            <!--TODO Area for logo svg image-->
            <!--Temporarily-->
            UpTive
        </div>
        <a href="#" class="button">
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
            <a href="http://localhost:8080/search" class="button">
                SEARCH
            </a>
        </div>
        <div class="navi">FRIENDS</div>
        <div class="navi-icons">
            <i class="fas fa-cog"></i>
            <i class="far fa-bell" ></i>
            <form id ="logout" action="logout" method="GET">
                <button class="navi-icon" >
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
            <div class="title-label">CALENDAR</div>
            <div class="calendar">
                <ul>
                    <li><i class="fas fa-swimmer"></i> </li>
                    <li><i class="fas fa-map-marker-alt"></i> </li>
                    <li> <i class="far fa-calendar-alt"></i></li>
                    <li><i class="far fa-clock"></i></li>
                </ul>
                <i class="fas fa-ellipsis-h"></i>
            </div>
            <div class="calendar">
                <ul>
                    <li><i class="fas fa-swimmer"></i> </li>
                    <li><i class="fas fa-map-marker-alt"></i> </li>
                    <li> <i class="far fa-calendar-alt"></i></li>
                    <li><i class="far fa-clock"></i></li>
                </ul>
                <i class="fas fa-ellipsis-h"></i>
            </div>
            <div class="calendar">
                <ul>
                    <li><i class="fas fa-swimmer"></i> </li>
                    <li><i class="fas fa-map-marker-alt"></i> </li>
                    <li> <i class="far fa-calendar-alt"></i></li>
                    <li><i class="far fa-clock"></i></li>
                </ul>
                <i class="fas fa-ellipsis-h"></i>
            </div>
            <div class="calendar">
                <ul>
                    <li><i class="fas fa-swimmer"></i> </li>
                    <li><i class="fas fa-map-marker-alt"></i> </li>
                    <li> <i class="far fa-calendar-alt"></i></li>
                    <li><i class="far fa-clock"></i></li>
                </ul>
                <i class="fas fa-ellipsis-h"></i>
            </div>
            <div class="calendar">
                <ul>
                    <li><i class="fas fa-swimmer"></i> </li>
                    <li><i class="fas fa-map-marker-alt"></i> </li>
                    <li> <i class="far fa-calendar-alt"></i></li>
                    <li><i class="far fa-clock"></i></li>
                </ul>
                <i class="fas fa-ellipsis-h"></i>
            </div>
            <div class="calendar">
                <ul>
                    <li><i class="fas fa-swimmer"></i> </li>
                    <li><i class="fas fa-map-marker-alt"></i> </li>
                    <li> <i class="far fa-calendar-alt"></i></li>
                    <li><i class="far fa-clock"></i></li>
                </ul>
                <i class="fas fa-ellipsis-h"></i>
            </div>
            <div class="calendar">
                <ul>
                    <li><i class="fas fa-swimmer"></i> </li>
                    <li><i class="fas fa-map-marker-alt"></i> </li>
                    <li> <i class="far fa-calendar-alt"></i></li>
                    <li><i class="far fa-clock"></i></li>
                </ul>
                <i class="fas fa-ellipsis-h"></i>
            </div>

        </left-bar>
        <main-content>


                <form action="addEvent" method="POST">
                    <div class="message">
                        <?php
                        if(isset($messages) && !isset($signup)){
                            foreach ($messages as $message){
                                echo $message;
                            }
                        }
                        ?>
                    </div>
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