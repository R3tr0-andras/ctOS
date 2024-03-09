<!-- Barre de recherche -->
<h2>Barre de recherche</h2>
<form id="searchForm" method="GET">
    <input type="text" name="searchText" placeholder="searching a name" value="">
    <button name="searchBTN">E</button>
</form>

<!-- Résultats de la recherche -->
<h2>Résultats de la recherche :</h2>
<?php
// Vérifier si des résultats sont disponibles
if (!empty($results)): ?>
    <ul>
        <?php foreach ($results as $result): ?>
            <li>User ID: <?php echo $result['userId']; ?></li>
            <li>User Name: <?php echo $result['userName']; ?></li>
            <li>User First Name: <?php echo $result['userFirstName']; ?></li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>Aucun résultat trouvé.</p>
<?php endif; ?>