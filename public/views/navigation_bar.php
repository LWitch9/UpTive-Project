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
            ADD EVENT
        </div>
    </a>
    <div class="navi">
        <a href="http://localhost:8080/home" class="button">
            HOME
        </a>
    </div>
    <div class="navi">
        <a href="http://localhost:8080/events" class="button">
            EVENTS
        </a>
    </div>
    <div class="navi">
        <a href="http://localhost:8080/people" class="button">
            PEOPLE
        </a>
    </div>
    <div class="navi-icons">
        <a href="http://localhost:8080/settingsProfile" class="button">
            <i class="fas fa-cog"></i>
        </a>
        <i class="far fa-bell" ></i>
        <form id ="logout" action="logout" method="GET">
            <button >
                <i class="fas fa-sign-out-alt"></i>
            </button>
        </form>

    </div>

    <div class="avatar-container">
        <a href="http://localhost:8080/profile" class="button">
            <div class="avatar">
                <img src="public/img/avatars/<?= $user->getAvatar() ?>.jpg" alt="Avatar">
            </div>
        </a>
        <br><br><br>
        <?= $user->getName() ." ".$user->getSurname()?>
    </div>


</nav-bar>