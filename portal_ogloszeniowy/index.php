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
            <a href="profil.php"><i class="fas fa-user"></i> Mój profil</a>
            <a id="logowanie" href="login.php"><i class="fas fa-arrow-right-to-bracket"></i> Zaloguj się</a>
            <a href="dodajogloszenie.php"><i class="fas fa-plus"></i> Dodaj ogłoszenie</a>

        </div>
    </nav>
<?php 
echo $_SESSION['id'];
echo $_SESSION['username'];

?>
    <div class="container">
        <h2>Kategorie</h2>
        <div class="categories">
            <a href="praca.php">
                <div class="category-card">
                    <i class="fas fa-briefcase"></i>
                    <h3>Praca</h3>
                    <p>Znajdź swoją wymarzoną pracę już teraz! Wybierz tą, która Ci odpowiada.</p>
                </div>
            </a>
            <a href="nieruchomosci.php">
                <div class="category-card">
                    <i class="fas fa-home"></i>
                    <h3>Nieruchomości</h3>
                    <p>Mieszkania, domy, lokale - znajdź swój nowy dom</p>
                </div>
            </a>
            <a href="motoryzacja.php">
                <div class="category-card">
                    <i class="fas fa-car"></i>
                    <h3>Motoryzacja</h3>
                    <p>Samochody, motocykle i części w najlepszych cenach</p>
                </div>
            </a>
            <a href="uslugi.php">
                <div class="category-card">
                    <i class="fas fa-tools"></i>
                    <h3>Usługi</h3>
                    <p>Profesjonalne usługi w Twojej okolicy</p>
                </div>
            </a>
            <a href="elektronika.php">
                <div class="category-card">
                    <i class="fas fa-laptop"></i>
                    <h3>Elektronika</h3>
                    <p>Nowoczesna technologia i gadżety</p>
                </div>
            </a>
            <a href="moda.php">
                <div class="category-card">
                    <i class="fas fa-tshirt"></i>
                    <h3>Moda</h3>
                    <p>Odzież, obuwie i akcesoria modowe</p>
                </div>
            </a>

        </div>
    </div>
</body>

</html>