

/* Prévu pour la version AJAX */
const form = document.querySelector("#booking-form");

form.addEventListener('submit', function (event) {
    event.preventDefault(); // Empêche l'envoi du formulaire par défaut
    const formData = new FormData(form); // Créez un objet FormData pour récupérer les données du formulaire

    // Envoie des données du formulaire via AJAX
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'booking-insert.php'); // Spécifiez l'URL et la méthode HTTP
    xhr.onload = function () {
        if (xhr.status === 200) {
            const response = JSON.parse(xhr.responseText);
            console.log(response); // Affiche la réponse de la requête AJAX
          } else {
            console.error('Une erreur est survenue.');
          }
    };
    xhr.send(formData); // Envoyer les données du formulaire
});

