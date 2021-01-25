<!DOCTYPE html>
<head>
    <link rel="stylesheet" type=text/css href="public/css/style1.css">
    <link rel="stylesheet" type=text/css href="public/css/events.css">
    <link rel="stylesheet" type=text/css href="public/css/formEvent.css">
    <script src="https://kit.fontawesome.com/2f35c77861.js" crossorigin="anonymous"></script>
    <title>ADD EVENT</title>
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
                <form id="addEvent" action="addEvent" method="POST">
                    <div class="title-label">BASICS</div>
                    <div class="form-container">
                        <select id="activity" name="activity" required>
                            <option value="" disabled selected>Choose activity</option>
                            <?php foreach ($activities as $activity):?>
                            <option value="<?= $activity ?>"><?= $activity ?></option>
                            <?php endforeach; ?>
                        </select>
                        <select id="type" name="type" >
                            <option value="" disabled selected>Choose preferred type of training</option>
                            <option value="ea">EASY</option>
                            <option value="mid">MEDIUM</option>
                            <option value="ha">HARD</option>
                        </select>
                    </div>
                    <div class="title-label">LOCATION AND TIME</div>
                    <div class="form-container">
                        <select id="location" name="location" required>
                            <option value="" disabled selected>Choose preferred location</option>
                            <?php foreach ($locations as $location):?>
                                <option value="<?= $location ?>"><?= $location ?></option>
                            <?php endforeach; ?>
                        </select>
                        <input type="date" name="date" id="date" min="2021-01-01" max="2023-12-31" required>
                        <input type="time" id="time" name="time" required>
                    </div>
                    <div class="title-label">OPTIONAL</div>
                    <textarea name="about" id="about" cols='50' rows='10' ></textarea>
                    <button id="addEvent">ADD EVENT</button>
                </form>
        </main-content>
    </main>
    <?php include("includes/navigation_bar_mobile.php") ?>

</div>
</body>