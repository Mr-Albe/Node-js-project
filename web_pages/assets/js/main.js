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


/*============== SWIPER JS ==================*/
let swiperCards = new Swiper('.card__content', {
    loop: true,
    spaceBetween : 32,
    grabCursor: true,
 
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
      dynamicBullets: true,
    },

    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },

    breakpoints: {
      600:{
        slidesPerView:2, 
      },
      968:{
        slidesPerView:3,
      },
    },
});

/* ====================================== form sending =====================================*/
document.getElementById('contact-form').addEventListener('submit', async function (event) {
  event.preventDefault();

  const formData = {
      name: document.getElementById('name').value,
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
      } else {
          alert('Erreur lors de l\'envoi de l\'email: ' + result.error);
      }
  } catch (error) {
      alert('Erreur: ' + error.message);
  }
});

/*========================================= client comments =======================================*/

document.getElementById('toggleCommentSection').addEventListener('click', function() {
  const commentsSection = document.getElementById('comments-section');
  if (commentsSection.style.display === 'none') {
      commentsSection.style.display = 'block';
  } else {
      commentsSection.style.display = 'none';
  }
});

document.getElementById('submitComment').addEventListener('click', function() {
  const name = document.getElementById('name').value;
  const commentText = document.getElementById('comment').value;

  if (!name || !commentText) {
      alert('Le nom et le commentaire ne peuvent pas être vides.');
      return;
  }

  const formData = { name, comment: commentText };

  fetch('/comments', {
      method: 'POST',
      headers: {
          'Content-Type': 'application/json'
      },
      body: JSON.stringify(formData)
  })
  .then(response => response.json())
  .then(data => {
      if (data.success) {
          loadComments();
          document.getElementById('name').value = '';
          document.getElementById('comment').value = '';
      } else {
          alert('Erreur lors de l\'envoi du commentaire.');
      }
  })
  .catch(error => {
      console.error('Error:', error);
      alert('Erreur lors de l\'envoi du commentaire.');
  });
});

function loadComments() {
  fetch('/comments')
  .then(response => response.json())
  .then(data => {
      const commentsList = document.getElementById('comments-list');
      commentsList.innerHTML = '';
      data.comments.forEach(comment => {
          const commentDiv = document.createElement('div');
          commentDiv.className = 'client-content';
          commentDiv.innerHTML = `
              <p><i class="fa-solid fa-quote-left"></i> ${comment.comment} <i class="fa-solid fa-quote-right"></i></p>
              <div class="ident1">
                  <img src="" alt="">
                  <h5>${comment.name}</h5>
                  <p class="content--p">Client</p>
              </div>
          `;
          commentsList.appendChild(commentDiv);
      });
  })
  .catch(error => {
      console.error('Error:', error);
  });
}

// Load comments on page load
document.addEventListener('DOMContentLoaded', function() {
  loadComments();
});