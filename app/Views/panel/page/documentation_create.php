
<main id="main">
    <section class="main-section">
        <h2 class="page-name">Creation de documentation</h2>
        <form class="form-doc" action="/documentation/create" method="POST">
            <label for="title">Titre</label>
            <input type="text" name="title" placeholder="">
            <label for="text">Text</label>
            <textarea name="text" cols="50" rows="30" placeholder="Documentation ici"></textarea>
            <button class="end table-btn" type="submit">Créer</button>
        </form>
    </section>
</main>

<script src="/Assets/js/main.js"></script>