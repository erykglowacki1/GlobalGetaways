<?php
require "templates/header.php";
require "common.php";
require_once 'connection/connectionToDB.php';
require "classes/Destination.php";
require "classes/DestinationSearch.php";

session_start();
$result = [];
$error_message = "";

if (isset($_POST['search_submit'])) {
    try {
        $search_place = $_POST['search_place'];
        $destinationSearch = new DestinationSearch($connection);
        $result = $destinationSearch->searchDestination($search_place);
        if ($result === null) {
            $error_message = "No results found for " . htmlspecialchars($search_place) . ".";
        } else {
            $_SESSION['destination_id'] = $result[0]->getId();
        }
    } catch (Exception $e) {
        $error_message = "An error occurred: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Search</title>
    <link rel="stylesheet" href="css/grid.css">
</head>
<body>
<h1>Logged in as <?php echo $_SESSION['user_name']; ?> :</h1>
<div class="search-form-container">
    <h2 style="text-align: center;">Search for Destinations</h2>
    <form class="search-bar" method="post">
        <div class="form-field">
            <label for="search-place">Place:</label>
            <input type="text" id="search-place" name="search_place" required>
        </div>

        <div class="form-field">
            <label for="search-dates">Dates:</label>
            <input type="date" id="search-dates" name="search_dates" required>
        </div>

        <div class="form-field">
            <label for="search-people">Number of People:</label>
            <select id="search-people" name="search_people" required>
                <?php for ($i = 1; $i <= 10; $i++) { ?>
                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php } ?>
            </select>
        </div>

        <div class="submit-container">
            <input type="submit" name="search_submit" value="Search">
        </div>
    </form>
</div>

<?php if (!empty($result)): ?>
<div class="results-section">
    <h2>Best Flight Found</h2>
    <div class="results-table">
        <table>
            <thead>
            <tr>
                <th>City</th>
                <th>Description</th>
                <th>Price</th>
                <th>Book</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($result as $destination): ?>
                <tr>
                    <td><?php echo escape($destination->getCity()); ?></td>
                    <td><?php echo escape($destination->getDescription()); ?></td>
                    <td><?php echo escape($destination->getPrice()); ?></td>
                    <td>
                        <form action="Auth.php" method="post">
                            <input type="hidden" name="City" value="<?php echo escape($destination->getCity()); ?>">
                            <input type="hidden" name="Description"
                                   value="<?php echo escape($destination->getDescription()); ?>">
                            <input type="hidden" name="Price"
                                   value="<?php echo escape($destination->getPrice()); ?>">
                            <input type="hidden" name="destination_id"
                                   value="<?php echo $_SESSION['destination_id']; ?>">

                            <div class="submit-button2"><input type="submit" name="book_submit" value="Book Here">
                            </div>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php elseif ($error_message): ?>
<div class="error-section">
    <p><?php echo $error_message; ?></p>
</div>
<?php endif; ?>
    <h1 class="gal">Some Destinations We Offer</h1>
    <div class="slideshow-container">
        <!-- Slideshow functionality adapted from examples provided by W3Schools -->
        <div class="mySlides fade">
            <div class="numbertext">1 / 9</div>
            <img src="destinations/London.jpeg" style="width:100%">
            <div class="text">London, UK</div>
        </div>
        <div class="mySlides fade">
            <div class="numbertext">2 / 9</div>
            <img src="destinations/Albufeira.jpeg" style="width:100%">
            <div class="text">Albufeira, Portugal</div>
        </div>
        <div class="mySlides fade">
            <div class="numbertext">3 / 9</div>
            <img src="destinations/Tokyo.jpeg" style="width:100%">
            <div class="text">Tokyo, Japan</div>
        </div>
        <div class="mySlides fade">
            <div class="numbertext">4 / 9</div>
            <img src="destinations/Barcelona.jpeg" style="width:100%">
            <div class="text">Barcelona, Spain</div>
        </div>
        <div class="mySlides fade">
            <div class="numbertext">5 / 9</div>
            <img src="destinations/LA.jpeg" style="width:100%">
            <div class="text">Los Angeles, USA</div>
        </div>
        <div class="mySlides fade">
            <div class="numbertext">6 / 9</div>
            <img src="destinations/NewYork.jpeg" style="width:100%">
            <div class="text">New York, USA</div>
        </div>
        <div class="mySlides fade">
            <div the "numbertext">7 / 9</div>
        <img src="destinations/Split.jpeg" style="width:100%">
        <div class="text">Split, Croatia</div>
    </div>
    <div class="mySlides fade">
        <div class="numbertext">8 / 9</div>
        <img src="destinations/Whistler.jpeg" style="width:100%">
        <div class="text">Whistler, Canada</div>
    </div>
    <div class="mySlides fade">
        <div the "numbertext">9 / 9</div>
<img src="destinations/rio.jpeg" style="width:100%">
    <div class="text">Rio de Janeiro, Brazil</div>
    </div>
    <a class="prev" onclick="plusSlides(-1)">❮</a>
    <a class="next" onclick="plusSlides(1)">❯</a>
    </div>

<br>

<div style="text-align:center">
    <?php for ($i = 1; $i <= 9; $i++) { ?>
        <span class="dot" onclick="currentSlide(<?php echo $i; ?>)"></span>
    <?php } ?>
</div>
<!-- Slideshow functionality adapted from examples provided by W3Schools -->
<script>
    let slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        let dots = document.getElementsByClassName("dot");
        if (n > slides.length) {slideIndex = 1}
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " active";
    }
</script>
</body>
<?php
require "templates/footer.php";
?>