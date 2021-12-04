<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/cabecera.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">
</head>
<body>
   <form action="validar.php" method="post">
   <h1 class="animate__animated animate__backInLeft">INICIAR SESION</h1>
   <p>Usuario <input type="text" placeholder="ingrese su nombre" name="usuario" id="usuario"></p>
   <p>Contraseña <input type="password" placeholder="ingrese su contraseña" name="contrasena" id="contrasena"></p>
   <input type="submit" value="Ingresar">
   
   </form> 
</body>
</html>

<?php
include('db.php');
$usuario=$_POST['usuario'];
$contrasena=$_POST['contrasena'];
session_start();
$_SESSION['usuario']=$usuario;


$conexion=mysqli_connect("localhost","root","","sl");

$consulta="SELECT*FROM empleado where nombreE='$usuario' and codigoE='$contrasena' ";
$resultado=mysqli_query($conexion,$consulta);

$filas=mysqli_num_rows($resultado);

if($filas){
  
    header("location:homeUsuario.php");

}else{
    ?>
    <?php
    include("index.html");

  ?>
  <h1 class="bad">BANCO FALABELLA EL BANCO DE TODOS </h1>
  <?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);
