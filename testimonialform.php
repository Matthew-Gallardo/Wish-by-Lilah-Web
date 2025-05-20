<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="assets/favconn.png" type="image/png" sizes="16x16">
    <link href="https://fonts.googleapis.com/css2?family=Baskervville:ital@0;1&family=Great+Vibes&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Baskervville:ital@0;1&family=Great+Vibes&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Baskervville:ital@0;1&family=Great+Vibes&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Testimonial Form</title>
    <style>
        .error-message {
            color: #e74c3c;
            font-size: 14px;
            margin-top: 5px;
            font-weight: bold;
        }
        
        .code-field {
            position: relative;
        }
        
        .code-field input.error {
            border: 1px solid #e74c3c;
        }
        
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            text-align: center;
        }
        
        .alert-error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        
        /* Spinner for loading state */
        .spinner {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 3px solid rgba(255,255,255,.3);
            border-radius: 50%;
            border-top-color: #fff;
            animation: spin 1s ease-in-out infinite;
            margin-right: 10px;
            vertical-align: middle;
        }
        
        @keyframes spin {
            to { transform: rotate(360deg); }
        }
        
        .submit-btn.loading {
            position: relative;
            color: transparent;
        }
        
        .submit-btn.loading::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 20px;
            height: 20px;
            margin-top: -10px;
            margin-left: -10px;
            border: 3px solid rgba(255,255,255,.3);
            border-radius: 50%;
            border-top-color: #fff;
            animation: spin 1s ease-in-out infinite;
        }
    </style>
</head>
<body>
    <!-- Header -->
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
                <li><a href="accommodation.php">Accommodation</a></li>
                <li><a href="gallery.php">Gallery</a></li>
                <li><a href="contact.php">Contact Us</a></li>
                <li><a href="specialoffer.php">Special Offers</a></li>
                <li><a href="testimonials.php">Testimonials</a></li>
            </ul>
            <a href="contact.php#reservation-form" class="book-now-btn">BOOK NOW!</a>
        </nav>
    </header>
    
    <section id="testimonial-form-section" class="testimonial-form">
        <h2 class="section-title center">Testimonial Form</h2>
        <p class="form-subtitle"><em>The testimonial form is to be used by our customers who want to share their experience.</em></p>
        <p class="form-description">Please share your thoughts using the form below. Thank you for taking the time to complete our testimonial form. We welcome any comment that will help others to understand what our services are all about.</p>
        
        <!-- Alert message container -->
        <div id="alert-container" style="max-width: 800px; margin: 0 auto 20px;"></div>
        
        <form id="testimonialForm" class="testimonial-form-box" enctype="multipart/form-data">
            <!-- Name -->
            <div class="form-row double">
                <div>
                    <label for="firstName">Your Name</label>
                    <input type="text" id="firstName" name="firstName" placeholder="First" required>
                </div>
                <div>
                    <label for="lastName">&nbsp;</label>
                    <input type="text" id="lastName" name="lastName" placeholder="Last" required>
                </div>
            </div>
        
            <!-- Email -->
            <div class="form-row">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" placeholder="e.g. juandelacruz@gmail.com" required>
            </div>
        
            <!-- Stars and Input Code -->
            <div class="form-row double middle-align">
                <div class="star-rating">
                    <label>Rate our services</label>
                    <div class="stars-container">
                        <div class="stars-input">
                            <input type="radio" name="rating" id="star5" value="5" required>
                            <label for="star5">★</label>
                            <input type="radio" name="rating" id="star4" value="4">
                            <label for="star4">★</label>
                            <input type="radio" name="rating" id="star3" value="3">
                            <label for="star3">★</label>
                            <input type="radio" name="rating" id="star2" value="2">
                            <label for="star2">★</label>
                            <input type="radio" name="rating" id="star1" value="1">
                            <label for="star1">★</label>
                        </div>
                    </div>
                </div>
                <div class="code-field">
                    <label for="code">Input Code Here <span style="color: #e74c3c;">*</span></label>
                    <input type="text" id="code" name="code" placeholder="ex. FHD234" required>
                    <div id="code-error" class="error-message"></div>
                </div>
            </div>
        
            <!-- Testimonial -->
            <div class="form-row">
                <label for="testimonial">Testimonial</label>
                <textarea id="testimonial" name="testimonial" placeholder="Write your experience here..." required></textarea>
            </div>
        
        
            
            <!-- Submit Button -->
            <div class="form-row">
                <button type="submit" id="submit-btn" class="submit-btn">Submit Testimonial</button>
            </div>
        </form>
    </section>

    <!-- Thank You Popup -->
    <div id="thank-you-popup" class="thank-you-popup">
        <div class="popup-content">
            <div class="check-mark">
                <svg viewBox="0 0 52 52" xmlns="http://www.w3.org/2000/svg">
                    <circle class="check-circle" cx="26" cy="26" r="25" fill="none"/>
                    <path class="check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
                </svg>
            </div>
            <h2>Thank you!</h2>
            <p>Your feedback is successfully submitted.</p>
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
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('testimonialForm');
            const popup = document.getElementById('thank-you-popup');
            const submitBtn = document.getElementById('submit-btn');
            const codeInput = document.getElementById('code');
            const codeError = document.getElementById('code-error');
            const alertContainer = document.getElementById('alert-container');
            
            // Function to show alert message
            function showAlert(message, type) {
                alertContainer.innerHTML = `
                    <div class="alert alert-${type}">
                        ${message}
                    </div>
                `;
                
                // Scroll to the alert
                alertContainer.scrollIntoView({ behavior: 'smooth', block: 'center' });
                
                // Auto-hide after 5 seconds
                setTimeout(() => {
                    alertContainer.innerHTML = '';
                }, 5000);
            }
            
            // Function to validate the code
            function validateCode() {
                const code = codeInput.value.trim();
                
                if (!code) {
                    codeError.textContent = 'Code is required';
                    codeInput.classList.add('error');
                    return false;
                }
                
                codeError.textContent = '';
                codeInput.classList.remove('error');
                return true;
            }
            
            // Add blur event listener to code input
            codeInput.addEventListener('blur', validateCode);
            
            // Clear error message when typing
            codeInput.addEventListener('input', function() {
                codeError.textContent = '';
                codeInput.classList.remove('error');
            });
            
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                
                // Validate code
                if (!validateCode()) {
                    return;
                }
                
                // Show loading state
                submitBtn.classList.add('loading');
                submitBtn.disabled = true;
                
                // Create FormData object
                const formData = new FormData(form);
                
                // Send form data via AJAX
                fetch('submit_testimonial.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    // Remove loading state
                    submitBtn.classList.remove('loading');
                    submitBtn.disabled = false;
                    
                    if (data.success) {
                        // Show thank you popup
                        popup.style.display = 'flex';
                        
                        // Reset form
                        form.reset();
                        
                        // Redirect to testimonials.php after 3 seconds
                        setTimeout(function() {
                            window.location.replace('testimonial.php');
                        }, 3000);
                    } else {
                        // Show error message
                        if (data.error === 'code_used') {
                            showAlert('CODE IS ONE TIME USE ONLY', 'error');
                        } else if (data.error === 'invalid_code') {
                            showAlert('Invalid code. Please check and try again.', 'error');
                        } else {
                            showAlert(data.message || 'An error occurred. Please try again.', 'error');
                        }
                        
                        // Highlight code field if it's a code error
                        if (data.error === 'code_used' || data.error === 'invalid_code') {
                            codeInput.classList.add('error');
                        }
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    submitBtn.classList.remove('loading');
                    submitBtn.disabled = false;
                    showAlert('An error occurred. Please try again.', 'error');
                });
            });
        });
    </script>
</body>
</html>