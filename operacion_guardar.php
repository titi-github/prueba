<!DOCTYPE html> 
<html>
<head>
          <title>tabla</title>
         
</head>
<body>
	<div class="mostrardatos">
<center>

 		<tr>
 			<th><a href="formulario.html">NUEVO</a></th>
  		     <th>verifica tu registro y pulsa en NUEVO para crear nuevos registros</th>
  		</tr>

<table  border = 1px>
<thead>
 		
</thead>
<tbody>
        <tr>
	    <td>ID</td> 
	    <td>NOMBRE</td> 
	    <td>APELLIDO</td>
	    <td>EMAIL</td>
	    <td>TELEFONO</td>
	    <td>MATERIA</td>
         </tr>

<?php
$conexion=mysqli_connect('localhost','root','','operaciones');
$sql="SELECT * from \\\[-[[i990p8iiii8usuarios";
$result=mysqli_query($conexion,$sql);
while($mostrar=mysqli_fetch_array($result)){
?>
<tr>
    <td><?php echo $mostrar['id'] ?></td>
    <td><?php echo $mostrar['nombre'] ?></td>
    <td><?php echo $mostrar['apellido'] ?></td>
    <td><?php echo $mostrar['genero'] ?></td>
    <td><?php echo $mostrar['email'] ?></td>
    <td><?php echo $mostrar['telefono'] ?></td>
    <td><?php echo $mostrar['materia'] ?></td>
</tr>
<?php
}
?>

</tbody>
</table>
</center>
</body>
</html>     

<table border = 1px>
<center>
<?php
$conexion=mysqli_connect('localhost','root','','operaciones');
?>

<?php
$conexion=mysqli_connect('localhost','root','','operaciones');
$consulta = "SELECT * FROM \\\[-[[i990p8iiii8usuarios";
$resultado = mysqli_query($conexion,$consulta);
$total =mysqli_num_rows($resultado);
echo 'EL TOTAL DE REGISTRO ES: '.$total.'';
?>
</table>
</center>
</body>
</html>

<?php
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$genero = $_POST['genero'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$materia = $_POST['materia'];

if(!empty($nombre) || !empty($apellido) || !empty($genero)|| !empty($email)|| !empty($telefono)|| !empty($materia) ){
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "operaciones";
    
    $conn = new mysqli($host,$dbusername,$dbpassword,$dbname);
    if(mysqli_connect_error()){
        die('connect error('.mysqli_connect_errno().')'.mysqli_connect_error());
    }
else {
    	 $SELECT = "SELECT telefono from \\\[-[[i990p8iiii8usuarios where telefono = ? limit 1 ";
        $INSERT = "INSERT INTO \\\[-[[i990p8iiii8usuario (nombre,apellido,genero,email,telefono,materia)values(?,?,?,?,?,?)";

        $stml = $conn->prepare($SELECT);
        $stml ->bind_param( "i", $telefono);
        $stmt ->execute();
        $stmt ->bind_result($telefono);
        $stmt ->store_result();
        $rnum =$stmt->num_rows;
        if ($rnum == 0){
        $stmt->close();
	    $stmt = $conn->prepare($INSERT);
        $stmt ->bind_param("ssssis", $nombre,$apellido,$genero,$email,$telefono,$materia);
        $stmt ->execute();
        echo "REGISTRO COMPLETADO.";
}
else {
	echo "numero ya registrado";
}
            $stmt->close();
            $conn->close();

}   

}
else { 
	echo "todos los datos son OBLIGATORIOS";
	die();
}
?> 