<?php
require 'lib/main.php';
if (key_exists('id', $_GET)) {
    deleteFormEntry($pdo, $_GET['id']);
    header('Location: /');
}
