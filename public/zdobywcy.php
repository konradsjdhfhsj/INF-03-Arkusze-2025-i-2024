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
        <input type="text" name="Imie" placeholder="Podaj Imie">

        <select name="rola">
            <option value="">uczestnik</option>
            <option value="">przewodnik</option>
            <option value="">zaopatrzeniowiec</option>
            <option value="">organizator</option>
            <option value="">ratownik</option>
        </select>

        <label for="email">Email </label>
        <input type="email" name="email" placeholder="Podaj e-mail">
        <input type="submit" value="Dodaj">
        
        </form>
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
 
if(mysqli_num_rows($result) >0)
{
    echo'<table>';
    echo'<th>'.'Nazwisko'.'</th>';
    echo'<th>'.'Imie'.'</th>';
    echo'<th>'.'Funkcja'.'</th>';
    echo'<th>'.'Email'.'</th>';
    while($row = mysqli_fetch_array($result))
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
mysqli_close($conn)
?>

    </section>
    <footer>Strone wykonal 00000000000</footer>
</body>
</html>