<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mieszalnia farb</title>
    <link rel="icon" href="fav.png" type="image/png">
    <link rel="stylesheet" href="style.css">
</head>
<body>
        <header><img src="baner.png" alt="Mieszalnia farb"></header>

        <section id="formularz">
            <form action="" method="post">
                <label for="dataodb">Data odbioru od:</label>
                <input type="date" name="dataodb">
                <label for="do">do:</label>
                <input type="date" name="do">
                <input type="submit" value="Wyszukaj">
            </form>
        </section>

        <section id="glowny">
            <?php
    $server = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'mieszalnia';

    $conn = mysqli_connect($server,$user,$pass,$db);

    $datado = $_POST['datado'] ?? null;
    $dataod = $_POST['dataod'] ?? null;

    if(empty($dataod) || empty($datado))
    {
        $query = 'SELECT klienci.Nazwisko, klienci.Imie, zamowienia.id FROM klienci INNER JOIN zamowienia ON zamowienia.id = klienci.Id GROUP BY zamowienia.data_odbioru DESC';
        $result = $conn->query($query);

        if($result -> num_rows > 0)
                    {
                        echo'<table>';
                        echo'<th>'.'Nr zamówienia'.'</th>';
                        echo'<th>'.'Nazwisko'.'</th>';
                        echo'<th>'.'Imie'.'</th>';
                        while($row = $result->fetch_assoc())
                        {
                            echo'<tr>'.'<td>'.$row['Nazwisko'].'</td>'.'<td>'.$row['Imie'].'</td>'.'<td>'.$row['id'].'</td>'.'</tr>';
                        }
                        echo'</table>';
                    }
    }
    else
    {
        $query = "SELECT klienci.Nazwisko, klienci.Imie, zamowienia.id, zamowienia.kod_koloru, zamowienia.data_odbioru, zamowienia.pojemnosc FROM klienci INNER JOIN zamowienia ON zamowienia.id = klienci.Id WHERE zamowienia.data_odbioru BETWEEN '$datado' AND '$dataod'";
        $result = $conn->query($query);
        if($result -> num_rows > 0)
        {
            
            echo'<table>';
            echo'<th>'.'Nr zamówienia'.'</th>';
            echo'<th>'.'Nazwisko'.'</th>';
            echo'<th>'.'Imie'.'</th>';
            echo'<th>'.'Kolor'.'</th>';
            echo'<th>'.'Pojemnosc [ml]'.'</th>';
            echo'<th>'.'Data odbioru'.'</th>';
            while($row = $result->fetch_assoc())
            {
                $kolor = $row['kod_koloru'];
                echo'<tr>' ;
                    echo'<td>'.$row['id'].'</td>';
                    echo'<td>'.$row['Nazwisko'].'</td>';
                    echo'<td>'.$row['Imie'].'</td>';
                    echo '<td style="background-color: #' . $kolor . ';">' . $kolor . '</td>';
                    echo'<td>'.$row['pojemnosc'].'</td>';
                    echo'<td>'.$row['data_odbioru'].'</td>';
                echo'</tr>';
            }
            echo'</table>';
        }
    }
    ?>
        </section>
        <footer>
            <h3>Egzamin INF.03</h3><br>
            <p>Autor: 00000000000</p>
        </footer>
    
</body>
</html>
