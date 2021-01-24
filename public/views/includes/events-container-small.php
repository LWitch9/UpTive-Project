<div class="events-container">
    <?php if($events!=null): ?>
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
                                <div class="avatar_event">
                                    <img src="public/img/avatars/<?= $event['owner']->getAvatar() ?>.jpg" alt="Avatar">
                                </div>
                            </div>
                            <ul>
                                <li><i class="fas fa-swimmer"></i><?= $event['event']->getActivity() ?></li>
                                <li><i class="fas fa-map-marker-alt"></i><?= $event['event']->getLocation() ?></li>
                                <li> <i class="far fa-calendar-alt"></i><?= $event['event']->getDate() ?></li>
                                <li><i class="far fa-clock"></i><?= $event['event']->getTime() ?></li>
                            </ul>
                            <!--<div class="status">Waiting for response</div>-->
                            <?php if(isset($event['request'])): ?>
                                <?php include("respond_container.php") ?>
                            <?php endif; ?>
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


    <?php else: ?>
    <h>No events</h>
    <?php endif; ?>
</div>