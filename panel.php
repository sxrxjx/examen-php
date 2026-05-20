<?php
require_once 'init.php';
require_once 'conexion.php';

if(isset($_SESSION['username'])){
    $usuario=$_SESSION['username'];
 
}

try{
    $stmt = $gbd->prepare('SELECT * FROM usuarios');
    $stmt->execute();

    
} catch(PDOException $er){
    echo 'error al obtener los datos'. $er->getMessage();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Bienvenido <?php echo $usuario;?></h1>
    <table>
        <thead>
            <td>Perfil</td>
            <td>ID</td>
            <td>Username</td>
            <td>Nombre Completo</td>
            <td>Fecha de nacimiento</td>
            <td>Etiquetas</td>
            <td>Menor de edad</td>
        </thead>
     
            <?php
                    while($fila = $stmt->fetch(PDO::FETCH_ASSOC)){
                        
                        echo '<thead>
                    <td><img src="./perfil/'.$fila['id'].'.png"></td>';
                    echo '
                    <td>'.$fila['id'].'</td>';
                    echo '
                    <td>'.$fila['username'].'</td>';
                    echo '
                    <td>'.$fila['nombre'].'</td>';
                    echo '
                    <td>'.$fila['fecha_nac'].'</td>';
                        echo '
                    <td>'.$fila['es_admin'].'</td></thead>';
                    
                    
                    }
                
            ?>
        
    </table>
</body>
</html>