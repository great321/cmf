<h1>Registration</h1>

<?php if ($data['success'] == false && User::$username == false) : ?>
    Form
    <?php if (count($data['errors'])): foreach ($data['errors'] as $row): ?>
            <div><?php echo $row; ?></div>
        <?php endforeach;
    endif; ?>
    <form action="registration" method="post">
        <br/>Username:<br/>
        <input type="text" name="username" value="<?php echo $data['username']; ?>" maxlength="20"/>
        <br/>Password:<br/>
        <input type="password" name="password" value="<?php echo $data['password']; ?>" maxlength="20"/>
        <p><input type="submit" name="submit" value="Registration"/></p>
    </form>
    <br/><a class="lightprimary" href="login">Log in</a>

<?php elseif ($data['success'] == true && User::$username == false) : ?>
<div class="lightprimary">Success. Now you can <a href="login">log in</a></div>
<?php elseif ($data['success'] == false && User::$username == true) : ?>
    No.
<?php endif;?>