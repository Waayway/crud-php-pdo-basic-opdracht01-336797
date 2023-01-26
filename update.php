<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP PDO</title>
    <style>
        body {
            background-color: #515151;
            color: white;
            font-family: sans-serif;
        }

        form * {
            display: block;
        }

        table td,
        table th {
            padding: 1em;
            border: 1px grey solid;
        }

        form input {
            padding: .3em;
        }

        a {
            color: white;
        }
    </style>
</head>

<body>
    <?php
    require 'lib/main.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (array_key_exists("id", $_POST) and
            array_key_exists("first-name", $_POST) and 
            array_key_exists("prefix", $_POST) and 
            array_key_exists("last-name", $_POST) and 
            array_key_exists("phone-number", $_POST) and 
            array_key_exists("street-name", $_POST) and 
            array_key_exists("house-number", $_POST) and 
            array_key_exists("woonplaats", $_POST) and 
            array_key_exists("postcode", $_POST) and 
            array_key_exists("country-name", $_POST)
        ) {
            updateFormEntry($pdo, $_POST['id'], $_POST['first-name'], $_POST['prefix'], $_POST['last-name'], $phoneNumber, $_POST["street-name"], $_POST["house-number"], $_POST["woonplaats"], $_POST["postcode"], $_POST["country-name"]);
            header('Location: /');
        }
    }
    ?>

    <a href="/">Terug naar homepagina</a>

    <table>
        <thead>
            <th>Id</th>
            <th>Voornaam</th>
            <th>Tussenvoegsel</th>
            <th>Achternaam</th>
            <th>Telefoon nummer</th>
            <th>Straat naam</th>
            <th>Huis nummer</th>
            <th>Woonplaats</th>
            <th>Postcode</th>
            <th>Landnaam</th>
        </thead>
        <tr>
            <?php
            if (key_exists('id', $_GET)) {
                $data = getFormEntryById($pdo, $_GET['id'])[0];
                echo '<tr>';
                echo "<td>" . $data->id . "</td>";
                echo "<td>" . $data->firstName . "</td>";
                echo "<td>" . $data->prefix . "</td>";
                echo "<td>" . $data->lastName . "</td>";
                echo "<td>" . $data->phoneNumber . "</td>";
                echo "<td>" . $data->streetName . "</td>";
                echo "<td>" . $data->houseNumber . "</td>";
                echo "<td>" . $data->woonplaats . "</td>";
                echo "<td>" . $data->postcode . "</td>";
                echo "<td>" . $data->countryName . "</td>";
                echo '</tr>';
            }
            ?>
        </tr>
    </table>

    <?php
    if (key_exists('id', $_GET)) {
        $data = getFormEntryById($pdo, $_GET['id'])[0];
        echo '<form action="update.php" method="post">';
        echo '<input type="hidden" name="id" value="' . $_GET['id'] . '">';
        echo '
        <label for="first-name">Voornaam:</label>
        <input type="text" name="first-name" value="' . $data->firstName . '">
        <label for="prefix">Tussenvoegsel:</label>
        <input type="text" name="prefix" value="' . $data->prefix . '">
        <label for="last-name">Achternaam:</label>
        <input type="text" name="last-name" value="' . $data->lastName . '">
        <label for="phone-number">Telefoonnummer:</label>
        <input type="text" name="phone-number" value="' . $data->phoneNumber . '">
        <label for="street-name">Straat naam:</label>
        <input type="text" name="street-name" value="' . $data->streetName . '">
        <label for="house-number">Huisnummer:</label>
        <input type="number" name="house-number" value="' . $data->houseNumber . '">
        <label for="woonplaats">Woonplaats: </label>
        <input type="text" name="woonplaats" value="' . $data->woonplaats . '">
        <label for="postcode">Postcode:</label>
        <input type="text" name="postcode" value="' . $data->postcode . '">
        <label for="country-name">Landnaam:</label>
        <input type="text" name="country-name" value="' . $data->countryName . '">
        ';
        echo '<input type="submit">';
        echo '</form>';
    }
    ?>
</body>

</html>