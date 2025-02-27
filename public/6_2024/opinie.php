<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opinie klientów</title>
    <link rel="stylesheet" href="styl3.css">
</head>
<body>
    <header><h1>Hurtownia spożywcza</h1></header>
    <main><h2>Opinie naszych klientów</h2>
                <?php
                    $server = 'localhost';
                    $user = 'root';
                    $pass = '';
                    $db = 'hurtownia';

                    $conn = mysqli_connect($server, $user, $pass, $db);

                    $query = 'SELECT klienci.zdjecie, klienci.imie, opinie.opinia FROM klienci JOIN opinie ON opinie.Klienci_id = klienci.id WHERE klienci.Typy_id = 2 OR klienci.Typy_id = 3';
                    $result = $conn->query($query);

                    if(mysqli_num_rows($result) >0)
                    { 
                        while($row = mysqli_fetch_assoc($result))
                        {
                           echo'<div id=\'php\'>';
                            echo'<img src='."'".$row['zdjecie']."'". 'alt=\'klijent\'>';
                            echo'<blockquote>';
                            echo $row['opinia'];
                            echo'</blockquote>'; 
                            echo'<h4>'.$row['imie'].'</h4>';
                            echo'</div id=\'php\'>';
                        }
                    }
                    mysqli_close($conn);
                ?>
    </main>
    <footer id="jeden"><h3>Współpracują z nami</h3>
    <a href="http://sklep.pl/">Sklep 1</a>
    </footer>

    <footer id="dwa">
    <h3>Nasi top klijenci</h3>
    <?php
                    $server = 'localhost';
                    $user = 'root';
                    $pass = '';
                    $db = 'hurtownia';

                    $conn = mysqli_connect($server, $user, $pass, $db);

                    $query = 'SELECT imie, nazwisko, punkty FROM klienci GROUP BY punkty DESC LIMIT 3';
                    $result = $conn->query($query);

                    if(mysqli_num_rows($result) >0)
                    {
                        echo'<ol>';
                        while($row = mysqli_fetch_assoc($result))
                        {   
                            echo'<li>'.$row['imie'].' '.$row['nazwisko'].' '.$row['punkty'].'</li>';
                        }
                        echo'<ol>';
                    }
                    mysqli_close($conn);
                ?>
    </footer>

    <footer id="trzy">
    <h3>Skontaktuj sie</h3>
    <p>111222333</p>
    </footer>

    <footer id="cztery">
    <h3>Autor: 00000000000 Yflashy</h3>
    </footer>
</body>
</html>