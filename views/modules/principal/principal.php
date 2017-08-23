<?php session_start();
if (!isset($_SESSION['emailUser'])) {
    header('location:login');
}?>
<?php if (isset($_SESSION['emailUser'])) {
    echo 'Hola...' . $_SESSION['nameUser'];
}?>
<h1>Principal...</h1>
<a href="session">Salir</a>
