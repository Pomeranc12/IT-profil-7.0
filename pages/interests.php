<?php
// --- LOGIKA (Zpracování formulářů) ---

// 1. PŘIDÁNÍ ZÁJMU [cite: 67]
if (isset($_POST['add'])) {
    $stmt = $db->prepare("INSERT INTO interests (name) VALUES (?)");
    $stmt->execute([$_POST['name']]);
    header("Location: ?page=interests&msg=added"); // PRG Pattern [cite: 71]
    exit;
}

// 2. MAZÁNÍ ZÁJMU [cite: 69]
if (isset($_GET['delete'])) {
    $stmt = $db->prepare("DELETE FROM interests WHERE id = ?");
    $stmt->execute([$_GET['delete']]);
    header("Location: ?page=interests&msg=deleted");
    exit;
}

// --- ZOBRAZENÍ ---
$interests = $db->query("SELECT * FROM interests")->fetchAll();
?>

<h1>Moje zájmy</h1>

<?php if(isset($_GET['msg'])): ?>
    <p class="alert">Akce byla úspěšná!</p>
<?php endif; ?>

<form method="post">
    <input type="text" name="name" placeholder="Napiš zájem..." required>
    <button type="submit" name="add">Přidat</button>
</form>

<ul>
    <?php foreach ($interests as $i): ?>
        <li>
            <?= htmlspecialchars($i['name']) ?> 
            <a href="?page=interests&delete=<?= $i['id'] ?>" onclick="return confirm('Smazat?')">❌</a>
        </li>
    <?php endforeach; ?>
</ul>