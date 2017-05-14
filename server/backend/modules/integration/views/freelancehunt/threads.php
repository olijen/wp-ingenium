<h1>Переписка</h1>

<?php

    foreach ($threads as $key => $thread) : ?>
        <hr />
        <img src="<?php echo $thread['from']['avatar_md'] ?>" />
        <a href="post-message-to-thread?thread_id=<?php echo $thread['thread_id'] ?>">Отправить тестовое сообщение</a>

        <br />ИД <?php echo $thread['thread_id'] ?>
        <br />Тема <?php echo $thread['subject'] ?>
        <br />ЮРЛ <?php echo $thread['url'] ?>
        <br />АПИ ЮРЛ <?php echo $thread['url_api'] ?>
        <br />Есть ли прикрепления <?php echo $thread['has_attach'] ?>
        <br />Кол-во сообщений <?php echo $thread['message_count'] ?>
        <br />Время первого сообщения <?php echo $thread['first_post_time'] ?>
        <br />Время последнего сообщения <?php echo $thread['last_post_time'] ?>
        <br />Не прочтённое? <?php echo $thread['is_unread'] ?>
        <br />ИД профиля <?php echo $thread['from']['profile_id'] ?>
        <br />
        <br />'$login' <?php echo $thread['from']['login'] ?>
        <br />'$fname' <?php echo $thread['from']['fname'] ?>
        <br />'$sname' <?php echo $thread['from']['sname'] ?>
        <br />'$url' <?php echo $thread['from']['url'] ?>
        <br />'$avatar' <?php echo $thread['from']['avatar'] ?>
        <br />'$avatar_md' <?php echo $thread['from']['avatar_md'] ?>

    <?php endforeach; ?>