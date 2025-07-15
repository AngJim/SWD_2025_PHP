<main class="container">
    <h2><?= isset($evento['id']) ? 'Modifica evento' : 'Aggiungi nuovo evento' ?></h2>

    <form 
  method="POST" 
  action="<?= isset($evento['id']) ? 'edit.php' : 'add.php' ?>"
  <?= isset($evento['id']) ? 'onsubmit="return confirm(\'Sei sicuro di voler modificare questo evento?\')"' : '' ?>
>

    <?php if (isset($evento['id'])): ?>
        <input type="hidden" name="id" value="<?= $evento['id'] ?>">
    <?php endif; ?>

    <label for="title">Titolo</label>
    <input 
        type="text" 
        id="title" 
        name="title" 
        required 
        value="<?= htmlspecialchars($evento['title']) ?>">

    <label for="description">Descrizione</label>
    <textarea 
        id="description" 
        name="description"
        rows="4"
    ><?= htmlspecialchars($evento['description']) ?></textarea>

    <label for="date">Data</label>
    <input 
        type="date" 
        id="date" 
        name="date" 
        required 
        value="<?= htmlspecialchars($evento['date']) ?>">

    <button type="submit">
        <?= isset($evento['id']) ? 'Salva modifiche' : 'Aggiungi evento' ?>
    </button>
    </form>
</main>
