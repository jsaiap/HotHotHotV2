<header>
    <section id="title" class="v-box">
        <h1 id="name">H</h1>
        <p id="subtitle">Hot Hot Hot</p>
    </section>

    <img onclick="openMenu()" id="menu" src="/Assets/img/icons8-menu.png" alt="">
    <nav id="side-menu">
        <ul>
            <li id="account">
                <img class="icon" src="https://img.icons8.com/material-rounded/24/000000/admin-settings-male.png" alt="" /> Mon compte
            </li>
            <li id="sensors" class="selected">
                <img class="icon" src="https://img.icons8.com/material-rounded/24/000000/temperature--v1.png" alt="" /> Mes capteurs
            </li>
            <li id="settings">
                <img class="icon" src="https://img.icons8.com/material/24/000000/horizontal-settings-mixer--v1.png" alt="" /> Parametres
            </li>
            <li id="logout">
                <img id="logout-icon" class="icon" src="/Assets/img/icons8-exit4.png" alt="" /> Déconnexion
            </li>
        </ul>

        <?php
            if($_SESSION['user']->admin == 1){
                echo '  <ul>
                            <li id="users">
                                <img class="icon" src="https://img.icons8.com/material-rounded/24/000000/admin-settings-male.png" alt="" /> Utilisateurs
                            </li>
                            <li id="users">
                                <img class="icon" src="https://img.icons8.com/material-rounded/24/000000/admin-settings-male.png" alt="" /> Documentations
                            </li>
                        </ul>';
            }
        ?>
       
    </nav>

    <img id="close" src="/Assets/img/icons8-fermer.png" alt="">
</header>