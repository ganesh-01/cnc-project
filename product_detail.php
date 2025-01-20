<?php
// Read the JSON file
$jsonData = file_get_contents('products.json');

// Decode JSON into an associative array
$data = json_decode($jsonData, true);

// Check if 'id' is passed in the query string
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $result = null;

    // Search for the product by ID
    foreach ($data as $item) {
        if ($item['id'] === $id) {
            $result = $item;
            break;
        }
    }

    // Return the result
    if ($result) {
        $images = $result['image'];
  echo $result['name']; }
    }
?>
<html>

<head>
    <title>Product Detail</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" type="text/css" href="carousel.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
    <?php
    include 'header.html';
    ?>

    <div class="bodyContainer">
        <div class="sideProducts">
        </div>
        <div class="main">
            <div class="productDetail">
                <div class="CarouselFeatures">
                    <!-- <section class="carousel" aria-label="Gallery">
                        <ol class="carousel__viewport">
                            <li id="carousel__slide1" tabindex="0" class="carousel__slide">
                                <div class="carousel__snapper">
                                    <a href="#carousel__slide4" class="carousel__prev">Go to last slide</a>
                                    <a href="#carousel__slide2" class="carousel__next">Go to next slide</a>
                                </div>
                            </li>
                            <li id="carousel__slide2" tabindex="0" class="carousel__slide">
                                <div class="carousel__snapper">
                                    <h1>hai</h1>
                                </div>
                                <a href="#carousel__slide1" class="carousel__prev">Go to previous slide</a>
                                <a href="#carousel__slide3" class="carousel__next">Go to next slide</a>
                            </li>
                            <li id="carousel__slide3" tabindex="0" class="carousel__slide">
                                <div class="carousel__snapper"></div>
                                <a href="#carousel__slide2" class="carousel__prev">Go to previous slide</a>
                                <a href="#carousel__slide4" class="carousel__next">Go to next slide</a>
                            </li>
                            <li id="carousel__slide4" tabindex="0" class="carousel__slide">
                                <div class="carousel__snapper"></div>
                                <a href="#carousel__slide3" class="carousel__prev">Go to previous slide</a>
                                <a href="#carousel__slide1" class="carousel__next">Go to first slide</a>
                            </li>
                        </ol>
                        <aside class="carousel__navigation">
                            <ol class="carousel__navigation-list">
                                <li class="carousel__navigation-item">
                                    <a href="#carousel__slide1" class="carousel__navigation-button">Go to slide 1</a>
                                </li>
                                <li class="carousel__navigation-item">
                                    <a href="#carousel__slide2" class="carousel__navigation-button">Go to slide 2</a>
                                </li>
                                <li class="carousel__navigation-item">
                                    <a href="#carousel__slide3" class="carousel__navigation-button">Go to slide 3</a>
                                </li>
                                <li class="carousel__navigation-item">
                                    <a href="#carousel__slide4" class="carousel__navigation-button">Go to slide 4</a>
                                </li>
                            </ol>
                        </aside>
                    </section> -->
                    <section class="carousel" aria-label="Gallery">
    <ol class="carousel__viewport">
        <?php foreach ($images as $index => $image): ?>
            <li id="carousel__slide<?= $index + 1 ?>" tabindex="0" class="carousel__slide">
                <div class="carousel__snapper">
                    <img src="<?= htmlspecialchars($image) ?>" alt="Slide <?= $index + 1 ?>" style="width: 100%; height: auto;">
                    <?php if ($index > 0): ?>
                        <a href="#carousel__slide<?= $index ?>" class="carousel__prev">Go to previous slide</a>
                    <?php else: ?>
                        <a href="#carousel__slide<?= count($images) ?>" class="carousel__prev">Go to last slide</a>
                    <?php endif; ?>
                    <?php if ($index < count($images) - 1): ?>
                        <a href="#carousel__slide<?= $index + 2 ?>" class="carousel__next">Go to next slide</a>
                    <?php else: ?>
                        <a href="#carousel__slide1" class="carousel__next">Go to first slide</a>
                    <?php endif; ?>
                </div>
            </li>
        <?php endforeach; ?>
    </ol>
    <aside class="carousel__navigation">
        <ol class="carousel__navigation-list">
            <?php foreach ($images as $index => $image): ?>
                <li class="carousel__navigation-item">
                    <a href="#carousel__slide<?= $index + 1 ?>" class="carousel__navigation-button">Go to slide <?= $index + 1 ?></a>
                </li>
            <?php endforeach; ?>
        </ol>
    </aside>
</section>
                    <div class="features">
                        <h3>Product Features</h3>
                        <?php
                         echo "<ul>";
                         foreach ($result['features'] as $feature) {
                             echo "<li>$feature</li>";
                         }
                         echo "</ul>";
                         ?>
                    </div>
                </div>
                <div class="specification">
                    <h3>Product Specification</h3>
                    <?php
                     echo "<table border='1' cellpadding='8' cellspacing='0'>";
                     echo "<tr>
                             <th>Property</th>";
                     
                     // Add model headers dynamically
                     foreach ($result['specification'] as $spec) {
                         echo "<th>Model {$spec['Model']}</th>";
                     }
                     echo "</tr>";
             
                     // Dynamically generate all rows
                     foreach ($result['specification'][0] as $key => $value) {
                         echo "<tr>";
                         echo "<th>" . htmlspecialchars($key) . "</th>";
             
                         foreach ($result['specification'] as $spec) {
                             echo "<td>" . htmlspecialchars($spec[$key]) . "</td>";
                         }
             
                         echo "</tr>";
                     }
             
                     echo "</table>";
             ?>
                </div>
                <div class="youtube">
                    <?php
                    echo "<iframe width='720' height='405' src='{$result['youtube']}'></iframe>";
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>