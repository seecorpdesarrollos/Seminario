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
});
$('.star').on('click', function() {
    var idArticle = $('.article').attr('data-id');
    var voto = $(this).attr('data-vote');
    datos = {
        votars: 'sim',
        tema: idArticle,
        punto: voto,
    };
    // console.log(datos);
    $.ajax({
        url: 'votar',
        method: "POST",
        data: datos,
        success: function(respuesta) {
            // JSON.parse(respuesta);length
            console.log(Object.keys(respuesta));
            var i = Object.keys(respuesta)
            if (i.length != 847) {
                $('.yavoto').html('<p class="text-danger">Usted ya votó. Solamente puede votar una vez.</p>');
                // console.log(i);
                window.setTimeout('location.reload()', 2000);
            } else if (i.length == 847) {
                $('.yavoto').html('<p class="text-success">Gracias por votar!</p>');
                window.setTimeout('location.reload()', 2000);
            }
        }
    });
});