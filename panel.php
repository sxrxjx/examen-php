<?php
require_once 'conexion.php';

try{
    $stmt = $gbd->prepare('SELECT * FROM usuarios');
    $stmt->execute();
    $fila = $stmt->fetch(PDO::FETCH_ASSOC);
    
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
        <tbody>
            <?php
                while($fila = $stmt->fetch(PDO::FETCH_ASSOC)){
                    foreach($fila as $user){
                        echo '
                    <td>'.$user['username'].'</td>';
                    }
                    
                }
            ?>
        </tbody>
    </table>
</body>
</html>