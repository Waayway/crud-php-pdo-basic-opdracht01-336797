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

        table td, table th {
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
        if (
            array_key_exists('id', $_POST) and array_key_exists("first-name", $_POST)
            and array_key_exists("prefix", $_POST)
            and array_key_exists("last-name", $_POST)
        ) {
            updateFormEntry($pdo, $_POST['id'], $_POST['first-name'], $_POST['prefix'], $_POST['last-name']);
            header('Location: /');
        }
    }
    ?>

    <a href="/">Terug naar homepagina</a>

    <table>
        <thead>
            <th>ID</th>
            <th>Voornaam</th>
            <th>Tussenvoegsel</th>
            <th>Achternaam</th>
        </thead>
        <tr>
            <?php
            if (key_exists('id', $_GET)) {
                $data = getFormEntryById($pdo, $_GET['id'])[0];
                echo '<tr>';
                echo "<td>" . $data->id        . "</td>";
                echo "<td>" . $data->firstName . "</td>";
                echo "<td>" . $data->prefix    . "</td>";
                echo "<td>" . $data->lastName  . "</td>";
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
                echo '<label for="first-name">Voornaam:</label>';
                echo '<input type="text" name="first-name" value="' . $data->firstName . '">';
                echo '<label for="prefix">Tussenvoegsel:</label>';
                echo '<input type="text" name="prefix" value="' . $data->prefix . '">';
                echo '<label for="last-name">Achternaam:</label>';
                echo '<input type="text" name="last-name" value="' . $data->lastName . '">';
                echo '<input type="submit">';
                echo '</form>';
            }
            ?>
</body>

</html>