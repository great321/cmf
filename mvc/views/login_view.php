<h1>Login</h1>

<?php if($data['success'] == false && User::$username == false) : ?>
Form
<?php if ($data['errors']): foreach ($data['errors'] as $row): ?>
<div><?php echo $row; ?></div>
<?php endforeach; endif; ?>
<form action="login.php" method="post">
<br/>Username:<br/>
<p><input type="text" name="username" value="<?php $data['username'] ?>" maxlength="20"/></p>
<br/>Password:<br/>
<input type="password" name="password" value="<?php $data['password'] ?>" maxlength="20"/>
<p><input type="submit" value="Login"/></p>
</form>


<?php elseif($data['success'] == true && User::$username == true) : ?>
Success.
<?php elseif($data['success'] == false && User::$username == true) :?>
No.
<?php endif; ?>
