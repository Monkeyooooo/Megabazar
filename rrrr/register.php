<!DOCTYPE html>
<?php 
session_start();
$mysqli = mysqli_connect("localhost","root","",'portal_ogloszeniowy');
if(!$mysqli){
    die("Connection failed: " . mysqli_connect_error());
};
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rejestracja - MegaBazar</title>
    <script defer src="skrypt1.js"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="login-container">
        <h2>Zarejestruj się w MegaBazar</h2>
        <form id="login" type="hidden" name="rejestracja" method='POST' action="register.php">
            <input type="hidden" value="rejestracja" name="form">
            <div class="form-group">
                <label for="name">Imię</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="lastname">Nazwisko</label>
                <input type="text" id="lastname" name="lastname" required>
            </div>
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="password">Hasło</label>
                <input type="password" id="password" name="password" required>
            </div>

            <div class="form-group">
                <label for="confirm-password">Potwierdź hasło</label>
                <input type="password" id="confirm_password" name="confirm_password" required>
            </div>

            <button id="button1" type="button" class="login-btn">Zarejestruj się</button>

            <div class="register-link">
                Masz już konto? <a href="login.php">Zaloguj się</a>
            </div>
        </form>
    </div>




<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['form']) && $_POST['form'] == 'rejestracja'){
        $name = isset($_POST['name']) ? $_POST['name'] : '';
        $lastname = isset($_POST['lastname']) ? $_POST['lastname'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';
        $confirm_password = isset($_POST['confirm_password']) ? $_POST['confirm_password'] : '';
        $sql = "INSERT INTO users (name, lastname, login, password) VALUES (?, ?, ?, ?)";
        $stmt = $mysqli->prepare($sql);
        $stmt ->bind_param('ssss',$name, $lastname, $email, $password);
        
        if($confirm_password == $password){
            $stmt ->execute();
        };


    }
} 
?>




<?php
mysqli_close($mysqli);
?>
</body>

</html>