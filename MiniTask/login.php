<?php
session_start();

// Se già loggato → vai a index
if (isset($_SESSION['user'])) {
    header('Location: index.php');
    exit;
}

// Se ha inviato il form → salva e reindirizza
if (isset($_GET['user']) && !empty($_GET['user'])) {
    $_SESSION['user'] = $_GET['user'];
    $_SESSION['contatore'] = 0;
    header('Location: index.php');
    exit;
}
?>

<?php include 'includes/header.php'; ?>