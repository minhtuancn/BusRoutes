<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
  <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"></script>
  <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
  <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>

  <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
<script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>

  
  <title></title>

</head>

<body>
<?php
session_start();
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  $ruta = "../public/nav.html";
}else {
  $ruta = "../public/navGuest.html";
}
?>    
    
    <div id="nav-placeholder">

      </div>

      <br>
      <br>
      <div class="container">
        <h4>Realice consultas de los transportes publicos en Costa Rica de una manera sencilla </h4>
        <br>
        <br>

      
          <!--<div class="input-group-prepend">
            <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Buscar por </button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="#">Empresa</a>
              <a class="dropdown-item" href="#">Ruta</a>
              <a class="dropdown-item" href="#">DestinoFinal</a>
              <div role="separator" class="dropdown-divider"></div>
            </div>
          </div>-->
          <form action="javascript:getRoutes();" method="POST" >
          <div class="form-label-group">
                <input type="checkbox" name="inputEmpresa" id="inputEmpresa" class="" placeholder="Discapacidad">
                <label for="inputDiscapacidad" class="login-heading mb-2"><h6>Buscar por Empresa</h6></label>
                <input type="checkbox" name="inputDestino" id="inputDestino" class="" placeholder="Discapacidad">
                <label for="inputDiscapacidad" class="login-heading mb-2"><h6>Buscar por Destino</h6></label>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="inputNombre" id="inputNombre" aria-label="Text input with dropdown button">
          <div class="input-group-append">
              <button class="btn btn-outline-secondary" type="button">Consultar</button>
            </div>
        </div>
        <input type="hidden" name="lat" id="lat" class="form-control" readonly>
                <input type="hidden" name="lng" id="lng" class="form-control" readonly>
      
     
      <br>
      <br>
      <br>
      <br>


      </div>


 <div class="container" style="background-color: rgb(100,100,100);  ">
    <div class="container-fluid" id="mapid" style="height: 80%; width: 80%; position: absolute; ">

    </div>

 </div>
 <br>
 <br>
 </form>
 <script src="../public/mapRoutes.js"></script>



 <script>
    $(function(){
      var ruta = "<?php echo $ruta; ?>"
      $("#nav-placeholder").load(ruta);
    });

    function getRoutes(){
      
      var empresa = document.getElementById('inputEmpresa').checked;
      var destino = document.getElementById('inputDestino').checked;
      var nombre = document.getElementById('inputNombre').text;
      console.log(empresa);
        console.log(nombre);
        console.log(destino);
      //alert(selectedOption.value);               
      e.preventDefault // prevent form submission
      $.ajax({
        url: '../../controller/requests.php',
        type: "POST",
        dataType: 'json',
        data: {
          getCompanyInfo: "true",
          company: empresa.value,
          destiny: destino.value,
          name: nombre.value
        },
        success: function(result) {
          console.log(result[0]);
          console.log(result[1]);
          document.getElementById("lat").value = result[0];
          document.getElementById("lng").value = result[1];
          printCoordinates();
        },
        error: function(request, status, error) {
          alert('Ha surgido un error procesando su petición.');
          alert(error);
        }
      });
    });
    
    </script>

</body>
</html>