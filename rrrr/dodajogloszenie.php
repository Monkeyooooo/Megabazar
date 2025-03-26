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
    <title>Dodaj Ogłoszenie</title>
    <link rel="stylesheet" href="style2.css">
    <script defer src="skrypt.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .container {
            max-width: 600px;
            margin: 3rem auto;
            padding: 2rem;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            font-weight: bold;
            margin-top: 10px;
        }

        input,
        select,
        textarea {
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 100%;
        }

        .primary-btn {
            margin-top: 15px;
            padding: 10px;
            border: none;
            background: #007bff;
            color: white;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .primary-btn:hover {
            background: #0056b3;
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
        <h2>Dodaj nowe ogłoszenie</h2>
        <form  method="POST"  action='dodajogloszenie.php' enctype="multipart/form-data">
        <input type="hidden" name="form" value="dodawanie">   
        <label for="category">Kategoria:</label>
            <select id="category" name="category" required>
                <option value="1">Praca</option>
                <option value="3">Nieruchomości</option>
                <option value="4">Motoryzacja</option>
                <option value="2">Usługi</option>
                <option value="5">Elektronika</option>
                <option value="6">Moda</option>
            </select>

            <label for="title">Tytuł:</label>
            <input type="text" id="title" name="title" required>

            <label for="price">Cena (PLN):</label>
            <input type="number" id="price" name="price" required>

            <label for="description">Opis:</label>
            <textarea id="description" name="description" rows="4" required></textarea>

            <label for="image">Zdjęcie:</label>
            <input type="file" id="image" name="image"  accept="image/*" required>

            <button type="submit" class="primary-btn">Dodaj ogłoszenie</button>
  <?php
  

  
  if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['form']) && $_POST['form'] == 'dodawanie'){
        $category = isset($_POST['category']) ? $_POST['category'] : '';
        $title = isset($_POST['title']) ? $_POST['title'] : '';
        $price = isset($_POST['price']) ? $_POST['price'] : '';
        $description = isset($_POST['description']) ? $_POST['description'] : '';
        $fileName='';
        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            $fileName = $_FILES['image']['name'];
        } else {
            echo "Error uploading file!";
        }

        $user_id = isset($_SESSION['id']) ? $_SESSION['id'] : '';
        $sql = "INSERT INTO ads (user_id,category_id,title,description,price, photo_link) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $mysqli->prepare($sql);
        $stmt ->bind_param('iissis',$user_id, $category, $title, $description, $price, $fileName);
        $stmt->execute();


    }
} 
?>
        </form>
    </div>

</body>

</html>