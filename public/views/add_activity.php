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
        <div class="add-activity">
            <i class="fas fa-plus-circle"></i>
            ADD ACTIVITY
        </div>
        <div class="navi">HOME</div>
        <div class="navi">SEARCH</div>
        <div class="navi">FRIENDS</div>
        <div class="navi-icons">
            <i class="fas fa-cog"></i>
            <i class="far fa-bell"></i>
            <i class="fas fa-sign-out-alt"></i>
        </div>

        <div class="avatar-container">
            <div class="avatar">
                <img src="public/img/basic.jpg" alt="Avatar">
            </div>
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


                <form>
                    <div class="title-label">BASICS</div>
                    <div class="form-container">
                        <select id="activity" name="activity" required>
                            <option value="" disabled selected>Choose activity</option>
                            <option value="sw">Swimming</option>
                            <option value="sw">Swimming</option>
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
                        <select id="location" name="location"  required>
                            <option value="" disabled selected>Choose preferred location</option>
                            <option value="kr-kro">KRAKOW,KROWODRZA</option>
                            <option value="kr-str">KRAKOW,STARE MIASTO</option>
                            <option value="kr-kzi">KRAKOW,KAZIMIERZ</option>
                        </select>
                        <input type="date" name="date" id="date" min="2021-01-01" max="2023-12-31" required>
                        <input type="time" id="time" name="time" required>
                    </div>
                    <div class="title-label">OPTIONAL</div>
                    <textarea name="about" id="about" cols='50' rows='10'></textarea>


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