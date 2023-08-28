<?php
    session_start();

    if (isset($_SESSION['user_id'])) {
        header('Location: /php-inicioSesion');
    }


    require 'database.php';

    if(isset($_SESSION['user_id'])){
        $records = $conn->prepare('SELECT id, email, password FROM users WHERE id = :id');
        $records->bindParam(':id', $_SESSION['user_id']);
        $results = $records->fetch(PDO::FETCH_ASSOC); 

        $user = null;

        if(count($results) > 0) {
            $user = $results;

        }
    }

?>



    <?php if(!empty($user)):?>
        <br> Bienvenido. <?= $user['email']?> 
        <br> Eres un pendej, te logueaste
        <a href="cerrarSesion.php">Porque ya no estoy aqui, mori, me fui</a>
    <?php else: ?>
        <h1>Valiste monda, traga chele</h1>
        <a href="postlogin.php">logg</a>
        <!--<a href="registro.php">deslogg</a>-->
    <?php endif; ?> 
   