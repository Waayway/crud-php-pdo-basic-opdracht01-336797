<?php

// Create

function createFormEntry(PDO $pdo, $firstName, $prefix, $lastName) {
    $sql = 'INSERT INTO form_entry (firstName, prefix, lastName) VALUES (?,?,?)';
    $statement = $pdo->prepare($sql);
    $statement->execute([$firstName, $prefix, $lastName]);
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

function updateFormEntry($pdo, $id, $firstName, $prefix, $lastName) {
    $sql = "UPDATE form_entry SET firstName = ?, prefix = ?, lastName = ?
            WHERE id = ?";
    $statement = $pdo->prepare($sql);
    $statement->execute([$firstName, $prefix, $lastName, $id]);
}

// Delete

function deleteFormEntry($pdo, $id) {
    $sql = "DELETE FROM form_entry WHERE id = ?";
    $statement = $pdo->prepare($sql);
    $statement->execute([$id]);
}