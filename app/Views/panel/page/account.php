
<main id="capteur-section">
    <section class="main-section">
        <h2>Mon compte</h2>
        <form class="classic-box" id="account-info" method="POST" action="/account/edit">
        <img id="edit-user" class="mod-user" src="https://img.icons8.com/material/24/000000/edit--v1.png" alt="" />

            
            <?php
                if(!empty($_SESSION['user']->picture)){
                    echo '<img class="user-img" src="'. $_SESSION['user']->picture.'" alt="">';
                }else{
                    echo '<img class="user-img" src="/Assets/img/profil.png" alt="">';
                }
           
            ?>
            <h3>Informations</h3>
            <?php 
                    if ($_SESSION['user']->google != 1){
                        echo '<label for="username">Identifiant</label>';
                        echo '<input id="username" name="username" class="input-change" value="'. $_SESSION['user']->username . '" disabled>';
                    }

                    echo '<label for="name">Nom</label>';
                    echo '<input id="name" name="name" class="input-change" value="'. $_SESSION['user']->name . '" disabled>';
                     

                    if ($_SESSION['user']->google != 1){
                        echo '<label for="email">E-mail</label>';
                        echo '<input id="email" name="email" class="input-change" value="'. $_SESSION['user']->email . '" disabled>';
                      
                        echo '<label>Mot de passe</label>';
                        echo '<input id="password" class="input-change" value="*********" disabled>';
                        
                    }


                   
            ?>
        </form>
    </section>
</main>

<script src="/Assets/js/script.js"></script>
<script src="/Assets/js/sensor.js"></script>
<script src="/Assets/js/edit.js"></script>