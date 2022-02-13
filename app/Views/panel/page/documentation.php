
<main id="main">
    <section class="main-section">
        <h2 class="page-name">Documentation</h2>
        <table class="w-70">         
            <?php
                echo '<thead><tr>';
                echo '<th class="th-title d-flex-center">Titre<a class="text-dec-none d-flex-center" href="/panel/newdoc"><span id="add-doc" class="material-icons">add_circle</span></a></th>';
                echo '</tr></thead>';
                echo '<tbody>';
                foreach($view['documentations'] as $documentation){
                    echo '<tr>';
                    echo '<td><a class="doc-a" href="/panel/documentation?id='.$documentation['id'].'">'.$documentation['title'].'</td>';
                    echo '</tr>';
                }
                echo '</tbody>';
            ?>
        </table>
    </section>
</main>

<script src="/Assets/js/main.js"></script>