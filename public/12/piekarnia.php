<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PIEKARNIA</title>
    <link rel="stylesheet" href="styles.css">
    
</head>
<body>
    
    <section id='nawigacyjny'>
        <a href="kw1.png">KWERNENDA 1</a>
        <a href="kw2.png">KWERENDA 2</a>
        <a href="kw3.png">KWERENDA 3</a>
        <a href="kw4.png">KWERENDA 4</a>
    </section>
    <img src="wypiekii.png" alt="Produkty naszej piekarni">
    <section id='naglowkowy'>
        <h1>WITAMY</h1>
        <h4>NA STRONIE PIEKARNI</h4>
<p>Od 31 lat oferujemy najwyższej jakości pieczywo. Naturalnie świeże, naturalnie smaczne. Pieczemy wyłącznie wypieki na naturalnym zakwasie bez polepszaczy i zagęstników. Korzystamy wyłącznie z najlepszych ziaren pochodzących z ekologicznych upraw położonych w rejonach zgierskim i ozorkowskim.</p>   
 </section>
    <section id='glowna'>
        <h4>Wybierz rodaj wypieków</h4>
        <?php
$server = 'localhost';
$user = 'root';
$pass = '';
$db = 'pies';

$conn = mysqli_connect($server, $user, $pass, $db);

if (!$conn) {
    die("Błąd połączenia z bazą danych: " . mysqli_connect_error());
}

$query = 'SELECT DISTINCT(Rodzaj) FROM wyroby ORDER BY ID DESC';
$result = $conn->query($query);

if ($result->num_rows > 0) {
    echo '<form action="" method="post">';
    echo '<select name="rodzaj">';
    while ($row = $result->fetch_assoc()) {
        echo '<option value="' . $row['Rodzaj'] . '">' . $row['Rodzaj'] . '</option>';
    }
    echo '</select>';
    echo '<input type="submit" value="Wybierz">';
    echo '</form>';
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['rodzaj'])) {
    $rodzaj = $_POST['rodzaj'];

    $query = 'SELECT Rodzaj, Nazwa, Gramatura, Cena FROM wyroby WHERE Rodzaj = ?';
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $rodzaj);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo '<table border="1">';
        echo '<tr>';
        echo '<th>Rodzaj</th>';
        echo '<th>Nazwa</th>';
        echo '<th>Gramatura</th>';
        echo '<th>Cena</th>';
        echo '</tr>';
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['Rodzaj'] . '</td>';
            echo '<td>' . $row['Nazwa'] . '</td>';
            echo '<td>' . $row['Gramatura'] . '</td>';
            echo '<td>' . $row['Cena'] . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo "Brak wyników dla wybranego rodzaju.";
    }

    $stmt->close();
}

mysqli_close($conn);
?>

    </section>
    <section id='stopka'>
        <p>AUTOR 00000000000</p>
        <p>Data 00.00.0000</p>
    </section>
</body>
</html>