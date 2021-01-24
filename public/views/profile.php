
<!DOCTYPE html>
<head>
    <link rel="stylesheet" type=text/css href="public/css/style.css">
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
    <?php include("navigation_bar.php") ?>
    <?php include("upper_navigation_bar_mobile.php") ?>
    <main>
        <left-bar>
            <?php include("calendar-bar.php") ?>
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
                <div class="events-container">
                    <div class="glide">
                        <div data-glide-el="track" class="glide__track">
                            <ul class="glide__slides">
                                <?php foreach ($events as $event):?>
                                    <li class="glide__slide">
                                        <div class="event">
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
                                            <ul>
                                                <li><i class="fas fa-swimmer"></i><?= $event['event']->getActivity() ?></li>
                                                <li><i class="fas fa-map-marker-alt"></i><?= $event['event']->getLocation() ?></li>
                                                <li> <i class="far fa-calendar-alt"></i><?= $event['event']->getDate() ?></li>
                                                <li><i class="far fa-clock"></i><?= $event['event']->getTime() ?></li>
                                            </ul>
                                            <div class="status">Waiting for response</div>
                                            <div class="icons">
                                                <i class="far fa-edit"></i>
                                                <i class="far fa-comment-alt"></i>
                                                <i class="fas fa-ellipsis-h"></i>
                                                <i class="far fa-times-circle"></i>
                                            </div>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <div class="glide__arrows" data-glide-el="controls">
                            <button class="glide__arrow glide__arrow--left" data-glide-dir="<">
                                <i class="fas fa-chevron-left"></i>
                            </button>
                            <button class="glide__arrow glide__arrow--right" data-glide-dir=">">
                                <i class="fas fa-chevron-right"></i>
                            </button>
                        </div>
                    </div>

                </div>
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
                    <!--<i class="fas fa-plus-square"></i>-->
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
                <!--<i class="fas fa-plus-square"></i>-->
            </right-main>
        </main-content-profile>


    </main>
    <?php include("navigation_bar_mobile.php") ?>

</div>

</body>