<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="assets/favconn.png" type="image/png" sizes="16x16">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Baskervville:ital@0;1&family=Great+Vibes&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Baskervville:ital@0;1&family=Great+Vibes&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Baskervville:ital@0;1&family=Great+Vibes&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    <title>Wish by Lilah S.</title>
</head>
<body>
    <!-- Header -->
    <header>
        <nav>
            <div class="logo">
                <a href="index.php">
                <img src="assets\logonav.png" alt="Logo">
                </a>
            </div>
            <ul class="nav-links">
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li class="dropdown">
                <a href="#" class="dropdown-toggle">Accommodation <i class="fa fa-angle-down"></i></a>
                    <ul class="dropdown-menu">
                    <li><a href="villa1.php">Villa 1</a></li>
                    <li><a href="accommodation.php">Villa 2</a></li>
                    </ul>
                </li>
                <li><a href="gallery.php">Gallery</a></li>
                <li><a href="contact.php">Contact Us</a></li>
                <li><a href="specialoffer.php">Special Offers</a></li>
                <li><a href="testimonial.php">Testimonials</a></li>
            </ul>
            <a href="contact.php#reservation-form" class="book-now-btn">BOOK NOW!</a>
        </nav>
    </header>
    
    <!-- Hero Section with background image -->
    <section class="hero-section accommodation-hero"></section>
    
    <!-- Accommodation Section -->
    <section class="accommodation-section">
        <h2 class="section-title">Accommodations</h2>
        <h3 class="villa-title">Ylang-Ylang - Villa 2</h3>
        
        <div class="villa-info-container">
            <!-- Left container for Villa image carousel -->
            <div class="villa-image-container">
                <div class="carousel">
                    <div class="carousel-slide">
                        <img src="assets/dama de noche room.jpg" alt="Room Image 1">
                    </div>
                    <div class="carousel-slide">
                        <img src="assets/FUNCTION HALL.jpg" alt="Room Image 2">
                    </div>
                    <div class="carousel-slide">
                        <img src="assets/accommodation.jpg" alt="Room Image 3">
                    </div>
                    <div class="carousel-slide">
                        <img src="assets/pool.png" alt="Room Image 4">
                    </div>
                </div>
                <button class="prev-btn" onclick="moveSlide(-1)">&#10094;</button>
                <button class="next-btn" onclick="moveSlide(1)">&#10095;</button>
            </div>
            
            <!-- Right container (Price and Booking) -->
            <div class="villa-booking-container">
                <!-- Price Container -->
                <div class="price-container">
                    <div class="price-value-container">
                        <p class="price-value">P10,000.00</p>
                        <p class="price-note">Per Day</p>
                    </div>
                    <p class="price-note ampersand">&amp;</p>
                    <div class="price-value-container">
                        <p class="price-value">P14,000.00</p>
                        <p class="price-note">Per Night</p>
                    </div>
                </div>
                <a href="contact.php#reservation-form" class="book-now-block">BOOK NOW</a>
            </div>
        </div>

        <div class="villa-info-labels">
            <div class="left-label">
                <h4 class="room-description-title">Room Description</h4>
            </div>
        </div>

        <div class="villa-description">
             <p>Ylang-Ylang features a 25-person capacity air-conditioned function hall with tables and chairs, 
                three fully air-conditioned connected rooms, a barbecue station, a public parking lot, a dressing room, a shower area, and a private pool. 
                The pool is between three and five feet in depth, and the kitchen is equipped with a refrigerator, a stove with an air vent, and LPG.</p>
        </div>

        <!-- Room Features -->
        <div class="villa-features">
            <ul class="left-features">
                <li>Double deck style - double bed each deck</li>
                <li>13 beds per villa - good for 25 pax per villa</li>
                <li>Maximum capacity per villa - 30 pax = 24,000 standard rate (22 hrs stay)</li>
                <li>Total maximum capacity of all villas is 60 pax = 24,000 x 2 villas = 48,000 good for 50 pax</li>
            </ul>
            <ul class="right-features">
                <li>Fully Air-Conditioned Connected Rooms (Good for 25 Pax)</li>
                <li>Smart TV</li>
                <li>3 Comfort Rooms</li>
                <li>Fresh White Linens</li>
            </ul>    
        </div>

        <!-- View Amenities Button -->
        <div class="amenities-button-container">
            <a href="amenities.php" class="view-amenities-btn">View Amenities</a>
        </div>
    </section>

   <!-- Footer Section -->
<footer class="footer">
    <div class="footer-container">
        <div class="footer-left">
            <div class="logo">
                <img src="assets/logonav.png" alt="Wish by Lilah S." class="footer-logo-img">
                <p>Your Home Away from Home</p>
            </div>
            <div class="social-icons">
                <a href="https://www.facebook.com/profile.php?id=61561630912727" class="icon"><i class="fab fa-facebook-f"></i></a>
                <a href="https://www.instagram.com/its_casajuana?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" class="icon"><i class="fab fa-instagram"></i></a>
                <a href="https://x.com/CasaJuanaVal" class="icon"><i class="fab fa-twitter"></i></a>
            </div>
        </div>
        <div class="footer-middle">
            <div>
                <h3>Navigation</h3>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="villa1.php">Accommodation</a></li>
                    <li><a href="gallery.php">Gallery</a></li>
                    
                </ul>
            </div>
            <div>
                <h3>&nbsp;</h3> <!-- Empty heading for alignment -->
                <ul>
				    <li><a href="contact.php">Contact Us</a></li>
                    <li><a href="specialoffer.php">Special Offers</a></li>
                    <li><a href="testimonial.php">Testimonials</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-right">
            <h3>Contact Details</h3>
            <p>Address: 3000 San Felipe St., Karuhatan, Valenzuela City, Philippines</p>
            <p>Smart: +63 962-820597</p>
            <p>Tel. no: (02) 8553-3992</p>
            <h3>&nbsp;</h3>
            <p>&copy; 2025 All Rights Reserved.</p>
        </div>
    </div>
</footer>
    <script src="script.js" defer></script>
</body>
</html>
