
<nav-bar-mobile>
    <div class="icon-container-mobile">
        <a href="http://localhost:8080/home" class="button">
            <i class="fas fa-home"></i>
        </a>
        <h>HOME</h>

    </div>
    <div class="icon-container-mobile">
        <a href="http://localhost:8080/events" class="button">
            <i class="fas fa-running"></i>
        </a>
        <h>EVENTS</h>

    </div>
    <div class="icon-container-mobile">
        <a href="http://localhost:8080/people" class="button">
            <i class="fas fa-users"></i>
        </a>
        <h>PEOPLE</h>
    </div>
    <div class="icon-container-mobile">
        <form id ="logoutMob" action="logout" method="GET">
            <button id="logoutMob" >
                <i class="fas fa-sign-out-alt"></i>
            </button>
        </form>
        <h>LOGOUT</h>
    </div>
    <a href="http://localhost:8080/profile" class="button">
        <div class="avatar">

            <img src="public/img/avatars/<?= $user->getAvatar() ?>.jpg" alt="Avatar">

        </div>
    </a>

</nav-bar-mobile>
