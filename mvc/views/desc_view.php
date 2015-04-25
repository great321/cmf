<h1>Desc</h1>

<?php if (User::$username == true) : ?>
    Form
    <?php if (count($data['errors'])): foreach ($data['errors'] as $row): ?>
            <div><?php echo $row; ?></div>
        <?php endforeach;
    endif; ?>
    <form action="desc" method="post">
        <br/>Message:<br/>
        <textarea rows="10" name="message"><?php echo $data['message']; ?></textarea><br/>
        <p><input type="submit" name="submit" value="Send"/></p>
    </form>
    <br/>
<?php endif; ?>
<?php if (count($data['messages'])): foreach ($data['messages'] as $msg): ?>
            <div><?php echo $msg['username']; ?> <?php echo $msg['time']; ?></div>
            <div><?php echo $msg['text']; ?></div><br/>
<?php endforeach; endif; ?>
