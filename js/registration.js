document.getElementById("signup").addEventListener("click", function(event) {
    event.preventDefault();

    let formData = new FormData(document.getElementById("inscription-form"));

    ajaxRequest("POST", "https://main--gentle-yeot-d7d206.netlify.app/php/registration.php", formData, function(response) {
        if (response.success) {
            window.location.href = "https://main--gentle-yeot-d7d206.netlify.app/html/connexion.html";
        } else {
            alert("Erreur: " + response.message); // Display error message
        }
    });
});

function ajaxRequest(method, url, data, callback) {
    let xhr = new XMLHttpRequest();
    xhr.open(method, url);
    xhr.onload = function() {
        if (xhr.status === 200) {
            try {
                let response = JSON.parse(xhr.responseText);
                callback(response);
            } catch (e) {
                alert("Erreur de traitement de la réponse du serveur.");
            }
        } else {
            alert("Erreur de requête: " + xhr.status); // Display HTTP error code
        }
    };
    xhr.onerror = function() {
        alert("Erreur de connexion au serveur."); // Display connection error
    };
    xhr.send(data);
}
