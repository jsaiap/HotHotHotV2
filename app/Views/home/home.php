<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google-signin-client_id" content="845297051358-pvjbk8iiksbnubsealcib1avhof0i5oa.apps.googleusercontent.com">
    <title>HotHotHot</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link id="style" rel="stylesheet" href="/Assets/css/home.css">
    <link rel="shortcut icon" href="/Assets/img/favicon.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Glory:wght@400;600;800&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700;800&family=Montserrat:wght@500&display=swap" rel="stylesheet">
</head>

<body>
<main id="home">
    <img id="phone" src="/Assets/img/phone.png" alt="">
    <section class="v-box">
        <h1 id="name">H</h1>
        <p id="subtitle">Hot Hot Hot</p>
    </section>
    <section class="v-box slogan">
        <h1 class="slogan-text">Gère tes capteurs,</h1>
        <p class="slogan-text">t'as capté</p>
        <button id="connect" onclick="openForm()">Connexion</button>
    </section>
</main>

<section id="form-box" class="h-box">
    <form id="login" method="POST" action="login">
        <h2 class="title-form">Connexion</h2>
        <div class="g-signin2" data-onsuccess="onSignIn"></div>
        <label class="black-label" for="username">Identifiant</label>
        <input id="username" name="username" type="text">
        <label class="black-label" for="password">Mot de passe</label>
        <input id="password" name="password" type="password">
        <button class="btn-connect">Se connecter</button>
    </form>

    <form id="register" method="POST" action="register">
        <h2 class="title-form">Inscription</h2>
        <label for="username-i">Identifiant</label>
        <input id="username-i" name="username" type="text">
        <label for="mail-i"  >E-mail</label>
        <input id="mail-i" name="email" placeholder="exemple@hothothot.fr" type="email">
        <label for="password-i">Mot de passe</label>
        <input id="password-i" name="password" type="password">
        <input id="conf-password-i" name="password-confirm" placeholder="Confimer votre mot de passe" type="password">
        <button class="btn-connect">S'inscrire</button>
    </form>
</section>

<script src="/Assets/js/script.js"></script>
<script src="/Assets/js/google-button.js"></script>
<script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>
<script src="https://apis.google.com/js/platform.js" async defer></script>
</body>

</html>