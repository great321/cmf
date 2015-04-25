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
<div id="master-header">
<hgroup>
<h1>SiteName</h1>
<h2 id="site-description">This is an awesome description of the site!</h2>
</hgroup>

</div>
<header id="master-header" class="clearfix" role="banner">


	</header> 
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
    
<footer id="footer" >
<p>
Copyright &copy; 20xx <a href="/">Sitename</a></p>
</footer>
</body>
</html>