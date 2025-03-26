<?php
session_start();
$mysqli = mysqli_connect("localhost", "root", "", 'portal_ogloszeniowy');
if (!$mysqli) {
    die("Connection failed: " . mysqli_connect_error());
}
;

?>

<!DOCTYPE html>
<html lang="pl">

<head>





    <script>
        let userid = "<?php echo $_SESSION['id']; ?>";
    </script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mój Profil</title>
    <link rel="stylesheet" href="style2.css">
    <script defer src="skrypt.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .container {
            max-width: 800px;
            margin: 3rem auto;
            padding: 2rem;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .profile-card {
            padding: 2rem;
            border-radius: 10px;
            background: linear-gradient(135deg, #007bff, #0056b3);
            color: white;
        }

        .profile-avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            border: 4px solid white;
            margin-bottom: 1rem;
        }

        .primary-btn {
            display: inline-block;
            margin-top: 1rem;
            padding: 0.8rem 1.5rem;
            border-radius: 5px;
            background: white;
            color: #007bff;
            font-weight: bold;
            transition: background 0.3s ease, color 0.3s ease;
        }

        .primary-btn:hover {
            background: #0056b3;
            color: white;
        }

        .user-ads {
            margin-top: 2rem;
        }

        .user-ads h3 {
            margin-bottom: 1rem;
            color: #333;
        }

        .user-ads ul {
            list-style: none;
            padding: 0;
        }

        .user-ads li {
            background: white;
            padding: 1rem;
            margin-bottom: 1rem;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease;
        }

        .user-ads li:hover {
            transform: translateY(-3px);
        }

        .user-ads a {
            color: #007bff;
            font-weight: bold;
            text-decoration: none;
        }
    </style>
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

    <div class="container">
        <div class="profile-card">
            <img src="profile_photo.png" class="profile-avatar">
            <?php
            $nazwa = $_SESSION['id'];
            $sql = "select name,lastname, login from users where id= $nazwa;";
            $result = $mysqli->query($sql);
            while ($row = mysqli_fetch_array($result)) {
                echo "<h2>{$row[0]} {$row[1]}</h2><br><p>Email: {$row[2]}</p>";
            }

            ?>
        </div>

        <div class="user-ads">
            <h3>Moje ogłoszenia</h3>
            <ul>
                <?php
                // $nazwa = $_SESSION['id'];
                $sql = "SELECT a.title, c.name from users u INNER JOIN ads a on u.id = a.user_id inner join 
                categories c on c.id = a.category_id where user_id = $nazwa;";
                $result = $mysqli->query($sql);
                while ($row = mysqli_fetch_array($result)) {
                    echo "<a href={$row[1]}.php><li id='title_profile'>{$row[0]}</li></a>";
                }
                ?>
            </ul>
        </div>
    </div>

</body>

</html>