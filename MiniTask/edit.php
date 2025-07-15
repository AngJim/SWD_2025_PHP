<?php 
include 'includes/session.php';
include 'includes/header.php';
include_once 'includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    // ✅ Leggi l’ID dalla query string
    $id = $_GET['id'] ?? null;

    if ($id === null) {
        flash("ID evento mancante.");
        header("Location: index.php");
        exit;
    }

    // ✅ Cerca l'evento con quell'ID
    $evento = get_event_by_id($id);

    if (!$evento) {
        flash("Evento non trovato.");
        header("Location: index.php");
        exit;
    }

    // ✅ Mostra il form precompilato
    include 'views/form.php';
}elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // ✅ Leggi l’ID e i nuovi dati dal form
    $id = $_POST['id'] ?? null;
    $title = $_POST['title'] ?? '';
    $description = $_POST['description'] ?? '';
    $date = $_POST['date'] ?? '';

    if (!$id || !$title || !$date) {
        flash("ID, titolo e data sono obbligatori.");
        header("Location: index.php");
        exit;
    }

    // ✅ Carica tutti gli eventi
    $events = load_events();

    // ✅ Cerca l’indice dell’evento da modificare
    foreach ($events as &$event) {
        if ($event['id'] == $id) {
            // ✅ Sovrascrive i dati
            $event['title'] = $title;
            $event['description'] = $description;
            $event['date'] = $date;
            break;
        }
    }

    // ✅ Salva l’array aggiornato
    save_events($events);

    // ✅ Incrementa operazioni e mostra flash
    $_SESSION['contatore']++;
    flash("Evento aggiornato con successo!");

    // ✅ Redirige alla home
    header("Location: index.php");
    exit;
}
