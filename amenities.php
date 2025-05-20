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
                <li><a href="testimonials.php">Testimonials</a></li>
            </ul>
            <a href="contact.php" class="book-now-btn">BOOK NOW!</a>
        </nav>
    </header>

    <!-- Hero Section with Function Hall Image Only -->
    <section class="hero-section" style="background-image: url('assets/FUNCTION HALL.jpg'); height: 90vh; background-size: cover; background-position: center;">
        <!-- No text content here, just the image as background -->
    </section>

    <!-- Amenities Section -->
    <section class="amenities-section">
        <h2 class="section-title scroll-animation">Amenities</h2>
        <p class="scroll-animation" style="max-width: 700px; margin: 0 auto 40px; text-align: center;">
            Amenities refer to the features or services provided to enhance comfort, convenience, and enjoyment in a place, such as a home, hotel, resort, or public facility. 
        </p>
        
        <div class="amenities-container">
            <!-- Amenity Card 1 -->
            <div class="amenities-card scroll-animation delay-1">
                <div class="amenities-image">
                    <img src="assets/hall.png" alt="Function Hall">
                </div>
                <div class="amenities-text">
                    <h3>Event Place</h3>
                    <p>Experience comfort and celebration in our event space, perfect for gatherings of up to 25 guests.</p>
                    <ul>
                        <li>Fully Air-Conditioned Function Hall</li>
                        <li>Tables & Chairs</li>
                        <li>Bench with 1 Small Glass Table</li>
                        <li>3 Helium Balloons (Birthday Celebrant)</li>
                        <li>1 Dressing Room</li>
                    </ul>
                </div>
            </div>
            
            <!-- Amenity Card 2 -->
            <div class="amenities-card scroll-animation delay-2">
                <div class="amenities-image">
                    <img src="assets/kitchen.png">
                </div>
                <div class="amenities-text">
                    <h3>Kitchen</h3>
                    <p>Cook and dine with ease using our kitchen setup, designed for convenience and group enjoyment.</p>
                    <ul>
                        <li>Barbecue Station with Air-Vent</li>
                        <li>2 Kitchen Sinks</li>
                        <li>Gas Stove with Kitchen Hood</li>
                        <li>Refrigerator</li>
                        <li>1 pc 20 Liters of Mineral Water</li>
                        <li>Glass Dining Table</li>
                    </ul>
                </div>
            </div>
            
            <!-- Amenity Card 3 -->
            <div class="amenities-card scroll-animation delay-3">
                <div class="amenities-image">
                    <img src="assets/parking.png">
                </div>
                <div class="amenities-text">
                    <h3>Parking</h3>
                    <p>Enjoy hassle-free arrivals with our secure and private parking area.</p>
                    <ul>
                        <li>Private Parking Lot</li>
                        <li>2-3 cars per guests (maximum of 7-8 cars - depending on the size of the cars)</li>
                        <li>Maximum of 5 to 8 Motorcycle</li>
                    </ul>
                </div>
            </div>
            
            <!-- Amenity Card 4 -->
            <div class="amenities-card scroll-animation">
                <div class="amenities-image">
                    <img src="assets/pool.png">
                </div>
                <div class="amenities-text">
                    <h3>Laundry Service</h3>
                    <p> Stay fresh during your stay with our convenient laundry service available upon request.</p>
                    <ul>
                        <li>Offers guests with an opportunity to wash and clean their clothing.</li>
                        <li>The housekeeping attendant is in charge of the laundry services.</li>
                        <li>Available only when the visitors are already staying in our villas</li>
                    </ul>
                </div>
            </div>
            
            <!-- Amenity Card 5 -->
            <div class="amenities-card scroll-animation delay-1">
                <div class="amenities-image">
                    <img src="assets/TV.png">
                </div>
                <div class="amenities-text">
                    <h3>Pamalengke Service</h3>
                    <p>Skip the market run because we have it covered with our pamalengke assistance for your cooking needs.</p>
                    <ul>
                        <li>"Pamalengke Service" is to avoid hassle for guests who travel to distant markets.</li>
                        <li>The Jeepney Market Karuhatan is a sister company of Wish by Lilah S.</li>
                        <li>Included in the services that this events place can provide, but it has a delivery fee
                            with a affordable charge.
                        </li>
                    </ul>
                </div>
            </div>
            
            <!-- Amenity Card 6 -->
            <div class="amenities-card scroll-animation delay-2">
                <div class="amenities-image">
                    <img src="assets/table.png">
                </div>
                <div class="amenities-text">
                    <h3>Car Service</h3>
                    <p>For balik-bayans who have family members who will rent at the event venue and subsequently rent at our lodge area.</p>
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
                <h3>&nbsp;</h3>
                <div>
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

    <script src="script.js"></script>
</body>
</html>