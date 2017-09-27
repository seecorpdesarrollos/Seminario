<?php

if (!isset($_SESSION['emailUser'])) {
    header('location:login');
} else {
    $name = ucwords($_SESSION['nameUser']);
    $emailUser = $_SESSION['emailUser'];
    $dateUser = $_SESSION['dateUser'];
    require 'admin/enciclopedia/config/conexion.php';

}

// var_dump($themeId);
// var_dump($point);
if (isset($_POST['votars'])) {
    $themeId = (int) $_POST['tema'];
    $point = (int) $_POST['punto'];
    /*Seleeciono y saco el idUser del Usuario*/
    $vuser = $conexion->prepare('SELECT  histv.emailUser FROM historyvotes histv
    WHERE histv.idTheme=:themeId AND histv.emailUser=:emailUser    ');
    $vuser->bindValue(':themeId', $themeId);
    $vuser->bindValue(':emailUser', $emailUser);

    $vuser->execute();
    $resultvuser = $vuser->fetch(PDO::FETCH_COLUMN);
    /* Fin Usuario*/
    /*Theme*/
    $vtheme = $conexion->prepare('SELECT  histv.idTheme FROM historyvotes histv

WHERE histv.idTheme=:themeId AND histv.emailUser=:emailUser');
    $vtheme->bindValue(':themeId', $themeId);
    $vtheme->bindValue(':emailUser', $emailUser);

    $vtheme->execute();
    $resultvtheme = $vtheme->fetch(PDO::FETCH_COLUMN);

    if ($emailUser == $resultvuser && $themeId == $resultvtheme) {
        echo $thanks = '';

        // die(json_encode($thanks));

    } else {

        /*Insertar a la tabla History votes*/
        $inserthistory = $conexion->prepare('INSERT INTO historyvotes (idTheme,emailUser)

    VALUES (:themeId,:emailUser )');

        $inserthistory->execute(array(
            ':themeId' => $themeId,
            ':emailUser' => $emailUser));

        $pegaArtigo = $conexion->prepare("SELECT votes, points FROM `themes` WHERE `idTheme` = ?");
        $pegaArtigo->execute(array($themeId));
        while ($row = $pegaArtigo->fetchObject()) {
            $pontosUpd = ($row->points + $point);
            $votosUpd = ($row->votes + 1);

            $atualizaArtigo = $conexion->prepare("UPDATE `themes` SET `votes` = ?, `points` = ? WHERE `idTheme` = ?");
            if ($atualizaArtigo->execute(array($votosUpd, $pontosUpd, $themeId))) {
                $calculo = round(($pontosUpd / $votosUpd), 1);
                $ca = 1;
                die(json_encode($ca));

            }
        }

    }

}
