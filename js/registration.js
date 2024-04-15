//ajout du ouvel utilisateur dans la base de données
$(document).ready(function () {
    $("#submit").on('click', function () {
        $.ajax({
            url: 'http://localhost/JungPal_project/php/registration.php',
            type: "POST",
            data: $("#inscription-form").serialize(),
            success: function (result) {
             result=JSON.parse(result);
                console.log(result);
                if (result) {
                  const section = document.querySelector('section');
                   
                  const myArticle = document.createElement('p');
            
            myArticle.textContent = 'Un compte correspond déjà à cet Email';
            myArticle.classList.add('article');
            section.appendChild(myArticle);
                }else{
                  location.href="Registration.html";
                }
            },
            error: function (xhr, resp, text) {
                console.log(xhr, resp, text);
            }
        })
    });
});
