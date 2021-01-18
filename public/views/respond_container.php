<?php
if($event['request']!=null):
    ?>
    <div class="respond-container">
        <form id="reject" action="reject" method="POST">
            <input type=hidden name=eventID value=<?= $event['id']?> >
            <input type=hidden name=requestEmail value=<?= $event['request']->getEmail() ?> >
            <button>reject</button>
        </form>
        <form id="accept" action="accept" method="POST">
            <input type=hidden name=eventID value=<?= $event['id']?> >
            <input type=hidden name=requestEmail value=<?= $event['request']->getEmail() ?> >
            <button>accept</button>

        </form>
        <div class="avatar_event">
            <img src="public/img/avatars/<?= $event['request']->getAvatar() ?>.jpg" alt="Avatar">
        </div>
    </div>
<?php endif; ?>