<?php
require_once 'conexion.php';

// if(isset($_SESSION['username'])){
//     $usuario = $_SESSION['username'];
//     header('Location:panel.php');
// }

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $usuario= isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $recuerdame = isset($_POST['recuerdame']);
    try{
        $stmt = $gbd->prepare('SELECT password, es_admin FROM usuarios WHERE username = :u');
        $stmt->execute([':u'=>$usuario]);

        if($stmt->rowCount() > 0){
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $hash = $row['password'];
            $rol = $row['es_admin'];

            if(password_verify($password,$hash)){
                $_SESSION['username']= $usuario;
                $_SESSION['rol']= $rol;

                if($recuerdame){
                    setcookie('recuerdame', $usuario, time()+(60*60*24*7), '/');
                }
                header('Location:panel.php');
            } else {
                echo 'contraseña incorrecta';
            }
        } else {
            echo 'usuario no existe';
        }

    } catch (PDOException $er){
        echo 'Error al obtener datos:'. $er->getMessage();
        exit;
    }
} else {
    echo 'introduce todos los datos';
}


?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login con Recuérdame</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f9; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .login-box { background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); width: 300px; }
        input[type="text"], input[type="password"] { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        .checkbox-container { margin: 15px 0; display: flex; align-items: center; font-size: 14px; color: #555; }
        .checkbox-container input { margin-right: 8px; cursor: pointer; }
        button { width: 100%; padding: 10px; background: #007BFF; border: 0; color: #fff; border-radius: 4px; cursor: pointer; font-size: 16px; margin-top: 10px; }
        .error { color: #d9534f; background: #f2dede; padding: 10px; border-radius: 4px; margin-bottom: 15px; text-align: center; }
    </style>
</head>
<body>
<div class="login-box">
    <h2>Iniciar Sesión</h2>
    <form action="./login.php" method="POST">
        <label>Usuario</label>
        <input type="text" name="username" required autocomplete="off">
        
        <label>Contraseña</label>
        <input type="password" name="password" required>
        
        <div class="checkbox-container">
            <input type="checkbox" name="recuerdame" id="recuerdame">
            <label for="recuerdame">Recuérdame en este equipo</label>
        </div>

        <button type="submit">Entrar</button>
    </form>
</div>
</body>
</html>