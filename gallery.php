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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Gallery - Wish by Lilah S.</title>
</head>
<body>
    <!-- Header (Navigation Bar) with scrolled class added by default -->
    <header class="scrolled">
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

    <!-- Gallery Section -->
    <section class="gallery-section">
        <h2>Gallery</h2>

        <!-- Video Section -->
        <div class="video-section">
            <div class="video-container">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/JZSp-fEV3a0?si=qt-gY3Z04M5b2Hxo" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
        </div>
        
        <!-- Line after the video section -->
        <hr class="gallery-line">
        
        <!-- Section Label -->
        <h3 class="section-label">Images</h3>
        
        <!-- Image Grid Section -->
        <div class="image-grid">
            <div class="image-item" onclick="openModal(this)">
                <img src="assets/parking.png" alt="Function Hall">
            </div>
            <div class="image-item" onclick="openModal(this)">
                <img src="assets/ENTRANCE.jpg" alt="Function Hall">
            </div>
            <div class="image-item" onclick="openModal(this)">
                <img src="assets/pool.png" alt="Function Hall">
            </div>
            <div class="image-item" onclick="openModal(this)">
                <img src="assets/customer 3.jpg" alt="Function Hall">
            </div>
            <div class="image-item" onclick="openModal(this)">
                <img src="assets/kitchen with bbq station.png" alt="Function Hall">
            </div>
            <div class="image-item" onclick="openModal(this)">
                <img src="assets/hall.png" alt="Function Hall">
            </div>
            <div class="image-item" onclick="openModal(this)">
                <img src="assets/customer 1.jpg" alt="Function Hall">
            </div>
            <div class="image-item" onclick="openModal(this)">
                <img src="assets/TV.png" alt="Function Hall">
            </div>
            <div class="image-item" onclick="openModal(this)">
                <img src="assets/customer 2.jpg" alt="Function Hall">
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div id="imageModal" class="modal">
        <div class="modal-content">
            <span class="close-btn" onclick="closeModal()">×</span>
            <img id="modal-image" src="/placeholder.svg" alt="Modal Image">
        </div>
    </div>

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
                    <li><a href="#">Accommodation</a></li>
                    <li><a href="gallery.php">Gallery</a></li>
                    
                </ul>
            </div>
            <div>
                <h3>&nbsp;</h3> <!-- Empty heading for alignment -->
                <ul>
				    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">Special Offers</a></li>
                    <li><a href="#">Testimonials</a></li>
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
    <script src="script.js"></script>
</body>
</html>
