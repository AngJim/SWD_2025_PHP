<?php

// Inizializza tutto (sessione, header HTML, nav, flash)
include 'includes/header.php';

// Carica funzioni comuni (JSON, ID, ecc.)
include_once 'includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Leggi i dati dal form
    $title = $_POST['title'] ?? '';
    $description = $_POST['description'] ?? '';
    $date = $_POST['date'] ?? '';

    if ($title && $date) {
        $events = load_events();
        $id = generate_id($events);
        $new_event = [
            'id' => $id,
            'title' => $title,
            'description' => $description,
            'date' => $date
        ];
    
        $events[] = $new_event;

        save_events($events);
        
        $_SESSION['contatore']++;
        // Imposta un messaggio flash da mostrare alla prossima pagina
        flash("Evento aggiunto con successo!");
        header('Location: index.php');
        exit;
        } else {
        // Se mancano dati obbligatori, puoi mostrare un errore (opzionale)
        flash("Titolo e data sono obbligatori.");
        }
    }else{
    // Richiesta GET → mostra il form vuoto per l'inserimento

    // Array vuoto da passare alla view del form
    $evento = [
        'title' => '',
        'description' => '',
        'date' => ''
    ];

    // Mostra il form (con input vuoti)
    include 'views/form.php';
}