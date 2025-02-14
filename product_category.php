<!-- later change to dynamic way -->
 <!DOCTYPE html>
 <html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product Categoory</title>
  <link rel="stylesheet" href="./styles.css">
  <style>
    body{
      scrollbar-width:none;
    }
    .banner-img-container img{
      height: 20%;
      max-height: 200px;
      width: 100vw;
    }
    
    .category-title > p {
      padding: 5px 10px;
      background-color: #2b6cb0;
      color: white;
      font-size: 0.8rem;
      width: fit-content;
      /* margin-top: 200px; */
    }

    .category-title > p:hover{
      background-color: #215387;
      transition: 0.2s;
    }

    .product-category-section .category-title{
      margin-left: 10px;
      padding-left: 10px;
    }

    .cards-container {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      width: 85vw;
      /* margin-left: -5px; */
    }

    /* from w3 schools */
    .category-card {
      background-color: transparent;
      margin: 5px;
      width: 250px;
      height: 250px;
      /* border: 1px solid #f1f1f1; */
      perspective: 1000px; /* Remove this if you don't want the 3D effect */
      opacity: 0;
      transform: scale(0);
      transition: transform 0.5s ease, opacity 0.5s ease;
    }

    /* Animation to scale the card */
    .category-card.visible {
      opacity: 1;
      transform: scale(1);
    }


    /* This container is needed to position the front and back side */
    .category-card-inner {
      position: relative;
      width: 100%;
      height: 100%;
      text-align: center;
      transition: transform 0.8s;
      transform-style: preserve-3d;
    }

    /* Do an horizontal category when you move the mouse over the category box container */
    .category-card:hover .category-card-inner {
      transform: rotateY(180deg);
      /* margin-bottom: 200px; */
      /* top: -100px;
      transition: 0.8s;
      transform: scale(0.5); */
    }

    /* Position the front and back side */
    .category-card-front, .category-card-back {
      position: absolute;
      width: 100%;
      height: 100%;
      -webkit-backface-visibility: hidden; /* Safari */
      backface-visibility: hidden;
      justify-items: center;
      align-content: center;      
      border-radius: 20px;
    }

    /* Style the front side (fallback if image is missing) */
    .category-card-front {
      background-color: #ffffff;
      color: rgb(255, 255, 255);
      box-shadow: inset 0 0 20px #b1edff;
    }

    .category-card-front > img {
      width: 200px;
    }

    /* Style the back side */
    .category-card-back {
      background-color: #2b6cb0;
      color: white;
      transform: rotateY(180deg);
    }

  </style>
 </head>
 <body>
  <section class="banner-product-category">
    <div class="banner-img-container">
      <img src="./images/strapping_machine_banner.webp" alt="Banner image">
    </div>
  </section>

  <section class="product-category-section">
    <div class="category-title">
      <p>Ultrasonic sealing banding machine</p>
    </div>
    <div class="cards-container">
    
    <?php
// Read the JSON file
$jsonData = file_get_contents('product_category.json');

// Decode JSON into an associative array
$data = json_decode($jsonData, true);
foreach ($data as $item) {
echo "    <div class='category-card'>
      <div class='category-card-inner'>
        <div class='category-card-front'>
          <img src='./banding_machine.webp' alt='Avatar'>
        </div>
        <div class='category-card-back'>
          <h1>".$item['modelNo']."</h1>
          <p>".$item['model']."</p>
          <a href='./product_detail.php?id=".$item['productId']."'>View Details</a>
        </div>
        </div>
    </div>";}


?>


    <!-- <div class="category-card">
      <div class="category-card-inner">
        <div class="category-card-front">
          <img src="./banding_machine.webp" alt="Avatar">
        </div>
        <div class="category-card-back">
          <h1>John Doe</h1>
          <p>Architect & Engineer</p>
          <p>We love that guy</p>
        </div>
      </div>
    </div>
    <div class="category-card">
      <div class="category-card-inner">
        <div class="category-card-front">
          <img src="./banding_machine.webp" alt="Avatar">
        </div>
        <div class="category-card-back">
          <h1>John Doe</h1>
          <p>Architect & Engineer</p>
          <p>We love that guy</p>
        </div>
      </div>
    </div>
    <div class="category-card">
      <div class="category-card-inner">
        <div class="category-card-front">
          <img src="./banding_machine.webp" alt="Avatar">
        </div>
        <div class="category-card-back">
          <h1>John Doe</h1>
          <p>Architect & Engineer</p>
          <p>We love that guy</p>
        </div>
      </div>
    </div>
    <div class="category-card">
      <div class="category-card-inner">
        <div class="category-card-front">
          <img src="./banding_machine.webp" alt="Avatar">
        </div>
        <div class="category-card-back">
          <h1>John Doe</h1>
          <p>Architect & Engineer</p>
          <p>We love that guy</p>
        </div>
      </div>
    </div>
    <div class="category-card">
      <div class="category-card-inner">
        <div class="category-card-front">
          <img src="./banding_machine.webp" alt="Avatar">
        </div>
        <div class="category-card-back">
          <h1>John Doe</h1>
          <p>Architect & Engineer</p>
          <p>We love that guy</p>
        </div>
      </div>
    </div>
    <div class="category-card">
      <div class="category-card-inner">
        <div class="category-card-front">
          <img src="./banding_machine.webp" alt="Avatar">
        </div>
        <div class="category-card-back">
          <h1>John Doe</h1>
          <p>Architect & Engineer</p>
          <p>We love that guy</p>
        </div>
      </div>
    </div>
    <div class="category-card">
      <div class="category-card-inner">
        <div class="category-card-front">
          <img src="./banding_machine.webp" alt="Avatar">
        </div>
        <div class="category-card-back">
          <h1>John Doe</h1>
          <p>Architect & Engineer</p>
          <p>We love that guy</p>
        </div>
      </div>
    </div>
    <div class="category-card">
      <div class="category-card-inner">
        <div class="category-card-front">
          <img src="./banding_machine.webp" alt="Avatar">
        </div>
        <div class="category-card-back">
          <h1>John Doe</h1>
          <p>Architect & Engineer</p>
          <p>We love that guy</p>
        </div>
      </div>
    </div>
    <div class="category-card">
      <div class="category-card-inner">
        <div class="category-card-front">
          <img src="./banding_machine.webp" alt="Avatar">
        </div>
        <div class="category-card-back">
          <h1>John Doe</h1>
          <p>Architect & Engineer</p>
          <p>We love that guy</p>
        </div>
      </div>
    </div> -->

    </div>
  </section>
 </body>
 </html>
 <script>
  // Function to check if the card is in the viewport
function isInViewport(el) {
  const rect = el.getBoundingClientRect();
  return (
    rect.top >= 0 &&
    rect.left >= 0 &&
    rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
    rect.right <= (window.innerWidth || document.documentElement.clientWidth)
  );
}

// Select all card elements
const cards = document.querySelectorAll('.category-card');

// Function to add the 'visible' class to cards when they appear in the viewport
function checkVisibility() {
  cards.forEach(card => {
    if (isInViewport(card)) {
      card.classList.add('visible');
    }
  });
}

// Listen for scroll events
window.addEventListener('scroll', checkVisibility);

// Initially check visibility on page load
document.addEventListener('DOMContentLoaded', () => {
  checkVisibility();
});
 </script>