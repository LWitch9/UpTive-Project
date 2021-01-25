
<!DOCTYPE html>
<head>
    <link rel="stylesheet" type=text/css href="public/css/style1.css">
    <link rel="stylesheet" type=text/css href="public/css/events.css">
    <link rel="stylesheet" type=text/css href="public/css/profile.css">
    <link rel="stylesheet" type=text/css href="public/css/glide.core.min.css">
    <link rel="stylesheet" type=text/css href="public/css/glide.theme.min.css">

    <script src="https://cdn.jsdelivr.net/npm/@glidejs/glide"      defer></script>
    <script type="text/javascript" src="public/js/glideProfile.js" defer ></script>
    <script src="https://kit.fontawesome.com/2f35c77861.js" crossorigin="anonymous"></script>
    <title>PROFILE PAGE</title>
</head>
<body>
<div class="base-container">
    <?php include("includes/navigation_bar.php") ?>
    <?php include("includes/upper_navigation_bar_mobile.php") ?>
    <main>
        <left-bar>
            <?php include("includes/calendar-bar.php") ?>
        </left-bar>
        <main-content-profile>
            <left-main>

                <div class="avatar-profile">
                    <img src="public/img/avatars/<?= $profileUser->getAvatar()?>.jpg" alt="Avatar">
                </div>
                <br>
                <h><?= $profileUser->getName() ." ".$profileUser->getSurname()?></h>
                <div class="socials">
                    <i class="fab fa-facebook-f"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-snapchat-ghost"></i>
                </div>
                <div class="title-label">BIO</div>
                <div class="bio-text">
                    <?= $profileUser->getBio()?>

                </div>

                <div class="title-label">CURRENT ACTIVITIES</div>
                <?php include("includes/events-container-small.php") ?>
            </left-main>
            <right-main>
                <div class="title-label">ACTIVITIES</div>
                <?php foreach ($activities as $activity):?>
                    <div class="activity-container">
                        <i class="fas fa-swimmer"></i>
                        <div class="activity">
                            <?= $activity ?>
                        </div>
                        <div class="activity-level"></div>
                    </div>
                <?php endforeach; ?>

                <div class="title-label">ACHIEVEMENTS</div>
                <?php foreach ($achievements as $achievement):?>
                    <div class="achievement-container">
                        <div class="achievement-text-container">
                            <div class="achievement-title"><?= $achievement->getTitle() ?></div>
                            <div class="achievement-text">
                                <?= $achievement->getText() ?>
                            </div>

                        </div>
                        <div class="avatar">
                            <img src="public/img/achievements/<?= $achievement->getImg() ?>.jpg" alt="Avatar">
                        </div>
                    </div>
                <?php endforeach; ?>

            </right-main>
        </main-content-profile>


    </main>
    <?php include("includes/navigation_bar_mobile.php") ?>

</div>

</body>