<?php

// Create

function createFormEntry(PDO $pdo, $firstName, $prefix, $lastName, $phoneNumber, $streetName, $houseNumber, $woonplaats, $postcode, $countryName) {
    $sql = 'INSERT INTO form_entry (firstName, prefix, lastName, phoneNumber, streetName, houseNumber, woonplaats, postcode, countryName) VALUES (?,?,?,?,?,?,?,?,?)';
    $statement = $pdo->prepare($sql);
    $statement->execute([$firstName, $prefix, $lastName, $phoneNumber, $streetName, $houseNumber, $woonplaats, $postcode, $countryName]);
}

// Read
function getFormEntryById($pdo, $id) {
    $sql = 'SELECT * FROM form_entry WHERE id = ?';
    $statement = $pdo->prepare($sql);
    $statement->execute([$id]);

    return $statement->fetchAll(PDO::FETCH_OBJ);
}

function getAllFormEntries($pdo) {
    $sql = 'SELECT * FROM form_entry';
    $statement = $pdo->prepare($sql);
    $statement->execute();

    return $statement->fetchAll(PDO::FETCH_OBJ);
}

// Update

function updateFormEntry($pdo, $id, $firstName, $prefix, $lastName, $phoneNumber, $streetName, $houseNumber, $woonplaats, $postcode, $countryName) {
    $sql = "UPDATE form_entry SET firstName = ?, prefix = ?, lastName = ?, phoneNumber = ?, streetName = ?, houseNumber = ?, woonplaats = ?, postcode = ?, countryName = ?
            WHERE id = ?";
    $statement = $pdo->prepare($sql);
    $statement->execute([$firstName, $prefix, $lastName, $phoneNumber, $streetName, $houseNumber, $woonplaats, $postcode, $countryName, $id]);
}

// Delete

function deleteFormEntry($pdo, $id) {
    $sql = "DELETE FROM form_entry WHERE id = ?";
    $statement = $pdo->prepare($sql);
    $statement->execute([$id]);
}