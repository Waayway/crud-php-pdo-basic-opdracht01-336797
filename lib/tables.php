<?php

function createTables($pdo)
{
    $tables = array(
        "CREATE TABLE IF NOT EXISTS form_entry (
        id          serial PRIMARY KEY,
        firstName   varchar(50) NOT NULL,
        prefix      varchar(50) NOT NULL,
        lastName    varchar(50) NOT NULL
    );"
    );

    foreach ($tables as $sql) {
        $pdo->exec($sql);
    }
}
