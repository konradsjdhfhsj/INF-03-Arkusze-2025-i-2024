<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KOŁO SZACHOWE</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header><h2>Koło szachowe <em>gambit piona</em></h2></header>


<section id="lewy">

<h4>Polecane linki</h4>
<ul>
    <li><a href='kw1.png'>Kwerenda1</a></li>
    <li><a href='kw2.png'>Kwerenda2</a></li>
    <li><a href='kw3.png'>Kwerenda3</a></li>
    <li><a href='kw4.png'>Kwerenda4</a></li>
</ul>
<img src="logo.png" alt="Logo kola">
</section>



<section id="prawy">
    <h3>Najlepsi gracze naszego kola</h3>
    <?php
    $server = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'szachy';

    $conn = mysqli_connect($server, $user, $pass, $db);

    $query = 'SELECT pseudonim, tytul, ranking, klasa FROM zawodnicy WHERE ranking > 2787 ORDER BY ranking DESC';
    $result = $conn->query($query);

    if($result-> num_rows >0)
    {   $i = 0;
        echo'<table>';
        echo'<th>'.'Pozycja'.'</th>';
        echo'<th>'.'Pseudonim'.'</th>';
        echo'<th>'.'Tytul'.'</th>';
        echo'<th>'.'Ranking'.'</th>';
        echo'<th>'.'Klasa'.'</th>';
        while($row = $result -> fetch_assoc())
        {
        echo'<tr>';
            echo'<td>'.$i++.'</td>';
            echo'<td>'.$row['pseudonim'].'</td>';
            echo'<td>'.$row['tytul'].'</td>';
            echo'<td>'.$row['ranking'].'</td>';
            echo'<td>'.$row['klasa'].'</td>';
        echo'</tr>';
        }
        echo'</table>';
    }
    mysqli_close($conn);
    ?>
    <form action='' method="post">
        <input type="submit" value="Losuj nowa pare graczy">
        <?php
            $server = 'localhost';
            $user = 'root';
            $pass = '';
            $db = 'szachy';

            $conn = mysqli_connect($server, $user, $pass, $db);

            $query = 'SELECT pseudonim, klasa FROM zawodnicy ORDER BY RAND() LIMIT 2';
            $result = $conn->query($query);

            if($result-> num_rows >0)
            {
                while($row = $result -> fetch_assoc())
                {
                    echo'<h4>'.$row['pseudonim'].'-'.$row['klasa'].'</h4>';
                }
            }
            mysqli_close($conn);
            ?>
    </form>
    <p>Legenda: AM - Absolutny Mistrz, SM - Szkolny Mistrz, PM - Mistrz Poziomu, KM - Mistrz Klasowy</p>
</section>
    <footer>Strone wykonal 00000000000</footer>
</body>
</html>