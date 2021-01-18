<left-bar>
    <div class="title-label">CALENDAR</div>
    <?php foreach ($events as $event):?>
        <div class="calendar">
            <ul>
                <li><i class="fas fa-swimmer"></i><?= $event['event']->getActivity() ?></li>
                <li><i class="fas fa-map-marker-alt"></i><?= $event['event']->getLocation() ?></li>
                <li> <i class="far fa-calendar-alt"></i><?= $event['event']->getDate() ?></li>
                <li><i class="far fa-clock"></i><?= $event['event']->getTime() ?></li>
            </ul>
            <i class="fas fa-ellipsis-h"></i>
        </div>
    <?php endforeach; ?>
</left-bar>