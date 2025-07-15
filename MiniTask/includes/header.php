<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Gestione Eventi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
</head>
<body>
    <header class="container">
        <h1>Gestione Eventi</h1>
    
        <?php if (isset($_SESSION['user'])): ?>
            <div>
                Utente: <strong><?= htmlspecialchars($_SESSION['user']) ?></strong> –
                Operazioni effettuate: <?= $_SESSION['contatore'] ?? 0 ?>
            </div>
        <?php endif; ?>
        
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="add.php">Aggiungi Evento</a></li>
            </ul>
        </nav>
        
        <hr>
        
        <?php
        // Mostra messaggio flash solo se la funzione esiste
        if (function_exists('flash') && ($msg = flash())): ?>
            <div><strong><?= htmlspecialchars($msg) ?></strong></div>
        <?php endif; ?>
    </header>
