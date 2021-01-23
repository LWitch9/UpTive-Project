

<!DOCTYPE html>
<head>
    <link rel="stylesheet" type=text/css href="public/css/style.css">
    <link rel="stylesheet" type=text/css href="public/css/events.css">
    <link rel="stylesheet" type=text/css href="public/css/profile.css">

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
                        <div class="socials">
                            <i class="fab fa-facebook-f"></i>
                            <i class="fab fa-instagram"></i>
                            <i class="fab fa-twitter"></i>
                            <i class="fab fa-snapchat-ghost"></i>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </main-content>
    </main>
    <?php include("navigation_bar_mobile.php") ?>
</div>
</body>