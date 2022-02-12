
<main id="capteur-section">
    <section class="main-section">
        <h2 class="page-name">Paramètres</h2>
        <section class="classic-box">
            <h1 class="classic-box-header">Paramètres</h1>
            <section class="setting-row">
                <span class="material-icons">
                brightness_6
                </span>
                <h2>Dark mode</h2>
                <?php
                if($_SESSION['setting']->darkmode == 1)$checked = "checked"  ;
                else $checked = "" ;
                echo '<input id="darkmode" type="checkbox" '.$checked.'></input>';
            ?>
            </section>
        
        </section>
    </section>
</main>

<script src="/Assets/js/main.js"></script>
<script src="/Assets/js/sensor.js"></script>