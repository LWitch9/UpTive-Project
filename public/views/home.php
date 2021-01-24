
<!DOCTYPE html>
<head>
    <link rel="stylesheet" type=text/css href="public/css/style.css">
    <link rel="stylesheet" type=text/css href="public/css/events.css">
    <link rel="stylesheet" type=text/css href="public/css/glide.core.min.css">
    <link rel="stylesheet" type=text/css href="public/css/glide.theme.min.css">

    <script defer src="https://cdn.jsdelivr.net/npm/@glidejs/glide"></script>
    <script defer type="text/javascript" src="public/js/glide.js" ></script>
    <script defer src="https://kit.fontawesome.com/2f35c77861.js" crossorigin="anonymous"></script>
    <title>HOME PAGE</title>
</head>
<body>
    <div class="base-container">
        <?php include("includes/navigation_bar.php") ?>
        <?php include("includes/upper_navigation_bar_mobile.php") ?>
        <main>
            <left-bar>
                <?php include("includes/calendar-bar.php") ?>
            </left-bar>
            <main-content>
                <div class="title-label">IN PROGRESS</div>
                <?php include("includes/events-container-small.php") ?>
                <div class="title-label">RECOMMENDED</div>
                <!-- TODO -->

            </main-content>
        </main>
        <?php include("includes/navigation_bar_mobile.php") ?>
    </div>

</body>