
<main id="capteur-section">
    <section class="main-section">
        <h2>Mon compte</h2>
        <form class="classic-box" id="account-info" action="edit">
        <img id="edit-user" class="mod-user" src="https://img.icons8.com/material/24/000000/horizontal-settings-mixer--v1.png" alt="" />
            <?php

                if(!empty($_SESSION['user']->picture)){
                    echo '<img class="user-img" src="'. $_SESSION['user']->picture.'" alt="">';
                }else{
                    echo '<img class="user-img" src="/Assets/img/profil.png" alt="">';
                }
           
            ?>
            <h3>Informations</h3>
            <?php 

            foreach($_SESSION['user']->fields as $field){
                if(!empty($_SESSION['user']->{$field['name']}) && $field['name'] != "picture" && $field['name'] != "id" ){
                    echo '<label for="'. $field['name'] .'">'.$field['name'] .'</label>';
                    echo '<input readonly="readonly" value="'. $_SESSION['user']->{$field['name']} . '" >';
                }
            } 
            ?>
        </form>
    </section>
</main>

<script src="/Assets/js/script.js"></script>
<script src="/Assets/js/sensor.js"></script>