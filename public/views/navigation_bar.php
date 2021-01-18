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
        <a href="#" class="button">
            <span>HOME</span>
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
            <button >
                <i class="fas fa-sign-out-alt"></i>
            </button>
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