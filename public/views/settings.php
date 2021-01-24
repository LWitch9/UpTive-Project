<div class="title-label">SETTINGS</div>
<a href="http://localhost:8080/settingsProfile" class="button">
    EDIT PROFILE
</a>
<?php if($_COOKIE['isAdmin']): ?>
<a href="http://localhost:8080/settingsForm" class="button">
    EDIT 'ADD ACTIVITY' FORM
</a>
<?php endif?>