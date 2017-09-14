<?php
require '../config/conexion.php';

$emailUser = "davidhnmunoz@gmail.com";

if (isset($_POST['votar'])) {
    $themeId = (int) $_POST['artigo'];
    $point   = (int) $_POST['ponto'];

    /*Seleeciono y saco el idUser del Usuario*/
    $vuser = $conexion->prepare('SELECT  histv.emailUser

FROM
historyvotes histv


WHERE histv.idTheme=:themeId AND histv.emailUser=:emailUser    ');
    $vuser->bindValue(':themeId', $themeId);
    $vuser->bindValue(':emailUser', $emailUser);

    $vuser->execute();
    $resultvuser = $vuser->fetch(PDO::FETCH_COLUMN);
/* Fin Usuario*/
/*Theme*/
    $vtheme = $conexion->prepare('SELECT  histv.idTheme

FROM
historyvotes histv

WHERE histv.idTheme=:themeId AND histv.emailUser=:emailUser    ');
    $vtheme->bindValue(':themeId', $themeId);
    $vtheme->bindValue(':emailUser', $emailUser);

    $vtheme->execute();
    $resultvtheme = $vtheme->fetch(PDO::FETCH_COLUMN);

    if ($emailUser == $resultvuser && $themeId == $resultvtheme) {
        $wrong = 'Atencion: Usted ya voto';
        die(json_encode(array('yavoto' => $wrong)));

    } else {

        /*Insertar a la tabla History votes*/
        $inserthistory = $conexion->prepare('INSERT INTO historyvotes (idTheme,emailUser)

    VALUES (:themeId,:emailUser )');

        $inserthistory->execute(array(
            ':themeId'   => $themeId,
            ':emailUser' => $emailUser));

        $pegaArtigo = $conexion->prepare("SELECT votes, points FROM `themes` WHERE `idTheme` = ?");
        $pegaArtigo->execute(array($themeId));
        while ($row = $pegaArtigo->fetchObject()) {
            $pontosUpd = ($row->points + $point);
            $votosUpd  = ($row->votes + 1);

            $atualizaArtigo = $conexion->prepare("UPDATE `themes` SET `votes` = ?, `points` = ? WHERE `idTheme` = ?");
            if ($atualizaArtigo->execute(array($votosUpd, $pontosUpd, $themeId))) {
                $calculo = round(($pontosUpd / $votosUpd), 1);
                $thanks  = 'Gracias por votar';

                die(json_encode(array('average' => $calculo, 'votos' => $votosUpd, 'gracias' => $thanks)));
            }
        }

    }

}
