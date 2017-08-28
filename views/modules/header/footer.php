
<script src="views/bootstrap/js/jquery.min.js"></script>
<script src="views/bootstrap/js/tether.min.js"></script>
<script src="views/bootstrap/js/bootstrap.min.js"></script>
<script src="views/bootstrap/validate/dist/jquery.validate.js"></script>
<script src="views/bootstrap/js/jquery.cookie.js"> </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<!-- <script src="views/bootstrap/js/charts-home.js"></script> -->
<!-- Google Analytics: change UA-XXXXX-X to be your site's ID.-->
<!---->
<script src="views/bootstrap/js/front.js"></script>
<script>
  (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
  function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
  e=o.createElement(i);r=o.getElementsByTagName(i)[0];
  e.src='//www.google-analytics.com/analytics.js';
  r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
  ga('create','UA-XXXXX-X');ga('send','pageview');
</script>
<script>
   $(document).ready(function() {
     $('#registro').on('click', function(){
     $("#formulario").validate({
  rules: {
    nombre: "required",
    password:"required",
    password2:"required",
    correo: {
      required: true,
      email: true
    }
  },
  messages: {
    nombre: "<span class='text-danger'>El nombre es Obligatorio</span>",
    password: "<span class='text-danger'>La Contraseña es Obligatorio</span>",
    password2: "<span class='text-danger'>La Contraseña repetida es Obligatorio</span>",
    correo: {
      required: "<span class='text-danger'>El Correo es Obligatorio</span>",
      email: "<span class='text-danger'>El Correo tiene que ser Válido</span>"
    }
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
     });
  $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
   </script>
</body>
</html>
