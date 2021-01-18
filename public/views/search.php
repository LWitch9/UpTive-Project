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
    <script src="https://kit.fontawesome.com/2f35c77861.js" crossorigin="anonymous"></script>
    <title>SEARCH PAGE</title>
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
            <div class="events-container">
                <?php foreach ($events as $event):?>
                <form id ="request" action="request" method="POST">
                <div class="event">
                    <input type=hidden name=eventID value=<?= $event['id']?> >
                    <input type=hidden name=ownerEmail value=<?= $event['owner']->getEmail() ?> >
                    <div class="squared-avatar">
                        <img src="public/img/avatars/<?= $event['owner']->getAvatar() ?>.jpg" alt="Avatar">
                        <?= $event['owner']->getName() ." ".$event['owner']->getSurname()?>
                    </div>

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
                    <div class="event_search_labels">
                        <ul>
                            <li id="activity"><i class="fas fa-swimmer"></i><?= $event['event']->getActivity() ?> </li>
                            <li id="location"><i class="fas fa-map-marker-alt"></i><?= $event['event']->getLocation()?>  </li>
                            <li id="date"> <i class="far fa-calendar-alt"></i><?= $event['event']->getDate() ?> </li>
                            <li id="time"><i class="far fa-clock"></i><?= $event['event']->getTime() ?> </li>
                        </ul>
                    </div>
                    <div class="message-container">
                        <?= $event['event']->getMessage() ?>
                    </div>

                        <button>REQUEST</button>
                </div>
                </form>
                <?php endforeach; ?>
            </div>

        </main-content>


    </main>

    <?php include("navigation_bar_mobile.php") ?>
</div>
</body>