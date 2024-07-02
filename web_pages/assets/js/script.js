/*========================================= client comments =======================================*/
// Attend que le DOM soit chargé
document.addEventListener('DOMContentLoaded', function() {
    const commentsList = document.getElementById('comments-list');
    const commentForm = document.getElementById('comment-form');

    // Load comments from the JSON file
    fetch('/comments')
        .then(response => response.json())
        .then(data => {
            displayComments(data);
        })
        .catch(error => console.error('Error loading comments:', error));

    commentForm.addEventListener('submit', function(event) {
        event.preventDefault();
        const name = document.getElementById('name').value;
        const comment = document.getElementById('comment').value;

        const newComment = { name, comment, date: new Date().toLocaleString()};
        
        fetch('/comments', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(newComment)
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                fetch('/comments')
                    .then(response => response.json())
                    .then(data => {
                        displayComments(data);
                    })
                    .catch(error => console.error('Error reloading comments:', error));
            }
        })
        .catch(error => console.error('Error adding comment:', error));

        commentForm.reset();
    });

    function displayComments(comments) {
        commentsList.innerHTML = '';
        comments.forEach(comment => {
            const commentDiv = document.createElement('div');
            commentDiv.className = 'client-content';
            commentDiv.innerHTML = `
                <div id="comment--client">
                    <p><i class="fa-solid fa-quote-left "></i>${comment.comment }<i class="fa-solid fa-quote-right"></i></p>
                    <div class="ident">
                        <i class="fa-solid fa-user"></i>                      
                        <h5>${comment.name}</h5>
                        <p class="content--p">client</p>
                    </div>
                </div>
            `;
            commentsList.appendChild(commentDiv);
        });
    }
});

//<img src="${comment.image}" alt="">

/*==========================nav links =========================================================*/

document.addEventListener('DOMContentLoaded', function() {
    const menuBtn = document.getElementById('menuBtn');
    const closeBtn = document.getElementById('closeBtn');
    const navLinks = document.getElementById('navLinks');
    const body = document.body; // Sélectionne l'élément body
  
    menuBtn.addEventListener('click', function() {
        navLinks.style.right = "0";
        navLinks.classList.add("active");
        menuBtn.style.display = "none";
        closeBtn.style.display = "block";
        body.classList.add('no-scroll'); // Désactive le défilement de la page
    });
  
    closeBtn.addEventListener('click', function() {
        navLinks.style.right = "-100%";
        navLinks.classList.remove("active");
        menuBtn.style.display = "block";
        closeBtn.style.display = "none";
        body.classList.remove('no-scroll'); // Active le défilement de la page
    });
  });


/* ====================================== form sending =====================================*/
document.getElementById('contact-form').addEventListener('submit', async function (event) {
    event.preventDefault();
  
    const formData = {
        names: document.getElementById('names').value,
        email: document.getElementById('email').value,
        message: document.getElementById('message').value,
    };
  
    try {
        const response = await fetch('/send-email', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(formData),
        });
  
        const result = await response.json();
        if (result.success) {
            alert('Email envoyé avec succès!');
            document.getElementById('contact-form').reset(); // Reset the form
        } else {
            alert('Erreur lors de l\'envoi de l\'email: ' + result.error);
        }
    } 
    catch (error) {
        alert('Erreur: ' + error.message);
    }
  
  });
  