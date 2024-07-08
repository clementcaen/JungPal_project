document.getElementById('unlock').addEventListener('click', function() {
    var formData = new FormData(document.getElementById('profileForm'));
    console.log(...formData.entries()); // Print form data to the console for debugging

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'http://localhost/JungPal_project/php/submit.php', true);
    xhr.onload = function () {
        if (xhr.status === 200) {
            alert('Your ad has been successfully created.');
        } else {
            alert('An error occurred while submitting your ad.');
        }
    };
    xhr.send(formData);
});
