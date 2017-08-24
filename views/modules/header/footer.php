
     <!--      <nav class="navbar navbar-inverse">
          <div class="container">
            <cite class="citeFooter">
                Copy &copy todos los derechos reservados <?php echo date('Y') . ' '; ?> Alumnos 3° Año Isei
            </cite>
          </div>
        </nav> -->

   <script src="views/bootstrap/js/jquery.min.js"></script>
   <script src="views/bootstrap/js/tether.min.js"></script>
   <script src="views/bootstrap/js/bootstrap.min.js"></script>
   <script src="views/bootstrap/validate/dist/jquery.validate.js"></script>
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
     })
   </script>
</body>
</html>