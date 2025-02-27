<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Obuwie</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header><h1>Obuwie méskie</h1></header>
    <main>
        <h2>Zamówienie</h2>
        <?php
            $server = 'localhost';
            $user = 'root';
            $pass = '';
            $db = 'obuwie';

            $conn = mysqli_connect($server, $user, $pass, $db);

            $model = $_POST['model'] ?? null;
            $rozmiar = $_POST['rozmiar'] ?? null;
            $pary = $_POST['pary'] ?? null;

            

            $query = "SELECT buty.nazwa, produkt.kolor,  produkt.model, buty.cena, produkt.nazwa_pliku, produkt.material, produkt.nazwa_pliku FROM buty JOIN produkt ON buty.model = produkt.model WHERE
             produkt.model = '$model'";
            $result = $conn->query($query);


            if($result -> num_rows >0)
            {
                while($row = $result -> fetch_assoc())
                {
                    $obliczenia = $row['cena']*$pary;
                    echo '<img src="'. $row['nazwa_pliku'].'"' . 'alt = \'but méski\'> ';
                    echo'<h1>'.'Trzewiki Sznurowane'.'</h1>';
                    echo'cena za '.$pary.' par: '.$obliczenia ;
                    echo' Szczególy produktu: '.$row['kolor'].','.$row['material'].'<br>';
                }
            } 
            mysqli_close($conn);

            ?>
        <a href="index.php">Strona glówna</a>
    </main>
    <footer>Autor strony 00000000000 Yflashy</footer>
</body>
</html>