<!DOCTYPE html>
<html>
<head>
<title>%SiteName%</title>
<meta charset="utf-8">
<meta name="keywords" content="">
<meta name="description" content="">
<link rel="stylesheet" href="/theme/default/css/style.css">
</head>
<body>
<div class="darkprimary">
<center>SiteName</center>
</div>
<div class="lightprimary">
<?php if (User::$username) : ?>
Hello <?php print_username(); ?>! <span><a href = "/exit">[exit]</a></span>
<?php else : ?>
<span><a href = "/login">Login</a></span>
<?php endif; ?>
</div>
<div class="primary">
<span><a href="/">Home</a></span>
<span><a href="/desc">Desc</a></span>
<span></span>
</div>
<div class="primary">
<?php include 'mvc/views/' . $content_view; ?>
</div>
</body>
</html>