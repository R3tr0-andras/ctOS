/* 
document.getElementById('searchForm').addEventListener('submit', function(event) {
    // Empêche le comportement par défaut du formulaire (changement de page)
    event.preventDefault();
    
    var searchText = document.getElementById('searchText').value;
    // Envoie une requête AJAX au contrôleur avec le texte de recherche
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'votre_controleur.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Réponse de la requête AJAX
            var response = JSON.parse(xhr.responseText);
            // Afficher les résultats de recherche
            displaySearchResults(response);
        }
    };
    xhr.send('searchText=' + searchText);
});

document.getElementById('searchText').addEventListener('input', function() {
    // Réinitialise les résultats de la recherche
    document.getElementById('searchResults').innerHTML = '';
});

function displaySearchResults(results) {
    var searchResultsDiv = document.getElementById('searchResults');
    // Parcourt les résultats et les affiche dans le div
    for (var i = 0; i < results.length; i++) {
        var user = results[i];
        var userDiv = document.createElement('div');
        userDiv.textContent = user.userName + ' - ' + user.userFirstName;
        searchResultsDiv.appendChild(userDiv);
    }
}
*/