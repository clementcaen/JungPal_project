document.addEventListener("DOMContentLoaded", function() {
    const logoutButton = document.getElementById("logout");
    if (logoutButton) {
        logoutButton.addEventListener("click", function(event) {
            event.preventDefault();
            console.log("Logout button clicked");

            // Appeler le script PHP de déconnexion
            ajaxRequest("GET", "http://localhost/JungPal_project/php/logout.php", null, function(response) {
                console.log("Logout response: ", response);
                if (response.success) {
                    console.log("Logout successful, redirecting...");
                    // Redirection vers la page de connexion après la déconnexion
                    window.location.href = "http://localhost/JungPal_project/html/homepage.html";
                } else {
                    console.error("Erreur lors de la déconnexion.");
                }
            });
        });
    } else {
        console.error("Le bouton de déconnexion avec l'ID 'logout' est introuvable.");
    }
});

function ajaxRequest(method, url, data, callback) {
    console.log(`Sending ${method} request to ${url}`);
    let xhr = new XMLHttpRequest();
    xhr.open(method, url, true);
    xhr.onload = function() {
        if (xhr.status === 200) {
            try {
                console.log("Response received: ", xhr.responseText);
                let jsonResponse = JSON.parse(xhr.responseText);
                callback(jsonResponse);
            } catch (e) {
                alert("Erreur lors du traitement de la réponse : " + e.message);
                console.error("Réponse reçue:", xhr.responseText);
            }
        } else {
            alert("Erreur de requête: " + xhr.status);
        }
    };
    xhr.onerror = function() {
        alert("Erreur de connexion au serveur.");
    };
    if (data) {
        xhr.send(data);
    } else {
        xhr.send();
    }
}
