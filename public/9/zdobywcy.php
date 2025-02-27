<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZDOBYWCY GÓR</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header><h1>Klub zdobywców gór polskich</h1></header>
    <section id="nawigacja">
        <a href="kw1.png">kwerenda1</a>
        <a href="kw2.png">kwerenda2</a>
        <a href="kw3.png">kwerenda3</a>
        <a href="kw4.png">kwerenda4</a>
    </section>

    <section id="lewy">
        <img src="logo.png" alt="logo zdobywcy">
        <h3>razem z nami</h3>
        <ul>
            <li>wyjazdy</li>
            <li>szkolenia</li>
            <li>reakcja</li>
            <li>wypoczynek</li>
            <li>wyzwania</li>
        </ul>
    </section>

    <section id="prawy">
        <h2>Dolacz do naszego zespolu</h2>
        <p>Wpisz swoje dane do formularza</p>
        <form action="" method="post">
        <label for="nazwisko">Nazwisko: </label>
        <input type="text" name="nazwisko" placeholder="Podaj nazwisko">

        <label for="imie">Imie: </label>
        <input type="text" name="imie" placeholder="Podaj Imie">

        <select name="funkcja">
            <option>uczestnik</option>
            <option>przewodnik</option>
            <option>zaopatrzeniowiec</option>
            <option>organizator</option>
            <option>ratownik</option>
        </select>

        <label for="email">Email </label>
        <input type="email" name="email" placeholder="Podaj e-mail">
        <input type="submit" value="Dodaj">
        <?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
$server = 'localhost';
$user = 'root';
$pass = '';
$db = 'zdobywcy';

$conn = mysqli_connect($server, $user, $pass, $db);

if(!$conn)
{
    die('nie dziala') . $conn->connect_error;
}

$nazwisko = $_POST['nazwisko'];
$imie = $_POST['imie'];
$funkcja = $_POST['funkcja'];
$email = $_POST['email'];
if(empty($nazwisko) || empty($imie) || empty($funkcja) || empty($email))
{
    die('nie podano 1 z wartosci potrzebnych nam :('). $conn->connect_error;
}
else{
$stmt = $conn->prepare('INSERT INTO osoby(nazwisko, imie, funkcja, email)VALUES(?, ?, ?, ?)');
$stmt -> bind_param('ssss', $nazwisko, $imie, $funkcja, $email);
$stmt->execute();
    
mysqli_close($conn);
}
        }
    ?>
        </form><br><br>
<?php
$server = 'localhost';
$user = 'root';
$pass = '';
$db = 'zdobywcy';

$conn = mysqli_connect($server, $user, $pass, $db);

if(!$conn)
{
    die('nie dziala') . $conn->connect_error;
}
$query = 'SELECT nazwisko, imie, funkcja, email FROM osoby';
$result = $conn->query($query);

 
if($result -> num_rows >0)
{
    echo'<table>';
    echo'<th>'.'Nazwisko'.'</th>';
    echo'<th>'.'Imie'.'</th>';
    echo'<th>'.'Funkcja'.'</th>';
    echo'<th>'.'Email'.'</th>';
    while($row = $result->fetch_assoc())
    {
        echo'<tr>';
        echo'<td>'.$row['nazwisko'].'</td>';
        echo'<td>'.$row['imie'].'</td>';
        echo'<td>'.$row['funkcja'].'</td>';
        echo'<td>'.$row['email'].'</td>';
        echo'</tr>';
    }
    echo'</table>';
}
mysqli_close($conn);
        ?>

    </section>
    <footer>Strone wykonal 00000000000</footer>
</body>
</html>