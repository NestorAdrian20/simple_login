<?php
    session_start();
    include '../conexion/conexion.php';

    $gmail = $_POST['gmail'];
    $password = $_POST['password'];
    $password = hash('sha512' ,$password);

    $validar_login = mysqli_query($conexion, "SELECT * FROM users WHERE gmail='$gmail' and password='$password'; ");
    $filas=mysqli_fetch_array($validar_login);

    if (mysqli_num_rows($validar_login) > 0) {
        $_SESSION['gmail'] = $gmail;
        if($filas['id_rol']==1){ //administrador
            header("location: ../h/index.html");
            exit();
        }else if($filas['id_rol']==2){ //user
            header("location: ../h/index.html");
            exit();
        }
        /*$_SESSION['gmail'] = $gmail;
        header("location: ../welcome.php");
        exit();
        */
    }else{
        echo '
            <script>
                alert("El usuario no existe, por favor verifique los datos introducidos");
                window.location = "../login.php";
            </script>
        ';
        exit();
    }
    
    mysqli_close($conexion);
?>