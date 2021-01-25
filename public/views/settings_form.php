
<!DOCTYPE html>
<head>
    <link rel="stylesheet" type=text/css href="public/css/style1.css">
    <link rel="stylesheet" type=text/css href="public/css/events.css">
    <link rel="stylesheet" type=text/css href="public/css/formEvent.css">

    <script src="https://kit.fontawesome.com/2f35c77861.js" crossorigin="anonymous"></script>
    <title>SETTINGS</title>
</head>
<body>
<div class="base-container">
    <?php include("includes/navigation_bar.php") ?>
    <?php include("includes/upper_navigation_bar_mobile.php") ?>
    <main>
        <left-bar>
            <?php include("includes/settings.php") ?>
        </left-bar>
        <main-content>
            <form id="updateForm" action="updateForm" method="POST">
                <div class="title-label">NEW LOCATION</div>
                <input type="text" id="location" name="location" class="settings">
                <div class="title-label">NEW ACTIVITY</div>
                <input type="text" id="activity" name="activity" class="settings">

                <button>ADD TO DATABASE</button>
            </form>


        </main-content>
    </main>
    <?php include("includes/navigation_bar_mobile.php") ?>
</div>
</body>