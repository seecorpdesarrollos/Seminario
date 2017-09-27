
<script src="views/bootstrap/js/jquery.min.js"></script>
<script src="views/bootstrap/js/tether.min.js"></script>
<script src="admin/assets/dataTables/js/jquery.dataTables.js"></script>
<script src="admin/assets/dataTables/js/dataTables.bootstrap4.js"></script>
<script src="views/bootstrap/js/bootstrap.min.js"></script>
<script src="views/bootstrap/validate/dist/jquery.validate.js"></script>
<script src="views/bootstrap/js/jquery.cookie.js"> </script>
<script src="views/bootstrap/js/jquery-ui.min.js"> </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script src="views/bootstrap/js/front.js"></script>
<script src="views/bootstrap/js/app.js"></script>
<script src="admin/enciclopedia/config/js/votaciones.js"></script>



<script>
   $(document).ready(function() {
     $('#registro').on('click', function(){
     $("#formulario").validate({
  rules: {
    nombre: "required",
    codigo: "required",
    password:{
      required:true,
      minlength:6,
      maxlength:20
    },
    password2:{
      required:true,
      minlength:6,
      maxlength:20
    },
    correo: {
      required: true,
      email: true
    }
  },
  messages: {
    nombre: "<span class='text-danger'>El Nombre es obligatorio</span>",
    codigo: "<span class='text-danger text-center'>El Código es obligatorio</span>",
   password: {
      required: "<span class='text-danger'>La Contraseña es obligatoria</span>",
      minlength: "<span class='text-danger'>La Contraseña no puede tener menos 6 caracteres</span>",
      maxlength: "<span class='text-danger'>La contraseña no puede tener mas de 20  caracteres</span>"
    },
    password2: {
      required: "<span class='text-danger'>La Contraseña repetida es obligatorio</span>",
      minlength: "<span class='text-danger'>La Contraseña no puede tener menos 6 caracteres</span>",
      maxlength: "<span class='text-danger'>La Contraseña no puede tener mas de 20  caracteres</span>"
    },
    correo: {
      required: "<span class='text-danger'>El Correo es obligatorio</span>",
      email: "<span class='text-danger'>El Correo tiene que ser válido</span>"
    }
  }
});
   });

  $('#change').on('click', function(){
     $("#formulario").validate({
  rules: {

     password:{
      required:true,
      minlength:6,
      maxlength:20
    },
    password2:{
      required:true,
      minlength:6,
      maxlength:20
    },
  },
  messages: {

    password: {
      required: "<span class='text-danger'>La contraseña es obligatoria</span>",
      minlength: "<span class='text-danger'>La contraseña no puede tener menos 6 caracteres</span>",
      maxlength: "<span class='text-danger'>La contraseña no puede tener mas de 20  caracteres</span>"
    },
    password2: {
      required: "<span class='text-danger'>La Contraseña repetida es obligatorio</span>",
      minlength: "<span class='text-danger'>La contraseña no puede tener menos 6 caracteres</span>",
      maxlength: "<span class='text-danger'>La contraseña no puede tener mas de 20  caracteres</span>"
    },
  }
});
   });


       $('#ingresar').on('click', function(){
     $("#form").validate({
  rules: {
    passwordUser:"required",
    emailUser: {
      required: true,
      email: true
    }
  },
  messages: {
    passwordUser: "<span class='text-danger'>La contraseña es Obligatorio</span>",
    emailUser: {
      required: "<span class='text-danger'>El Correo es Obligatorio</span>",
      email: "<span class='text-danger'>El Correo tiene que ser Válido</span>"
    }
  }
});
   });
})


               $(document).ready(function(){
               $(function () {
  $('[data-toggle="tooltip"]').tooltip()
});
  $('#tablas').DataTable({
    "language": {
        "sProcessing": "Procesando...",
        "sLengthMenu": "Mostrar _MENU_ registros",
        "sZeroRecords": "No se encontraron resultados",
        "sEmptyTable": "Ningún dato disponible en esta tabla",
        "sInfo": "Total de registros: _TOTAL_ ",
        "sInfoEmpty": "registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered": "(total de _MAX_ registros)",
        "sInfoPostFix": "",
        "sSearch": "Buscar:",
        "sUrl": "",
        "sInfoThousands": ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst": "Primero",
            "sLast": "Último",
            "sNext": "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
    }
});
});
   </script>

</body>
</html>
