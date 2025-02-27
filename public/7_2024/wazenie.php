<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ważenie samochodów ciężarowych</title>
    <link rel="stylesheet" href="styl.css">
    <meta http-equiv="refresh" content="10">
</head>
<body>
    <header id="jeden"><h1>Ważenie pojazdów we Wrocławiu</h1></header>
    <header id="dwa"><img src="obraz1.png" alt="waga"></header>

    <section id="lewy">
        <h2>Lokalizacje wag</h2>
        <?php
        $server = 'localhost';
        $user = 'root';
        $pass = '';
        $db = 'wazenietirow';

        $conn = mysqli_connect($server, $user, $pass, $db);

        $query = 'SELECT ulica FROM lokalizacje';
        $result = $conn->query($query);

        if($result->num_rows >0)
        {
            echo'<ol>';
            while($row = $result->fetch_assoc())
            {
                echo'<li>'. 'ulica ' .$row['ulica'] .'</li>';
            }
            echo'</ol>';
        }
        mysqli_close($conn);
        ?>
        <h2>Kontakt</h2>
        <a href="mailto:adresu wazenie@wroclaw.pl">napisz</a>
    </section>
    <section id="srodek"><h2>Alerty</h2>

    <?php
        $server = 'localhost';
        $user = 'root';
        $pass = '';
        $db = 'wazenietirow';

        $conn = mysqli_connect($server, $user, $pass, $db);

        $query = 'SELECT wagi.rejestracja, lokalizacje.ulica, wagi.waga, wagi.dzien, wagi.czas FROM wagi JOIN lokalizacje ON lokalizacje.id = wagi.lokalizacje_id WHERE wagi.waga > 5;';
        $result = $conn->query($query);

        if($result->num_rows >0)
        {
            echo'<table>';
            echo'<th>'.'rejestracja'.'</th>';
            echo'<th>'.'ulica'.'</th>';
            echo'<th>'.'waga'.'</th>';
            echo'<th>'.'dzien'.'</th>';
            echo'<th>'.'czas'.'</th>';
            while($row = $result->fetch_assoc())
            {
                echo'<tr>';
                echo'<td>'.$row['rejestracja'].'</td>';
                echo'<td>'.$row['ulica'].'</td>';
                echo'<td>'.$row['waga'].'</td>';
                echo'<td>'. $row['dzien'].'</td>';
                echo'<td>'.$row['czas'].'</td>';
                echo'</tr>';
            }
            echo'</table>';
        }
        mysqli_close($conn);
        ?>




<?php
        $server = 'localhost';
        $user = 'root';
        $pass = '';
        $db = 'wazenietirow';

        $conn = mysqli_connect($server, $user, $pass, $db);

        $query = "INSERT INTO `wagi` (`lokalizacje_id`, `waga`, `rejestracja`, `dzien`, `czas`) VALUES (5, FLOOR(RAND() * 10) + 1, 'DW12345', CURDATE(), CURTIME())";
        $result = $conn->query($query);     
    
?>
    </section>
    
    <section id="prawy"><img src="obraz2.jpg" alt="tir" id="dwaa"></section>
    <footer>Strone wykonal Yflashy</footer>
</body>
</html>


