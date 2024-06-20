document.addEventListener("DOMContentLoaded", function() {
    const logoutButton = document.getElementById("logout");
    if (logoutButton) {
        logoutButton.addEventListener("click", function(event) {
            event.preventDefault();

            // Appeler le script PHP de déconnexion
            ajaxRequest("GET", "http://localhost/JungPal_project/php/logout.php", null, function(response) {
                // Redirection vers la page de connexion après la déconnexion
                window.location.href = "http://localhost/JungPal_project/html/connexion.html";
            });
        });
    } else {
        console.error("Le bouton de déconnexion avec l'ID 'logout' est introuvable.");
    }
});

function ajaxRequest(method, url, data, callback) {
    let xhr = new XMLHttpRequest();
    xhr.open(method, url);
    xhr.onload = function() {
        if (xhr.status === 200) {
            try {
                let jsonResponse = JSON.parse(xhr.responseText);
                callback(jsonResponse);
            } catch (e) {
                alert("Erreur lors du traitement de la réponse : " + e.message);
                console.error("Réponse reçue:", xhr.responseText);
            }
        } else {
            alert("Erreur de requête: " + xhr.status); // Afficher le code d'erreur HTTP
        }
    };
    xhr.onerror = function() {
        alert("Erreur de connexion au serveur."); // Afficher une erreur en cas d'échec de la requête
    };
    xhr.send(data);
}
