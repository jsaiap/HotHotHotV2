
<main id="capteur-section">
    <section class="main-section">
        <h2>Mon compte</h2>
        <section>
            <h3>Informations</h3>
            <?php 

            foreach($_SESSION['user']->fields as $field){
                echo "<p>". $_SESSION['user']->{$field['name']} . "</p>";
            } 
            ?>
        </section>
    </section>
</main>

<script src="/Assets/js/script.js"></script>
<script src="/Assets/js/sensor.js"></script>