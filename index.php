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

        a {
            color: white;
        }
    </style>
</head>

<body>
    <?php
    require 'lib/main.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (array_key_exists("first-name", $_POST) and 
            array_key_exists("prefix", $_POST) and 
            array_key_exists("last-name", $_POST) and 
            array_key_exists("phone-number", $_POST) and 
            array_key_exists("street-name", $_POST) and 
            array_key_exists("house-number", $_POST) and 
            array_key_exists("woonplaats", $_POST) and 
            array_key_exists("postcode", $_POST) and 
            array_key_exists("country-name", $_POST)) {
            if (strlen($_POST["phone-number"]) != 8 && strlen($_POST["phone-number"]) != 10) {
                echo "Telefoonnummer klopt niet qua grote.";
                return;
            }
            $phoneNumber = $_POST["phone-number"];
            if (strlen($phoneNumber) == 10) {
                $phoneNumber = substr($phoneNumber, 2);
            }
            createFormEntry($pdo, $_POST['first-name'], $_POST['prefix'], $_POST['last-name'], $phoneNumber, $_POST["street-name"], $_POST["house-number"], $_POST["woonplaats"], $_POST["postcode"], $_POST["country-name"]);
            header("refresh: 0");
        }
    }
    ?>
    <?php
    $data = getAllFormEntries($pdo);

    echo "
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
            <th></th>
            <th></th>
            </thead>
        ";
    foreach ($data as $value) {
        echo "<tr>";
        echo "<td>" . $value->id . "</td>";
        echo "<td>" . $value->firstName . "</td>";
        echo "<td>" . $value->prefix . "</td>";
        echo "<td>" . $value->lastName . "</td>";
        echo "<td>" . $value->phoneNumber . "</td>";
        echo "<td>" . $value->streetName . "</td>";
        echo "<td>" . $value->houseNumber . "</td>";
        echo "<td>" . $value->woonplaats . "</td>";
        echo "<td>" . $value->postcode . "</td>";
        echo "<td>" . $value->countryName . "</td>";
        echo '<td><a href="update.php?id=' . $value->id . '">Edit</a></td>';
        echo '<td><a href="delete.php?id=' . $value->id . '">Delete</a></td>';
        echo "</tr>";
    }
    echo "</table>";
    ?>

    <br>

    <form action="index.php" method="post">
        <label for="first-name">Voornaam:</label>
        <input type="text" name="first-name">
        <label for="prefix">Tussenvoegsel:</label>
        <input type="text" name="prefix">
        <label for="last-name">Achternaam:</label>
        <input type="text" name="last-name">
        <label for="phone-number">Telefoonnummer:</label>
        <input type="text" name="phone-number">
        <label for="street-name">Straat naam:</label>
        <input type="text" name="street-name">
        <label for="house-number">Huisnummer:</label>
        <input type="number" name="house-number">
        <label for="woonplaats">Woonplaats: </label>
        <input type="text" name="woonplaats">
        <label for="postcode">Postcode:</label>
        <input type="text" name="postcode">
        <label for="country-name">Landnaam:</label>
        <input type="text" name="country-name">
        <input type="submit">
    </form>
</body>

</html>