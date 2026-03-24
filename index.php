<?php
require "db.php";

// 1. Routing logika
$page = $_GET["page"] ?? "home";
$allowed_pages = ["home", "interests", "skills"];
$file = "pages/" . $page . ".php";

// Kontrola existence souboru
if (!in_array($page, $allowed_pages) || !file_exists($file)) {
    $file = "pages/not_found.php";
}
?>

<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <title>IT Profil 7.0</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav>
        <a href="?page=home">Domů</a>
        <a href="?page=interests">Zájmy</a>
        <a href="?page=skills">Dovednosti</a>
    </nav>

    <div class="container">
        <?php include $file; ?>
    </div>
</body>
</html>