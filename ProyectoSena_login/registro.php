<?php
    require 'database.php';

    $message='';

    if(!empty($_POST['email']) && !empty($_POST["password"])){
        $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
        $statement = $conn->prepare($sql);
        $statement->bindParam(':email', $_POST['email']);
        $password= password_hash($_POST['password'], PASSWORD_BCRYPT); // linea para encriptar contraseñas -->
        $statement->bindParam(':password', $password);

        if ($statement->execute()){
            $message = 'REGISTRO EXITOSO!';
        } else {
            $message = 'REVISA TUS DATOS E INTENTA DE NUEVO';
        }

    }


?>


     <?php if(!empty($message)): ?>
     <p><?= $message ?></p>
    <?php endif ; ?>

    
    <a href="login.html">Inicie sesión</a>