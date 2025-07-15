<?php

// 0. Includi file di configurazione e avvia sessione
include 'includes/session.php';

// 1. Include header che avvia la sessione e mostra interfaccia
include 'includes/header.php';

// 2. Include funzioni per leggere il file JSON
include_once 'includes/functions.php';

// 3. Carica eventi
$events = load_events();

// 4. Mostra la lista eventi
include 'views/list.php';
?>