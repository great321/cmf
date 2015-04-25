<h1>Login</h1>

<?php if ($data['success'] == false && User::$username == false) : ?>
    Form
    <?php if (count($data['errors'])): foreach ($data['errors'] as $row): ?>
            <div><?php echo $row; ?></div>
        <?php endforeach;
    endif; ?>
    <form action="login" method="post">
        <br/>Username:<br/>
        <input type="text" name="username" value="<?php echo $data['username']; ?>" maxlength="20"/>
        <br/>Password:<br/>
        <input type="password" name="password" value="<?php echo $data['password']; ?>" maxlength="20"/>
        <p><input type="submit" name="submit" value="Login"/></p>
    </form>
    <br/><a class="lightprimary" href="registration">Registration</a>

<?php elseif ($data['success'] == true && User::$username == true) : ?>
    Success.
<?php elseif ($data['success'] == false && User::$username == true) : ?>
    No.
<?php elseif ($data['success'] == true && User::$username == false) : ?>
    No. Wrong password.
<?php endif; ?>