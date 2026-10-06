<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moje pliki</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>MOJE PLIKI</h1>
    <?php
        $folder = getcwd();
        echo "Aktualny katalog: <br>" . $folder;
        echo "<br><br>";

        echo "ZAWARTOŚĆ KATALOGU <br>";
        echo "<table><tr><th>Nazwa</th><th>Typ</th><th>Rozmiar</th></tr>";

        $katalog = "dokumenty";

        if (file_exists($katalog)) {
            $pliki = scandir($katalog);
            foreach ($pliki as $plik) {
                if ($plik == "." || $plik == "..")
                    continue;

                $sciezka = $katalog . "/" . $plik;
                $rozmiar = "-";

                if (is_file($sciezka)) {
                    $typ = "PLIK";
                    $rozmiar = filesize($sciezka) . " B";
                } elseif (is_dir($sciezka)) {
                    $typ = "KATALOG";
                }

                echo "<tr>";
                echo "<td>$plik</td>";
                echo "<td>$typ</td>";
                echo "<td>$rozmiar</td>";
                echo "</tr>";
            }
        }

        echo "</table>";
    ?>

    <form action="" method="post">
        <label for="nazwa_pliku">Nowy plik/katalog:</label>
        <input type="text" id="nazwa_pliku" name="nazwa_pliku">
        <button type="submit">Utwórz</button>
    </form>
</body>
</html>