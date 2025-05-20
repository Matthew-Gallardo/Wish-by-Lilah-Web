<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
	<link rel="icon" href="assets\favconn.png" type="image/png" sizes="16x16">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Baskervville:ital@0;1&family=Great+Vibes&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Baskervville:ital@0;1&family=Great+Vibes&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Baskervville:ital@0;1&family=Great+Vibes&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Wish by Lilah S.</title>
</head>
<body>
    <!-- Header (Navigation Bar) -->
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

    <!-- Full-screen Video -->
    <section class="video-hero">
        <video class="hero-video" autoplay muted loop>
            <source src="assets/video landing page.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
		<div class="hero-content scroll-animation">
            <h1>Welcome to</h1>
            <h2>
                <span class="alt-font">W</span><span class="space-right">ish by </span>
                <span class="alt-font">L</span><span class="space-right">ilah S.</span>
            </h2>
            <p>HOSPITALITY LIVES ON, IN THE HEART OF VALENZUELA</p>
        </div>


        <div class="hero-button scroll-animation">
            <a href="contact.php#reservation-form" class="cta-btn">BOOK NOW!</a>
        </div>
    </section>
	
	<!-- Section for the Story -->
    <section class="story-section">
        <div class="story-container scroll-animation">
		<div class="story-image">
                <img src="assets/wish story.jpg" alt="Story Image">
            </div>
			<div class="story-text">
                <h2>Discover Our Story</h2>
                <p>The story behind Wish By Lilah S. is about the owner of this event place grandchildren. </p>
                <a href="about.php" class="read-more-btn">READ MORE</a>
            </div>
        </div>
    </section>
	
<!-- Accommodations Section -->
<section class="accommodations-section">
    <h2 class="scroll-animation">Accommodations</h2>
    <div class="accommodation-container">
        <div class="accommodation-card scroll-animation delay-2">
            <div class="accommodation-image">
                <img src="assets/dama de noche.png" alt="Accommodation Image">
            </div>
            <div class="accommodation-list">
                <h3>Dama De Noche Villa</h3>
                <p>Dama De Noche features a barbecue station, a public parking lot, a dressing room, a shower area, and a private pool</p>
                <ul>
                    <li><img src="assets/bed icon.png" class="list-icon">Three connected air-conditioned rooms</li>
                    <li><img src="assets/guest icon.png" class="list-icon">25-person capacity</li>
                    <li><img src="assets/pool icon.png" class="list-icon">private 3ft to 5ft pool</li>                    
                    
                </ul>
                <a href="villa1.php" class="read-more-btn">READ MORE</a>
            </div>
        </div>
        <div class="accommodation-card scroll-animation delay-2">
            <div class="accommodation-image">
                <img src="assets/ylang-ylang.png" alt="Accommodation Image">
            </div>
            <div class="accommodation-list">
                <h3>Ylang Ylang Villa</h3>
                <p>Ylang-Ylang features a barbecue station, a public parking lot, a dressing room, a shower area, and a private pool</p>
                <ul>
                    <li><img src="assets/bed icon.png" class="list-icon">Three connected air-conditioned rooms</li>
                    <li><img src="assets/guest icon.png" class="list-icon">25-person capacity</li>
                    <li><img src="assets/pool icon.png" class="list-icon">private 3ft to 5ft pool</li>
                </ul>
                <a href="accommodation.php" class="read-more-btn">READ MORE</a>
            </div>
        </div>
    </div>
</section>

	
	 <!-- Amenities Section -->
    <section class="amenities-section">
        <h2 class="scroll-animation">Amenities</h2>
        <div class="amenities-container">
            <div class="amenities-card scroll-animation delay-3">
                <div class="amenities-image">
                    <img src="assets\FUNCTION HALL.jpg" alt="Amenities Image">
                </div>
                <div class="amenities-text">
                    <h3>Event Place</h3>
                    <p>Experience comfort and celebration in our event space, perfect for gatherings of up to 25 guests.</p>
                    <ul>
                        <li>1 Private Pool with Fountain</li>
                        <li>Karaoke</li>
                        <li>Smart TV</li>
                    </ul>
                    <a href="amenities.php" class="read-more-btn">READ MORE</a>
                </div>
            </div>
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
            <p>&copy; 2025 All Rights Reserved.</p>
        </div>
    </div>
</footer>
	<script src="script.js"></script>
</body>
</html>
