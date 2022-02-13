
<main id="capteur-section">
    <section class="main-section">
        <h2 class="page-name">Paramètres</h2>
            <table class="w-70">
                <thead>
                    <tr><th>Paramètres</th></tr>
                </thead>
                <tbody>
                    <?php
                        foreach($_SESSION['setting']->fields as $field){
                            if($field['name'] == 'id' || $field['name'] == 'id_user' )continue;
                            echo '<tr><td>';
                            echo '<form class="space-between" method="POST" action="/setting/update">';
                            echo '<input type="hidden" name="name" value="'.$field['name'].'">';
                            echo ucfirst($field['name']) ;
                            if($_SESSION['setting']->{$field['name']} == 1){
                                echo '<button class="table-btn" type="submit">ON</button>';
                            }
                            else{
                                echo '<button class="table-btn-outlined" type="submit">OFF</button>';
                            }
                            echo '</form>';
                            echo '</td></tr>';
                        }
                    ?>
                </tbody>
            </table>
    </section>
</main>

<script src="/Assets/js/main.js"></script>
<script src="/Assets/js/sensor.js"></script>