
<!DOCTYPE html>
<head>
    <link rel="stylesheet" type=text/css href="public/css/style.css">
    <link rel="stylesheet" type=text/css href="public/css/events.css">
    <link rel="stylesheet" type=text/css href="public/css/form.css">

    <script src="https://kit.fontawesome.com/2f35c77861.js" crossorigin="anonymous"></script>
    <title>SETTINGS</title>
</head>
<body>
<div class="base-container">
    <?php include("navigation_bar.php") ?>
    <?php include("upper_navigation_bar_mobile.php") ?>
    <main>
        <left-bar>
            <?php include("settings.php") ?>
        </left-bar>
        <main-content>
            <form id="updateProfile" action="updateProfile" method="POST">
                <div class="title-label">NEW BIO</div>
                <textarea name="bio" id="about" cols='70' rows='10' ></textarea>
                <div class="title-label">ADD YOUR FAV ACTIVITY</div>
                <select class="settings" id="activity" name="activity">
                    <option value="" disabled selected>Choose activity</option>
                    <?php foreach ($activities as $activity):?>
                        <option value="<?= $activity ?>"><?= $activity ?></option>
                    <?php endforeach; ?>
                </select>
                <button>UPDATE PROFILE</button>
            </form>


        </main-content>
    </main>
    <?php include("navigation_bar_mobile.php") ?>
</div>
</body>