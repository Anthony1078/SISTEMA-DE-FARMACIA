<?php  


include('../app/config/config.php');

$nombres = $_POST['nombres'];
$ap_paterno = $_POST['ap_paterno'];
$ap_materno = $_POST['ap_materno'];
$ci = $_POST['ci'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$pais = $_POST['pais'];
$celular = $_POST['celular'];
$codigo_postal = $_POST['codigo_postal'];
$email = $_POST['email'];
$password = $_POST['password'];
$cargo = $_POST['cargo'];
$genero = $_POST['genero'];

$email_tabla = '';
$query_usuarios = $pdo->prepare("SELECT * FROM tb_usuarios WHERE email = '$email' ");
$query_usuarios->execute();
$usuarios = $query_usuarios->fetchAll(PDO::FETCH_ASSOC);
foreach ($usuarios as $usuario){
    $email_tabla = $usuario['email'];
}
if( $email_tabla == $email ){
    echo "<h1>Este usuario ya existe en la base de datos, por favor revisa la lista de usuarios </h1>";
}else{
  //echo "Este usuario no exisite";
  $user_creacion = "anthony_10_58@outlook.com";

date_default_timezone_set("America/Lima");
$fechaHora = date('Y-m-d h:i:s');
$estado = '1';

$nombre_de_foto_perfil = "Sisfarmacia-".date('Y-m-d-h-i-s');
$filename = $nombre_de_foto_perfil."_".$_FILES['file']['name'];

$location = "update_usuarios/".$filename;

move_uploaded_file($_FILES['file']['tmp_name'],$location); 

//echo $nombre ." - ".$ap_paterno." - ".$ap_materno." - ".$ci." - ".$fecha_nacimiento." - ".$pais." - ".$celular." - ".$codigo_postal." - ".$email." - ".$password." - ".$cargo;

$sentencia = $pdo->prepare("INSERT INTO tb_usuarios
        ( nombres, ap_paterno, ap_materno, ci, fecha_nacimiento, genero, pais, celular, codigo_postal, foto_perfil, email, password, cargo, user_creacion, fyh_creacion, estado)
  VALUES(:nombres,:ap_paterno,:ap_materno,:ci,:fecha_nacimiento,:genero,:pais,:celular,:codigo_postal,:foto_perfil,:email,:password,:cargo,:user_creacion,:fyh_creacion,:estado)");

$sentencia->bindParam(':nombres',$nombres);
$sentencia->bindParam(':ap_paterno',$ap_paterno);
$sentencia->bindParam(':ap_materno',$ap_materno);
$sentencia->bindParam(':ci',$ci);
$sentencia->bindParam(':fecha_nacimiento',$fecha_nacimiento);
$sentencia->bindParam(':genero',$genero);
$sentencia->bindParam(':pais',$pais);
$sentencia->bindParam(':celular',$celular);
$sentencia->bindParam(':codigo_postal',$codigo_postal);
$sentencia->bindParam(':codigo_postal',$codigo_postal);
$sentencia->bindParam(':foto_perfil',$filename);
$sentencia->bindParam(':email',$email);
$sentencia->bindParam(':password',$password);
$sentencia->bindParam(':cargo',$cargo);
$sentencia->bindParam(':user_creacion',$user_creacion);
$sentencia->bindParam(':fyh_creacion',$fechaHora);
$sentencia->bindParam(':estado',$estado);

if($sentencia->execute()){
    //echo "Usuarios insertado a la bse de datos, Correctamente";
    header('Location: '.$URL.'/usuarios');
}else{
   echo "No se pudo insertar al usuario a la base de datos";
}
}