<?php
    include '../conexion/conexion.php';

    $name = $_POST['name'];
    $gmail = $_POST['gmail'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password = hash('sha512' ,$password);
    $id_rol = 2;

    $query = "INSERT INTO users(name, gmail, username, password, id_rol)
    VALUES('$name', '$gmail', '$username', '$password', '$id_rol'); ";

    $verificar_correo = mysqli_query($conexion, "SELECT * FROM users where gmail='$gmail'; ");
    $verificar_usuario = mysqli_query($conexion, "SELECT * FROM users where username='$username'; ");

    if (mysqli_num_rows($verificar_correo) > 0) {
        echo "
            <script>
                alert('Este correo ya esta registrado, intenta con otro diferente');
                window.location = '../login.php';
            </script>
        ";
        exit();
    }

    if (mysqli_num_rows($verificar_usuario) > 0) {
        echo "
            <script>
                alert('Este nombre de usuario ya esta registrado, intenta con otro diferente');
                window.location = '../login.php';
            </script>
        ";
        exit();
    }
    
    $execute = mysqli_query($conexion, $query);

    if ($execute) {
        echo "
            <script>
                alert('Sus datos se an almacenado correctamente');
                window.location = '../login.php';
            </script>
        ";
    }else{
        echo "
            <script>
                alert('Error de registro, intentelo nuevamente');
                window.location = '../login.php';
            </script>
        ";
    }

    mysqli_close($conexion);
?>