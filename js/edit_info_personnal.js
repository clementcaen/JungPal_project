// Fonction pour débloquer les champs de saisie et changer la visibilité des boutons
function unlockInputs() {
    var inputs = document.querySelectorAll('#inscription-form input');
    inputs.forEach(function(input) {
        input.disabled = false;
    });
    document.getElementById('unlock').style.display = 'none';
    document.getElementById('lockButton').style.display = 'inline-block';
}

// Fonction pour rebloquer les champs de saisie et changer la visibilité des boutons
function lockInputs() {
    var inputs = document.querySelectorAll('#inscription-form input');
    inputs.forEach(function(input) {
        input.disabled = true;
    });
    document.getElementById('unlock').style.display = 'inline-block';
    document.getElementById('lockButton').style.display = 'none';
}

// Ajout des écouteurs d'événements pour les boutons
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('unlock').addEventListener('click', unlockInputs);
    document.getElementById('lockButton').addEventListener('click', lockInputs);
});
