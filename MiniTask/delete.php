<?php

include 'includes/session.php';
include 'includes/header.php';
include_once 'includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = $_GET['id'] ?? null;
    $evento = get_event_by_id($id);

    if (!$evento) {
        flash("Evento non trovato.");
        header("Location: index.php");
        exit;
    }

    // Mostra pagina di conferma
    include 'views/confermaEliminazione.php';

} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? null;
    $events = load_events();

    $filtered = array_filter($events, fn($e) => $e['id'] != $id);
    if (count($filtered) === count($events)) {
        flash("Evento non trovato.");
    } else {
        save_events(array_values($filtered));
        $_SESSION['contatore']++;
        flash("Evento eliminato con successo.");
    }

    header("Location: index.php");
    exit;
}
