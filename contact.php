<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="assets/favicon.jpg" type="image/png" sizes="16x16">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Baskervville:ital@0;1&family=Great+Vibes&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Baskervville:ital@0;1&family=Great+Vibes&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Baskervville:ital@0;1&family=Great+Vibes&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    <!-- Add Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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

    <!-- Contact Us Section -->
    <section class="contact-section">
        <!-- Fixed hero image container -->
        <div class="contact-header">
            <img src="assets/wish story.jpg">
        </div>
        
        <h2 class="section-title">Get In Touch</h2>

        <div class="contact-info">
            <div class="contact-details">
                <h3>Contact Information</h3>
                <p><i class="fas fa-map-marker-alt"></i> 3000 San Felipe St., Karuhatan, Valenzuela City, Philippines</p>
                <p><i class="fas fa-phone"></i> (02) 8553-3992</p>
                <p><i class="fas fa-envelope"></i> <a href="mailto:casajuanavalenzuela@gmail.com">casajuanavalenzuela@gmail.com</a></p>
                <p><i class="fas fa-clock"></i> Business Hours: 8:00 AM - 5:00 PM</p>
            </div>

            <div class="map-container">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387190.27990502657!2d-74.259866!3d40.6976701!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a247e5d9f49%3A0xf0ef0fc14bcaed7b!2s3000%20San%20Felipe%20St.%20Karuhatan!5e0!3m2!1sen!2sph!4v1680887424501!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </section>

    <!--reservation form-->
    <section class="reservation-section" id="reservation-form">
        <h2 class="section-title">Reservation Form</h2>
        <p>Plan your perfect getaway or event with ease – fill out the form below to get started.</p>
        
        <!-- Alert messages -->
        <div id="alertContainer"></div>
        
        <form action="submit_reservation.php" method="POST" class="reservation-form">
            <div class="form-row">
                <div class="form-group">
                    <label for="first-name">Your Name</label>
                    <input type="text" id="first-name" name="first-name" placeholder="First Name" required>
                </div>
                <div class="form-group">
                    <input type="text" id="last-name" name="last-name" placeholder="Last Name" required>
                </div>
            </div>

            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" placeholder="yourname@example.com" required>
            </div>

            <div class="form-group">
                <label for="villa">Select a Villa</label>
                <select id="villa" name="villa" required>
                    <option value="">Select Villa</option>
                    <option value="villa-1">Villa 1</option>
                    <option value="villa-2">Villa 2</option>
                </select>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="event-type">Type of Event</label>
                    <select id="event-type" name="event-type" required>
                        <option value="">Select Event Type</option>
                        <option value="wedding">Wedding</option>
                        <option value="birthday">Birthday</option>
                        <option value="business">Business Event</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="event-date">Event Date</label>
                    <input type="date" id="event-date" name="event-date" required>
                </div>
            </div>

            <div class="form-group">
                <label for="guests">Number of Expected Guests</label>
                <input type="number" id="guests" name="guests" required>
            </div>

            <div class="form-group">
                <label for="preferred-time">Your Preferred Time</label>
                <input type="time" id="preferred-time" name="preferred-time" required>
            </div>

            <div class="form-group">
                <label for="other-details">Other Details</label>
                <textarea id="other-details" name="other-details" placeholder="Any other details or requests" rows="4"></textarea>
            </div>

            <button type="submit" class="submit-btn">Submit</button>
        </form>
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
    <script src="script.js"></script>
</body>
</html>