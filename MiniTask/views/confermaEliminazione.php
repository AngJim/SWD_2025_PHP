<div class="container">
    <h2>Conferma eliminazione</h2>

    <p>Sei sicuro di voler eliminare l’evento <strong><?= htmlspecialchars($evento['title']) ?></strong>?</p>

    <form method="POST" action="delete.php">
    <input type="hidden" name="id" value="<?= $evento['id'] ?>">
    <button type="submit"> Sì, elimina</button>
    <a href="index.php" role="button" class="secondary">No, annulla</a>
    </form>
</div>
