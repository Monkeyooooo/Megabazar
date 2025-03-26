<?php
session_start();
$mysqli = mysqli_connect("localhost","root","",'portal_ogloszeniowy');
if(!$mysqli){
    die("Connection failed: " . mysqli_connect_error());
};
?>
<script>
let userid = "<?php echo $_SESSION['id']; ?>";
</script>
<!DOCTYPE html>
<html lang="pl">
<head>
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
            <a id="profile" href="profil.php"><i class="fas fa-user"></i> Mój profil</a>
            <a id="logowanie" href="login.php"><i class="fas fa-arrow-right-to-bracket"></i> Zaloguj się</a>
            <a id='add' href="dodajogloszenie.php"><i class="fas fa-plus"></i> Dodaj ogłoszenie</a>
            <a id="log_out" href="log_out.php">Wyloguj</a>

        </div>
    </nav>
    <header class="category-header">
        <h2>Nieruchomości</h2>
    </header>

    <div class="ads-container">
    <?php
    $sql = "SELECT u.name, a.title, a.description, a.price, a.photo_link, u.login FROM users u INNER JOIN ads a ON u.id = a.user_id WHERE a.category_id=3;";
    $result = $mysqli->query($sql);
    while($row = mysqli_fetch_assoc($result)){
        echo "<div class='ad-card'>
                <img src='{$row['photo_link']}' alt='Ad image'>
                <div class='ad-details'>
                    <h3>{$row['title']}</h3>
                    <p>{$row['description']}</p>
                    <p class='price'>{$row['price']} zł</p>
                    <p class='author'>Od: {$row['name']}</p>
                    <p class='contact'>Kontakt: {$row['login']}</p>
                </div>
              </div>";
    }
    ?>
    </div>
</body>
</html>