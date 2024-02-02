<form method="get">
    <label for="nombre">Entrez un nombre :</label>
    <input type="number" id="nombre" name="nombre" required>
    <br>
    <button name="submit">Envoyer</button>
</form>

<?php
// Accéder aux userIds stockés dans le tableau associatif
foreach ($fakeUserIds as $key => $userId) {
    echo "User key: " . $key . ", User ID: " . $userId . "\n";
}
?>