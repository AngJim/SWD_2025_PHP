<?php

session_start();

if (isset($_GET['user']) && !empty($_GET['user'])) {
    // Se l'utente è nuovo o è stato cambiato
    if (!isset($_SESSION['user']) || $_SESSION['user'] !== $_GET['user']) {
        $_SESSION['user'] = $_GET['user'];
        $_SESSION['contatore'] = 0; // Reset contatore per il nuovo utente
    }
}


// Se non c’è nessun utente in sessione, forza un login fittizio
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

// Inizializza contatore operazioni, se non già presente
if (!isset($_SESSION['contatore'])) {
    $_SESSION['contatore'] = 0;
}


function flash($message = null) {
    if ($message !== null) {
        // Setta il messaggio
        $_SESSION['flash'] = $message;
    } elseif (isset($_SESSION['flash'])) {
        // Leggi e cancella il messaggio
        $msg = $_SESSION['flash'];
        unset($_SESSION['flash']);
        return $msg;
    }
    return null;
}