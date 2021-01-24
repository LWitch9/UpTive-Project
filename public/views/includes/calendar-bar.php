<div class="title-label">CALENDAR</div>
<?php if(isset($calendars)): ?>
    <?php foreach ($calendars as $calendar):?>
        <div class="calendar">
            <ul>
                <li><i class="fas fa-swimmer"></i><?= $calendar->getActivity() ?></li>
                <li><i class="fas fa-map-marker-alt"></i><?= $calendar->getLocation() ?></li>
                <li> <i class="far fa-calendar-alt"></i><?= $calendar->getDate() ?></li>
                <li><i class="far fa-clock"></i><?= $calendar->getTime() ?></li>
            </ul>
            <i class="fas fa-ellipsis-h"></i>
        </div>
    <?php endforeach; ?>
<?php endif;?>
