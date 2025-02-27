<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Komis aut</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header><h1><i>KupAuto!</i> Internetowy Komis Samochodowy</h1></header>
    <main id="jeden">
        <?php
            $server = 'localhost';
            $user = 'root';
            $pass = '';
            $db = 'kupauto';

            $conn = mysqli_connect($server, $user, $pass, $db);

           /* if(!$conn)
            {
                die('nei dziala'). $conn->connect_error;
            }
            else
            {
                echo'dziala';
            }*/

            $query = 'SELECT model, rocznik, przebieg, paliwo, cena, zdjecie FROM samochody WHERE id = 10';
            $result = $conn->query($query);
                if($result -> num_rows >0)
                {
                    while($row = $result -> fetch_assoc())
                    {
                        echo '<img src="' . $row['zdjecie'] . '" alt="oferta dnia" id=\'imgjeden\'>';
                        echo'<h4>'.'Oferta dnia: '.$row['model'].'</h4>';
                        echo '<p>'.'Rocznik: '.$row['rocznik'].'przebieg: '.$row['przebieg'].'paliwo: '.$row['paliwo'].'</p>';
                        echo '<h4>'.'Cena: '.$row['cena'] .'</h4>';
                    }
                }
                mysqli_close($conn);
        ?>
    </main>
    <h2>Oferty Wyrórznjone</h2>
    
    <?php
     $server = 'localhost';
     $user = 'root';
     $pass = '';
     $db = 'kupauto';

     $conn = mysqli_connect($server, $user, $pass, $db);
     if (!$conn) {
         die("Connection failed: " . mysqli_connect_error());
     }

     $query = 'SELECT marki.nazwa, samochody.model, samochody.rocznik, samochody.przebieg, samochody.cena, samochody.zdjecie FROM marki JOIN samochody ON marki.id = samochody.marki_id WHERE samochody.wyrozniony = 1 LIMIT 4';
     $result = $conn->query($query);
     if ($result->num_rows > 0) {
         while ($row = $result->fetch_assoc()) {
            echo'<div id=\'dwa\'>';
            echo '<img src="' . $row['zdjecie'] . '" alt="model">';
            echo '<h4>' . $row['nazwa'] . ' ' . $row['model'] . '</h4>';
            echo '<p>Rocznik: ' . $row['rocznik'] . '</p>';
            echo '<h4>Cena: ' . $row['cena'] . '</h4>';
            echo'</div>';
         }
     }
     mysqli_close($conn);
    ?>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <form action="" method="post">
        <?php
             $conn = mysqli_connect($server, $user, $pass, $db);
             if (!$conn) {
                 die("Connection failed: " . mysqli_connect_error());
             }

             $query = 'SELECT marki.nazwa FROM marki';
             $result = $conn->query($query);

             if ($result->num_rows > 0) {
                echo '<select name="marki" >';
                 while ($row = $result->fetch_assoc()) {
                    echo '<option value="' . $row['nazwa'] . '">' . $row['nazwa'] . '</option>';
                 }
                 echo '</select>';
                 echo '<input type="submit" value="Wyszukaj" >';
             }
             mysqli_close($conn);
        ?>
    </form>

    <?php
    if (isset($_POST['marki'])) {
        $marka = $_POST['marki'];

        $conn = mysqli_connect($server, $user, $pass, $db);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $stmt = $conn->prepare('SELECT marki.nazwa, samochody.model, samochody.rocznik, samochody.przebieg, samochody.cena, samochody.zdjecie FROM samochody JOIN marki ON marki.id = samochody.marki_id WHERE marki.nazwa = ? LIMIT 4');
        $stmt->bind_param('s', $marka);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo'<div id=\'tzy\'>';
                echo '<img src="' . $row['zdjecie'] . '" alt="model">';
                echo '<h4>' . $row['nazwa'] . ' ' . $row['model'] . '</h4>';
                echo '<p>Rocznik: ' . $row['rocznik'] . '</p>';
                echo '<h4>Cena: ' . $row['cena'] . '</h4>';
                echo'</div>';
            }
        }
        $stmt->close();
        mysqli_close($conn);
    }
    ?>
    <footer><p>Strone wykonal 00000000000 Yflashy</p>
            <p><a href="http://firmy.pl/komis">Znajdz nas taksze</a></p>
    </footer>
</body>
</html>