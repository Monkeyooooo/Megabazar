
<?php
session_start();
$conn= mysqli_connect("localhost", "root", "", "portal_ogloszeniowy");
$_SESSION['id']=0;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE login = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) >0 ) {
        $_SESSION['username'] = $username;
        
        $row = mysqli_fetch_row($result);
        $_SESSION['id'] = $row[0];
        header('Location: index.php'); 
        exit();
    } else {
        $error = "Invalid username or password";
    }
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MegaBazar</title>
    <script defer src="skrypt.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login-container">
        <h2>Zaloguj się do MegaBazar</h2>
        <?php if (isset($error)): ?>
            <p style="color: red;"><?php echo $error; ?></p>
        <?php endif; ?>
        <form method="POST" action="">
            <div class="form-group">
                <label for="username">E-mail</label>
                <input type="text" id="username" name="username" required>
            </div>
            
            <div class="form-group">
                <label for="password">Hasło</label>
                <input type="password" id="password" name="password" required>
            </div>

            <div class="forgot">
                <a href="forgot-password.html" class="forgot-password">Zapomniałeś hasła?</a>
            </div>

            <button type="submit" class="login-btn">Zaloguj</button>

            <div class="register-link">
                Nie masz konta? <a href="register.php">Zarejestruj się</a>
            </div>
        </form>
    </div>
</body>
<?php
mysqli_close($conn);
?>
</html>