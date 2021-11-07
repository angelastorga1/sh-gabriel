<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>




<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#"><img src="../dist/images/logo.png"   height="100" alt="" srcset=""></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav mr-auto">
      <?php 
          $_SESSION['ID_USUARIO'];  
         $numero = $_SESSION['NUMERO_TELEFONO_USUARIO']; 
          $_SESSION['ID_ESTATUS_USUARIO']; 
          $rol =$_SESSION['ID_ROL_USUARIO'];
          
          if($rol == 1){

          
          
          ?>
        <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Noticias</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">configuracion de la cuenta</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" id="btn_verificacion" data-toggle="modal" data-target="#exampleModal" href="Verificacion.php">¿Quieres ser creador de contenido? verificate</a>
      
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../php/cerrar_sesion.php">Cerrar sesion</a>
        </li>
        <?php } 
        if($rol == 2){

        
        
        ?>
            <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Crear noticias</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Noticias</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">configuracion de la cuenta</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../php/cerrar_sesion.php">Cerrar sesion</a>
        </li>
       
        <?php } ?>
      </ul>
      
    </div>
  </nav>
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Verificacion de cuenta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="d-flex justify-content-center align-items-center container">
    <div class="card py-5 px-3">
        <h5 class="m-0">Verificacion por telefono(whats app)</h5><span class="mobile-text">Ingresa el codigo verificacion<b class="text-danger"><br>+52 <?php echo $numero; ?></b></span>
        <div class="d-flex flex-row mt-5">
          <input type="text" name="primer_digito" id="primer_digito" min="1" max="1"  class="form-control" autofocus="">
          <input type="text" name="segundo_digito" id="segundo_digito" min="1" max="1"  class="form-control">
          <input type="text" name="tercer_digito" id="tercer_digito" min="1" max="1"  class="form-control">
          <input type="text" name="cuarto_digito" id="cuarto_digito"min="1" max="1"  class="form-control"></div>
          <input type="hidden" name="numero" id="numero" value="<?php echo $numero; ?>">
        <div class="text-center mt-5"><span class="d-block mobile-text">¿No recibi el codigo de verificacion?</span><span class="font-weight-bold text-danger cursor"><a href="http://">Reennviar</a></span></div>
    </div>
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" id="btn_verificar_numero" class="btn btn-primary">Verificar cuenta</button>
      </div>
    </div>
  </div>
</div>

<script>
  $("#btn_verificar_numero").on("click",function() {
var numero = $("#numero").val();
var primer_digito = $("#primer_digito").val();
var segundo_digito = $("#segundo_digito").val();
var tercer_digito = $("#tercer_digito").val();
var cuarto_digito = $("#cuarto_digito").val();

var numero_verificacion = primer_digito+segundo_digito+tercer_digito+cuarto_digito;
   alert(numero_verificacion); 

var data_string = 'numero='+ numero +'&numero_verificacion='+numero_verificacion; 
console.log(data_string);
$.ajax({
  url:"../php/verificar_numero.php",
  method:"GET",
  data:[data_string],
  contentType:false,
  cache:false,
  processData:false,
  success:function(data)
  {
    if(data == 0){
      alert("Tu cuenta ha sido verificada, por favor cierra sension y vuelve a iniciarla para ver los cambios");
    }
    if(data ==1){
      alert("Ocurrio un error vuelve a intentarlo  o el codigo de verificacion es incorrecto");
    }
    if(data ==2){
      alert("Has encotrado un error de programacion por favor ponte en contacto con el departamento de sistemas");
    }
   
 
  }
});

   
    
    
    
  
     
      
    });
    
  
$("#btn_verificacion").on("click",function() {
    
    

var numero = $("#numero").val();




var data_string = 'numero='+ numero; 
console.log(data_string);
$.ajax({
  url:"../php/enviar_codigo_verificacion.php",
  method:"GET",
  data:[data_string],
  contentType:false,
  cache:false,
  processData:false,
  success:function(data)
  {
   
 
  }
});

 
  
});



</script>