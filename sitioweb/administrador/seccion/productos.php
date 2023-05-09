<?php include("../template/cabecera.php"); ?>
<?php
$txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
$txtNombre=(isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
$txtImagen=(isset($_FILES['txtImagen']['name']))?$_FILES['txtImagen']['name']:"";
$accion=(isset($_POST['accion']))?$_POST['accion']:"";

echo $txtID."<br/>";
echo $txtNombre."<br/>";
echo $txtImagen."<br/>";
echo $accion."<br/>";

$host="localhost";
$bd="sitioweb";
$usuario="root";
$contraseña="";

try{
    $conexion=new PDO("mysql:host=$host;bdname=$bd",$usuario,$contraseña);
    if($conexion){echo "conectado..... a sistema";}
}catch(Exception $ex){
    echo $ex->getMessage();
}

switch($accion){
    case "Agregar":
        //INSERT INTO `juegos` (`id`, `nombre`, `imagen`) VALUES (NULL, 'Mario bros', 'imagen');
        $sentenciaSQL = $conexion->prepare("INSERT INTO `juegos` (`id`, `nombre`, `imagen`) VALUES (NULL, 'mario', 'imagen.jpg');");
        $sentenciaSQL->execute();
        echo "Presionado boton agregar";
        break;

    case "Modificar":
        echo "Presionado boton Modificar";
        break;

    case "Cancelar":
        echo "Presionado boton Cancelar";
        break;
}
?>

<div class="col-md-5">

    <div class="card">
        <div class="card-header">
            Datos de Juegos
        </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">

                    <div class = "form-group">
                        <label for="txtID">ID:</label>
                        <input type="text" class="form-control" name="txtID" id="txtID" placeholder="ID">
                    </div>

                    <div class = "form-group">
                        <label for="txtNombre">Nombre:</label>
                        <input type="text" class="form-control" name="txtNombre" id="txtNombre" placeholder="Nombre">
                    </div>

                    <div class = "form-group">
                        <label for="txtNombre">Imagen:</label>
                        <input type="file" class="form-control" name="txtImagen" id="txtImagen" placeholder="Imagen">
                    </div>

                    <div class="btn-group" role="group" aria-label="">
                        <button type="submit" name="accion" value="Agregar" class="btn btn-success">Agregar</button>
                        <button type="submit" name="accion" value="Modificar" class="btn btn-warning">Modificar</button>
                        <button type="submit" name="accion" value="Cancelar" class="btn btn-info">Cancelar</button>
                    </div>

                </form>
            </div>
        
    </div>

    
    
    
</div>

<div class="col-md-7">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>2</td>
                <td>Aprende php</td>
                <td>imagen.jpg</td>
                <td>seleccionar/borrar</td>
            </tr>
          
        </tbody>
    </table>
</div>

<?php include("../template/piedepagina.php")?>