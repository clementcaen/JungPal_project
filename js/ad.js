document.getElementById('send').addEventListener('click', function() {

    // Create a FormData object from the form
    var formData = new FormData(document.getElementById('profileForm'));

    // Send the data via AJAX
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'http://localhost:63342/JungPal_project/php/submit.php', true);
    xhr.onload = function () {
        if (xhr.status === 200) {
            alert('Your ad has been successfully created.');
        } else {
            alert('An error occurred while submitting your ad.');
        }
    };
    xhr.send(formData);
});
