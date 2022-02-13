
<main id="main">
    <section class="main-section">
        <h2 class="page-name">Liste des utilisateurs</h2>

        <table>         
            <?php
                echo '<thead><tr>';
                foreach($_SESSION['user']->fields as $field){
                    if ($field['name'] == 'picture' || $field['name'] == 'password' || $field['name'] == 'google' || $field['name'] == 'token' || $field['name'] == 'token_date') continue;
                    if($field['name'] == 'id') {
                        echo '<th>'. str_replace('_', ' ', ucfirst($field['name'])).'</th>';
                        continue;
                    } 
                    echo '<th class="w-10">'. str_replace('_', ' ', ucfirst($field['name'])).'</th>';
                }
                echo '<th class="w-30"></th>';
                echo '</tr></thead>';
                echo '<tbody>';
                foreach($view['users'] as $user){
                    echo '<tr><form action="/user/update" method="POST">';
                    foreach($_SESSION['user']->fields as $field){
                        if ($field['name'] == 'picture' || $field['name'] == 'password' || $field['name'] == 'google' || $field['name'] == 'token' || $field['name'] == 'token_date') continue;
                        if($field['name'] == 'id'){
                            echo '<td><input  type="hidden" name="'.$field['name'].'" value="'.$user[$field['name']].'">'.$user[$field['name']].'</td>';
                            continue;
                        }

                        $type = strtok($field['type'], '(');
                        $type = ($type == "INT" || $type == "BIT" || $type == "BOOLEAN") ? "number" : "text" ;
                        echo '<td><input type="'. $type .'" name="'.$field['name'].'" value="'.$user[$field['name']].'"></td>';
                    }
                    echo '<td><button class="table-btn-outlined" type="submit">Modifier</button>
                        <a class="table-btn" href="/user/delete?id='.$user['id'].'">Supprimer</a>
                    </td>';
                    echo '</form><tr>';
                }
                echo '</tbody>';
            ?>
        </table>
    </section>
</main>

<script src="/Assets/js/main.js"></script>