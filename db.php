<?php
// Připojení k SQLite databázi
$db = new PDO('sqlite:database.db');

// Automatické vytvoření tabulky, pokud neexistuje [cite: 43]
$db->exec("CREATE TABLE IF NOT EXISTS interests (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL
)");