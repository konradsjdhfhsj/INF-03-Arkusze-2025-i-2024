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
        <form action="zamow.php" method="post">
            
            <?php
            $server = 'localhost';
            $user = 'root';
            $pass = '';
            $db = 'obuwie';

            $conn = mysqli_connect($server, $user, $pass, $db);

            $query = 'SELECT model FROM produkt';
            $result = $conn->query($query);

            if($result -> num_rows >0)
            {
                echo'<label for="model">Model:</label>';
                echo'<select name="model" class="kontrolki">'; 
                while($row = $result -> fetch_assoc())
                {
                    echo '<option>'. $row['model'] .'</option>';
                }
                echo'</select>';
            } 
            mysqli_close($conn);
        ?>
       
            <label for="rozmiar">Rozmiar:</label>
            <select name="rozmiar" class="kontrolki">
                <option>40</option>
                <option>41</option>
                <option>42</option>
                <option>43</option>
            </select>
            <label for="pary">Liczba par:</label>
            <input type="number" name="pary" class="kontrolki">
            <input type="submit" value="Zamów" class="kontrolki">
        </form>
        <?php
            $server = 'localhost';
            $user = 'root';
            $pass = '';
            $db = 'obuwie';

            $conn = mysqli_connect($server, $user, $pass, $db);

            $query = 'SELECT buty.nazwa, produkt.model, buty.cena, produkt.nazwa_pliku, produkt.material, produkt.nazwa_pliku FROM buty JOIN produkt ON buty.model = produkt.model';
            $result = $conn->query($query);

            if($result -> num_rows >0)
            {
                echo'<main class = \'buty\'>'; 
                while($row = $result -> fetch_assoc())
                {
                    echo '<img src="'. $row['nazwa_pliku'].'"' . 'alt = \'but méski\'> ';
                    echo'<h2>'.$row['nazwa'].'</h2>' . '<h5>'. $row['model']  .'</h5>'.'<h4>'.$row['cena'].'</h4>';
                }
                echo'</main>';
            } 
            mysqli_close($conn);
        ?>
    </main>
    <footer>Autor strony 00000000000 Yflashy</footer>
</body>
</html>