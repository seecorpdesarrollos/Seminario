<?php
require 'admin/enciclopedia/config/conexion.php';
$emailUser = $_SESSION['emailUser'];
if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];
    $rtheme = $conexion->prepare("SELECT * FROM themes them JOIN users us ON them.emailUser=us.emailUser WHERE idTheme = ?");
    $rtheme->execute(array($id));
    $res = $rtheme->fetch();
    // while ($theme = $rtheme->fetchObject()) {
    //     $calculo = ($theme->point == 0) ? 0 : round(($theme->point / $theme->votes), 1);

}
?>

  <?php $calculo = ($res['point'] == 0) ? 0 : round(($res['point'] / $res['votes']), 1);?>
<!-- empieza tabla -->
<table  class="table table-bordered table-sm table-responsive">
    <thead class="thead-inverse">
        <tr>
            <th colspan="2">
                <h2>
                    <center>
                        <?php echo $res['title']; ?>
                    </center>
                </h2>
            </th>
        </tr>
        <tr>
            <th class="align-top">
                Descripción:
            </th>
            <td>
                <?php echo $res['description']; ?>
            </td>
        </tr>
        <tr>
            <th class="align-top">
                Valoracion:
            </th>
            <td>
                <span class="ratingAverage" data-average=" <?php echo $calculo; ?> ">
                </span>
                <span class="article" data-id=" <?php echo $id; ?> ">
                </span>
                <div data-toggle="tooltip" data-placement="bottom" title="Puntuar" class="barra">
                    <span class="bg">
                    </span>
                    <span class="stars">
                        <?php for ($i = 1; $i <= 5; $i++): ?>
                        <span class="star" data-vote=" <?php echo $i; ?> ">
                            <span class="starAbsolute">
                            </span>
                        </span>
                        <?php endfor;
echo ' </span>
                    </div>
                    <p class="votos">
                        <span>
                            ' . $res['votes'] . '
                        </span>
                        voto/s /Ranking: ' . $calculo . '
                    </p>
                    ';
echo '
                </span>
            </div>
            <strong>
                <p class="yavoto text-danger">
                    <span>
                        ' . '
                    </span>
                </p>
            </strong>
            ';
echo '
        </span>
    </div>
    <strong>
        <p class="gracias text-success">
            <span>
                ' . '
            </span>
        </p>
    </strong>
    ';
?>
    <tr>
        <span class="sucess">
        </span>
        <span class="fail">
        </span>
    </td>
</tr>
<th class="align-top">
    Acción:
</th>
<td>
    <a data-toggle="tooltip" data-placement="bottom" title="Modificar" href="../modificar/?idtema= <?php echo $res['idTheme'] ?> ">
        <i class="editar fa fa-pencil-square-o fa-2x" aria-hidden="true">
        </i>
    </a>
    <a data-toggle="tooltip" data-placement="bottom" title="Eliminar"  href="../eliminar/?idtema= <?php echo $res['idTheme'] ?> ">
        <i class="eliminar fa fa-trash fa-2x" aria-hidden="true">
        </i>
    </a>
</td>
</tr>
<th class="align-top">
Propietario:
</th>
<td>
<?php echo $res['nameUser'] ?>
</td>
</tr>
<tr>
<th>
Creado:

</th>
<td>
<?php echo $res['dataTheme']; ?>

</td>
</tr>
</thead>
</table>
</div>
</div>
<script>
  $(function() {
    var average = $('.ratingAverage').attr('data-average');

    function avaliacao(average) {
        average = (Number(average) * 20);
        $('.bg').css('width', 0);
        $('.barra .bg').animate({
            width: average + '%'
        }, 500);
    }
    avaliacao(average);
    $('.star').on('mouseover', function() {
        var indexAtual = $('.star').index(this);
        for (var i = 0; i <= indexAtual; i++) {
            $('.star:eq(' + i + ')').addClass('full');
        }
    });
    $('.star').on('mouseout', function() {
        $('.star').removeClass('full');
    });
    $('.star').on('click', function() {
        var idArticle = $('.article').attr('data-id');
        var voto = $(this).attr('data-vote');
        $.post('../php/votar.php', {
            votar: 'sim',
            artigo: idArticle,
            ponto: voto
        }, function(retorno) {
            avaliacao(retorno.average);
            $('.votos span').html(retorno.votos);
            if ($('.yavoto span').length) {
                $('.yavoto span').html(retorno.yavoto);
                window.setTimeout('location.reload()', 2000);
            }
            if ($('.gracias span').length) {
                $('.gracias span').html(retorno.gracias);
                window.setTimeout('location.reload()', 2000);
            }
        }, 'jSON');
    });
});
</script>