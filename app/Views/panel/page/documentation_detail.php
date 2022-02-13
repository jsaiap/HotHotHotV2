
<main id="main">
    <section class="main-section">
        <h2 class="page-name">Documentation</h2>
         <table>
            <form action="/documentation/update" method="POST">
                <input type="hidden" name="id" value="<?php echo $view['documentation']->id ?>">
                <thead>
                    <tr>
                        <th><input class="title-input" type="text" name="title" value="<?php echo $view['documentation']->title ?>"></th>
                    </tr>
                </thead>
                <tbody>
                    
                    <tr>
                        <td><textarea name="text" cols="50" rows="35"><?php echo $view['documentation']->text ?></textarea></td>
                    </tr>
                    <tr>
                        <td><button class="table-btn-outlined" type="submit">Modifier</button> </td>
                    </tr>
                </tbody>
                
             </form>
         </table>
    </section>
</main>

<script src="/Assets/js/main.js"></script>