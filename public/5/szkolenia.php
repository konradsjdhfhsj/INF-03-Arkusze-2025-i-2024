<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Firma szkoleniowa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<section id="container">
        <header>
            <img src="baner.jpg" alt="szkolenia">
        </header>

        <section id="menu">
            <ol>
                <li><a href="index.html">Strona główna</a></li>
                <li><a href="szkolenia.php">Szkolenia</a></li>
            </ol>
        </section>

        <section id="glowny">
            <?php
                $server = 'localhost';
                $user = 'root';
                $pass = '';
                $db = 'firma';

                $conn =  new PDO("mysql:host=$server;dbname=$db", $user, $pass);
                $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $stmt = $conn->query('SELECT Data, Temat FROM szkolenia GROUP BY Data ASC');
                $stmt->execute();

                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                if($result) {
                    foreach($result as $row) {
                        echo $row['Data'] . ' ' . $row['Temat'] . '<br>'. '<br>';
                    }
                }

                $conn = null;


               /* $server = 'localhost';
                $user = 'root';
                $pass = '';
                $db = 'firma';

                $conn = mysqli_connect($server, $user, $pass, $db);

                $query = 'SELECT Data, Temat FROM szkolenia GROUP BY Data ASC';

                $result = mysqli_query($conn, $query);
                
                if(mysqli_num_rows($result) > 0)
                {
                    while($row = mysqli_fetch_assoc($result))
                    {
                        echo $row['Data']. ' '. $row['Temat']. '<br><br>';
                    }
                }
        
               mysqli_close($conn);*/
               
            ?>
        </section>

        <footer>
            <h2>Firma szkoleniowa, ul. Główna 1, 23-456 Warszawa</h2><br>
            <p>Autor 00000000000</p>
        </footer>
    </section>
</body>
</html>