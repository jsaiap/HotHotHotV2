
<main id="capteur-section">
    <section class="main-section">
        <h2>Mon compte</h2>

        <section class="classic-box" id="account-info">
            <?php

                if(!empty($_SESSION['user']->picture)){
                    echo '<img src="'. $_SESSION['user']->picture.'" alt="">';
                }else{
                    echo '<img src="/Assets/img/profil.png" alt="">';
                }
           
            ?>
            <h3>Informations</h3>
            <?php 

            foreach($_SESSION['user']->fields as $field){
                if(!empty($_SESSION['user']->{$field['name']}) && $field['name'] != "picture" && $field['name'] != "id" ){
                    echo '<label for="'. $field['name'] .'">'.$field['name'] .'</label>';
                    echo '<p>'. $_SESSION['user']->{$field['name']} . '</p>';
                }
            } 
            ?>
        </section>
    </section>
</main>

<script src="/Assets/js/script.js"></script>
<script src="/Assets/js/sensor.js"></script>