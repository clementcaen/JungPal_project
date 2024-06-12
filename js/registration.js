document.getElementById("signup").addEventListener("click", function(event) {
    event.preventDefault();

    let formData = new FormData(document.querySelector("form"));

    ajaxRequest("POST", "http://localhost/JungPal_project/php/registration.php", formData, function(response) {
        if (response.success) {
            window.location.href = "http://localhost/JungPal_project/html/homepage.html";
            alert(response.message);
        } else {
            alert("Erreur: " + response.message); // Afficher le message d'erreur
        }
    });
});


function ajaxRequest(method, url, data, callback) {
    let xhr = new XMLHttpRequest();
    xhr.open(method, url);
    xhr.onload = function() {
        if (xhr.status === 200) {
            callback(JSON.parse(xhr.responseText));
        } else {
            alert("Erreur de requête: " + xhr.status); // Afficher le code d'erreur HTTP
        }
    };
    xhr.onerror = function() {
        alert("Erreur de connexion au serveur."); // Afficher une erreur en cas d'échec de la requête
    };
    xhr.send(data);
}
