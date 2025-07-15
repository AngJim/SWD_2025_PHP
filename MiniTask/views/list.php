<main>
<?php if (empty($events)): ?>
    <p>Nessun evento disponibile.</p>
<?php else: ?>
    <table>
        <thead>
            <tr>
                <th>Titolo</th>
                <th>Descrizione</th>
                <th>Data</th>
                <th>Azioni</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($events as $event): ?>
                <tr>
                    <td><?= htmlspecialchars($event['title']) ?></td>
                    <td><?= htmlspecialchars($event['description']) ?></td>
                    <td><?= htmlspecialchars($event['date']) ?></td>
                    <td>
                        <a href="edit.php?id=<?= $event['id'] ?>">✏️ Modifica</a>
                        <a href="delete.php?id=<?= $event['id'] ?>">🗑️ Elimina</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>
</main>

