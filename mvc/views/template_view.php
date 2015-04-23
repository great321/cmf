<!DOCTYPE html>
<html>
<head>
<title>%SiteName%</title>
<meta charset="utf-8">
<meta name="keywords" content="">
<meta name="description" content="">
<link rel="stylesheet" href="/theme/default/css/style.css">
</head>
<body class="primary">
    <div class="darkprimary">
        <center>SiteName</center>
    </div>
    <div class="primary">
        <span><a href="/">Home</a></span>
        <span><a href="/Desc">Desc</a></span>
        <span></span>
    </div>
    <div class="primary">
        <span><a href="/Login">Login</a></span>
        <span></span>
    </div>
    <div class="primary">
        <?php include 'mvc/views/'.$content_view; ?>
    </div>
</body>
</html>