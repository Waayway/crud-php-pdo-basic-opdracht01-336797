<?php

function createTables($pdo)
{
    $tables = array(
        "CREATE TABLE IF NOT EXISTS form_entry (
            id          serial PRIMARY KEY,
            firstName   varchar(50) NOT NULL,
            prefix      varchar(50) NOT NULL,
            lastName    varchar(50) NOT NULL,
            phoneNumber char(8)    ,
            streetName  varchar(50),
            houseNumber varchar(50),
            woonplaats  varchar(50),
            postcode    varchar(50),
            countryName varchar(50)
        );"
    );

    foreach ($tables as $sql) {
        $pdo->exec($sql);
    }
}
