<?php
session_start();
$mysqli = mysqli_connect("localhost","root","",'portal_ogloszeniowy');
if(!$mysqli){
    die("Connection failed: " . mysqli_connect_error());
};

?>
<!DOCTYPE html>
<html lang="pl">

<head>
<script>
let userid = "<?php echo $_SESSION['id']; ?>";
</script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Ogłoszeniowy</title>
    <link rel="stylesheet" href="style2.css">
    <script defer src="skrypt.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>

    <nav>
        <div class="nav-links">
            <a href="index.php"><i class="fas fa-home"></i> Strona główna</a>
            <a href="profil.php"><i class="fas fa-user"></i> Mój profil</a>
            <a id='logowanie' href="login.php"><i class="fas fa-arrow-right-to-bracket"></i> Zaloguj się</a>

            <a href="dodajogloszenie.php"><i class="fas fa-plus"></i> Dodaj ogłoszenie</a>

        </div>
    </nav>
    <div>
<?php
$sql = "SELECT u.name, a.title, a.description, a.price, a.photo_link from users u INNER JOIN ads a on u.id = a.user_id where a.category_id=6;";
$result = $mysqli->query($sql);
while($row=mysqli_fetch_assoc($result)){
echo "<div id='ogloszenie'>{$row['name']} {$row['title']} {$row['description']} {$row['price']} <img src='{$row['photo_link']}'>  </div>";
}
?>
</div>

</body>

</html>