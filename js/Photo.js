function ajouterPhoto(inputId, containerId) {
    var input = document.getElementById(inputId);
    var file = input.files[0];
    var reader = new FileReader();

    reader.onload = function(e) {
        var image = document.createElement('img');
        var timestamp = new Date().getTime(); // Générer un ID unique en utilisant le timestamp
        image.id = 'image_' + timestamp; // ID unique pour chaque image
        image.src = e.target.result;
        var container = document.getElementById(containerId);
        container.innerHTML = ''; // Effacer le contenu précédent
        container.appendChild(image);
    };

    reader.readAsDataURL(file);
}