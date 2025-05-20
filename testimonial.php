<?php
session_start();
include 'db.php';

$result = $conn->query("SELECT * FROM testimonials WHERE status = 'reviewed' ORDER BY id DESC");
$testimonials = [];

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $testimonials[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="testimonials.css">
    <link rel="icon" href="assets/favicon.jpg" type="image/png" sizes="16x16">
    <link href="https://fonts.googleapis.com/css2?family=Baskervville:ital@0;1&family=Great+Vibes&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Baskervville:ital@0;1&family=Great+Vibes&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Baskervville:ital@0;1&family=Great+Vibes&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
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
                <li><a href="accommodation.php">Accommodation</a></li>
                <li><a href="gallery.php">Gallery</a></li>
                <li><a href="contact.php">Contact Us</a></li>
                <li><a href="specialoffer.php">Special Offers</a></li>
                <li><a href="testimonials.php" class="active">Testimonials</a></li>
            </ul>
            <a href="contact.php#reservation-form" class="book-now-btn">BOOK NOW!</a>
        </nav>
    </header>
    
   <section class="testimonials-section">
        <h2 class="section-title">Guest Stories</h2>
        <p class="testimonial-description">Read what our guests have to say about their experience at Wish by Lilah S.</p>

        <div class="testimonial-slider" id="testimonialSlider">
            <div class="testimonial-track" id="testimonialTrack">
                <?php if (empty($testimonials)): ?>
                    <div class="testimonial-card">
                        <h4>No Testimonials Yet</h4>
                        <p>Be the first to share your experience with us!</p>
                    </div>
                <?php else: ?>
                    <?php foreach ($testimonials as $testimonial): ?>
                        <div class="testimonial-card">
                            <div class="testimonial-author">
                                <h4><?= htmlspecialchars($testimonial['name']) ?></h4>
                            </div>
                            <p class="testimonial-text"><?= htmlspecialchars($testimonial['message']) ?></p>
                            <div class="stars"><?= str_repeat('<span>★</span>', $testimonial['rating']) ?></div>
                            <?php if (!empty($testimonial['image'])): ?>
                                <div class="testimonial-image">
                                    <img src="<?= htmlspecialchars($testimonial['image']) ?>" alt="Guest Photo">
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

            <?php if (count($testimonials) > 2): ?>
                <div class="testimonial-navigation">
                    <span class="prev">&#10094;</span>
                    <span class="next">&#10095;</span>
                </div>
            <?php endif; ?>
        </div>

        <div class="leave-review">
            <p>Share your stories and experiences with us.</p>
            <a href="testimonialform.php" class="leave-review-btn">LEAVE A REVIEW HERE</a>
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
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const track = document.getElementById("testimonialTrack");
        const prevBtn = document.querySelector(".prev");
        const nextBtn = document.querySelector(".next");
        const cards = document.querySelectorAll(".testimonial-card");
        const container = document.querySelector(".testimonial-slider");
        
        let index = 0;
        let slidesToShow = window.innerWidth >= 768 ? 2 : 1;
        const cardWidth = cards[0].offsetWidth + 20; // including margin
        
        function updateSlider() {
            const maxIndex = Math.max(cards.length - slidesToShow, 0);
            index = Math.min(index, maxIndex);
            
            const offset = index * cardWidth;
            track.style.transform = `translateX(-${offset}px)`;
            
            // Disable buttons at boundaries
            if (prevBtn) prevBtn.disabled = index === 0;
            if (nextBtn) nextBtn.disabled = index >= maxIndex;
        }
        
        function nextSlide() {
            const maxIndex = Math.max(cards.length - slidesToShow, 0);
            if (index < maxIndex) {
                index++;
            } else {
                index = 0;
            }
            updateSlider();
        }
        
        function prevSlide() {
            if (index > 0) {
                index--;
            } else {
                const maxIndex = Math.max(cards.length - slidesToShow, 0);
                index = maxIndex;
            }
            updateSlider();
        }
        
        function handleResize() {
            slidesToShow = window.innerWidth >= 768 ? 2 : 1;
            updateSlider();
        }
        
        // Event listeners
        if (nextBtn) nextBtn.addEventListener("click", nextSlide);
        if (prevBtn) prevBtn.addEventListener("click", prevSlide);
        
        window.addEventListener('resize', handleResize);
        
        // Initialize
        updateSlider();
        
        // Auto Slide (only if there's more than one slide)
        if (cards.length > slidesToShow) {
            let interval = setInterval(nextSlide, 5000);
            
            // Pause on hover
            container.addEventListener('mouseenter', () => clearInterval(interval));
            container.addEventListener('mouseleave', () => {
                interval = setInterval(nextSlide, 5000);
            });
        }
    });
</script>
</body>
</html>