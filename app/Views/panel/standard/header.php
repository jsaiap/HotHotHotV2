<header>
    <section id="title" class="v-box">
        <img id="logo" src="/Assets/img/logo.png" width="130px">
    </section>

    <img onclick="openMenu()" id="menu" src="/Assets/img/icons8-menu.png" alt="">
    <nav id="side-menu">
        <ul>
            <li id="account">
                <span class="material-icons">
                manage_accounts
                </span>
                <p> Mon compte </p>
            </li>
            <li id="sensors">
                <span class="material-icons">
                thermostat
                </span>
                <p> Mes capteurs </p>
            </li>
            <li id="settings">
                <span class="material-icons">
                tune
                </span>
                <p>Parametres </p>
            </li>
            <li id="logout">
                <span class="material-icons">
                logout
                </span>
                <p id="logout-icon" > Déconnexion</p>            
            </li>
        </ul>

        <?php
            if($_SESSION['user']->admin == 1){
                echo '  
                        
                        <ul>
                            <li id="users">
                                <span class="material-icons">
                                people_alt
                                </span>
                                Utilisateurs
                            </li>
                            <li id="documentation">
                                <span class="material-icons">
                                description
                                </span>
                                Documentations
                            </li>
                        </ul>';
            }
        ?>
       
    </nav>
    <img id="close" src="/Assets/img/icons8-fermer.png" alt="">
</header>

        
<section id="info">
        <?php
            echo '<h1>'.$_SESSION['user']->name.'</h1>'  ;
            if(isset($_SESSION['user']->picture) && !empty($_SESSION['user']->picture)) echo '<img id="profil-picture" src="'.$_SESSION['user']->picture .'" alt="">';
            else  echo '<img id="profil-picture" src="/Assets/img/profil.png" alt="">';
        ?>
     
</section>