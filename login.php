<?php

    session_start();

    if (isset($_SESSION['user_id'])) {
        header('Location: /php-postlogin');
    }
    require 'database.php';

    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        $records = $conn->prepare('SELECT id, email, password FROM users WHERE email = :email');
        $records->bindParam(':email', $_POST['email']);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);

        $message = '';

        if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
        $_SESSION['user_id'] = $results['id'];
        header("Location: /php-login");
        } else {
            $message = 'Lo sentimos, el usuario o contraseña no son correctos';
        }
    }

?>

    <?php if(!empty($message)): ?>
    <p><?= $message ?></p>
    <?php endif ; ?>

                