document.getElementById('unlock').addEventListener('click', function() {
    var formData = new FormData(document.getElementById('profileForm'));

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'http://localhost/JungPal_project/php/update_ad.php', true);
    xhr.onload = function () {
        if (xhr.status === 200) {
            var contentType = xhr.getResponseHeader("Content-Type");
            if (contentType && contentType.indexOf("application/json") !== -1) {
                var response = JSON.parse(xhr.responseText);
                alert(response.message);
    
                if (response.success) {
                    document.getElementById('adId').value = response.ad_id;
                    // document.getElementById('submitAd').textContent = 'Update ad';
                    // document.getElementById('deleteAd').style.display = 'block';
                }
            } else {
                alert('Response is not in JSON format');
            }
        } else {
            alert('An error occurred while submitting your ad.');
        }
    };
    xhr.onerror = function() {
        console.error('Request failed');
    };
    
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                try {
                    var response = JSON.parse(xhr.responseText);
                    alert(response.message);
    
                    if (response.success) {
                        document.getElementById('adId').value = response.ad_id;
                    }
                } catch (error) {
                    console.error('Error parsing JSON response:', error);
                }
            } else {
                console.error('Request failed:', xhr.status, xhr.statusText);
            }
        }
    };
        
    xhr.send(formData);
});