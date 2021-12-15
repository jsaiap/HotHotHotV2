
<main id="capteur-section">
    <section class="main-section">
        <h2>Paramètres</h2>
        <section class="classic-box">
            <h1 class="hidden">Paramètres</h1>
            <?php
                    if($_SESSION['setting']->darkmode == 1)$checked = "checked"  ;
                    else $checked = "" ;
                    echo '<label for="darkmode">Dark Mode</label>';
                    echo '<input id="darkmode" type="checkbox" '.$checked.'></input>';
                
            ?>
        </section>
    </section>
</main>

<script src="/Assets/js/script.js"></script>
<script src="/Assets/js/sensor.js"></script>