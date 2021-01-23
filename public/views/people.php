

<!DOCTYPE html>
<head>
    <link rel="stylesheet" type=text/css href="public/css/style.css">
    <link rel="stylesheet" type=text/css href="public/css/events.css">
    <link rel="stylesheet" type=text/css href="public/css/profile.css">

    <script defer type="text/javascript" src="public/js/search.js" ></script>
    <script src="https://kit.fontawesome.com/2f35c77861.js" crossorigin="anonymous"></script>
    <title>PEOPLE</title>
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
            <div class="search-bar">
                <i class="fas fa-search"></i>
                <input placeholder="search people">
            </div>
            <div class="people-container">
                <?php foreach ($people as $person):?>
                    <div class="person">
                        <form id ="profile-other-user" action="profileOtherUser" method="POST">
                            <input type=hidden name=email value=<?= $person->getEmail() ?> >
                            <button>
                                <div class="avatar-profile">
                                    <img src="public/img/avatars/<?= $person->getAvatar()?>.jpg" alt="Avatar">
                                </div>
                            </button>
                        </form>

                        <br>
                        <h><?= $person->getName() ." ".$person->getSurname()?></h>
                    </div>
                <?php endforeach; ?>
            </div>
        </main-content>
    </main>
    <?php include("navigation_bar_mobile.php") ?>
</div>
</body>

<template id="people-template">
    <div class="person">
        <form id ="profile-other-user" action="profileOtherUser" method="POST">
            <input type=hidden id="email" name=email value="">
            <button>
                <div class="avatar-profile">
                    <img src="" alt="Avatar">
                </div>
            </button>
        </form>

        <br>
        <h>Name Surname</h>
    </div>
</template>