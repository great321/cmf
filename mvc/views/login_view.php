<h1>Login</h1>

<?php if ($data['error']): foreach ($data['error'] as $row): ?>
<div><?php echo $row; ?></div>
<?php endforeach; endif; ?>

<?php if (! User::$login) :?>

<?php else :?>

<?php endif; ?>

