
<main id="main">
    <section class="main-section">
        <h2 class="page-name">Documentation</h2>
         <table class="w-70">
            <form action="/documentation/update" method="POST">
                <input type="hidden" name="id" value="<?php echo $view['documentation']->id ?>">
                <thead>
                    <tr>
                        <th><input class="input-responsive title-input" type="text" name="title" value="<?php echo $view['documentation']->title ?>"></th>
                    </tr>
                </thead>
                <tbody>
                    
                    <tr>
                        <td><textarea id="tiny-textarea" class="textarea-responsive" name="text" rows="35"><?php echo $view['documentation']->text ?></textarea></td>
                    </tr>
                    <tr>
                        <td><button class="table-btn-outlined" type="submit">Modifier</button> </td>
                    </tr>
                </tbody>
                
             </form>
         </table>
    </section>
</main>
<script src="https://cdn.tiny.cloud/1/t9yolp5o5dcprg7kahekq3cqz8l7ri0uqtxfqdmsusnwvmq8/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script src="/Assets/js/main.js"></script>
<script src="/Assets/js/tiny.js"></script>
