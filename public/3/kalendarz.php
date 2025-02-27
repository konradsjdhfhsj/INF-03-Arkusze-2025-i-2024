<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalendarz</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header><h1>Dni, miesiące, lata...</h1></header>
    <main>
        <?php
        $server = 'localhost';
        $user = 'root';
        $pass = '';
        $db = 'kalendarz';

        $conn = mysqli_connect($server, $user, $pass, $db);

        $data = date("m-d");
        $tab = array('Poniedizalek', 'Wtorek', 'Sroda', 'Czwartek', 'Piatek', 'Sobota', 'Niedziela');
        $dzien = date("N") -1;
        $dzientyg = $tab[$dzien];
        $query = "SELECT imiona, data FROM imieniny WHERE data = '$data'";
        $result = $conn->query($query);

        if(mysqli_num_rows($result) >0)
        {
            
            while($row = mysqli_fetch_array($result))
            {
                $rok = date("Y")-1;
                $akt = $row['data'];
                $formatdat = date("m-d-Y", strtotime($akt));
                echo'<p>'.'Dzisiaj jest '.$dzientyg.' '.$akt.'-'.$rok.' imieniny:'.$row['imiona'].'</p>';
            }
        }
        mysqli_close($conn);
        ?>
    </main>
    <section id="lewy">
        <table border="1">
            <th>liczba dni</th>
            <th>meisiac</th>

            <tr>
                <td rowspan="7">31</td>
                <td>styczen</td>

                <tr><td>marzec</td></tr>
                <tr><td>maj</td></tr>
                <tr><td>lipiec</td></tr>
                <tr><td>sierpien</td></tr>
                <tr><td>pazdiernik</td></tr>
                <tr><td>grudzien</td></tr>
            </tr>


            <tr>
                <td rowspan="4">31</td>
                <td>kwiecien</td>

                <tr><td>czerwiec</td></tr>
                <tr><td>wrzesien</td></tr>
                <tr><td>listopad</td></tr>
            </tr>

            <tr>
                <td>28 lub 29</td>
                <td>luty</td>
            </tr>
        </table>
    </section>




    <section id="srodek">
        <h2>Sprawdz kto ma urodziny</h2>
        <form action="" method="post">
            <input type="date" name="date" min="2024-01-01" max="2024-12-31" required>
            <input type="submit" value="wyslij">
        </form>
        <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $server = 'localhost';
        $user = 'root';
        $pass = '';
        $db = 'kalendarz';

        $conn = mysqli_connect($server, $user, $pass, $db);
        
        $date = $_POST['date'];
        $format = date("m-d", strtotime($date));

        $tab = array('Poniedizalek', 'Wtorek', 'Sroda', 'Czwartek', 'Piatek', 'Sobota', 'Niedziela');
        $dzien = date("N") -1;
        $dzien = $tab[$dzien];
        $query = "SELECT imiona, data FROM imieniny WHERE data = '$format'";
        $result = $conn->query($query);

        if(mysqli_num_rows($result) >0)
        {
            
            while($row = mysqli_fetch_array($result))
            {   
                $akt = date("Y-m-d", strtotime($date));
                echo'Dnia '.$akt. ' sa imieniny: '. $row['imiona'];
            }
        }
        mysqli_close($conn);

        }
        ?>
    </section>
    <section id="prawy">
        <a href="https://pl.wikipedia.org/wiki/Kalendarz_Majów" target="_blank"><img src="kalendarz.gif" alt="Kalendarz Majów"></a>
        <h2>Rodzaje kalendarzy</h2>

    <ol>
        <li>sloneczny</li>
        <ul>
            <li>Kalendarz Majów</li>
            <li>julianski</li>
            <li>gregorianski</li>
        </ul>
        <li>ksiezycowy</li>
            <ul>
                <li>starogrecki</li>
                <li>babilonski</li>
            </ul>
    </ol>
    </section>
    <footer>Strone opracowal(a) Yflashy</footer>
</body>
</html>