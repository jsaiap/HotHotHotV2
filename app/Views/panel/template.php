<?php
if(!isset($_SESSION) || !isset($_SESSION['user'])  || empty($_SESSION['user'])) header("Location: /home"); ?>

<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>HotHotHot</title>
        <meta name="google-signin-client_id" content="845297051358-pvjbk8iiksbnubsealcib1avhof0i5oa.apps.googleusercontent.com">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link id="style" rel="stylesheet" href="/Assets/css/style.css">
        <link rel="shortcut icon" href="/Assets/img/favicon.png" type="image/x-icon">
        <link rel="stylesheet" href="/Assets/css/info.css">
        <link href="https://fonts.googleapis.com/css2?family=Glory:wght@400;600;800&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    </head>
    <body>
         <?php include 'standard/header.php' ?>
        <?php echo $view['body'] ?>
        <?php include 'standard/footer.php' ?>
        <script src="https://apis.google.com/js/platform.js?onload=onLoad" async defer></script> 
        <script src="/Assets/js/google-button.js"></script>
     
    </body>
</html>