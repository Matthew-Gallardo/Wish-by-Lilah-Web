// Modal functionality
function openModal(element) {
  const modal = document.getElementById("imageModal")
  const modalImg = document.getElementById("modal-image")

  // Set the image source
  modalImg.src = element.querySelector("img").src
  modalImg.alt = element.querySelector("img").alt

  // Show the modal
  modal.classList.add("show")

  // Prevent scrolling on the body
  document.body.classList.add("modal-open")

  // Store the current scroll position
  document.body.dataset.scrollY = window.scrollY

  // Add event listener to close when clicking outside
  modal.addEventListener("click", (e) => {
    if (e.target === modal) {
      closeModal()
    }
  })

  // Add escape key listener
  document.addEventListener("keydown", (e) => {
    if (e.key === "Escape") {
      closeModal()
    }
  })

  console.log("Modal opened")
}

function closeModal() {
  const modal = document.getElementById("imageModal")

  // Hide the modal
  modal.classList.remove("show")

  // Re-enable scrolling
  document.body.classList.remove("modal-open")

  // Restore scroll position
  const scrollY = Number.parseInt(document.body.dataset.scrollY || "0")
  window.scrollTo(0, scrollY)

  console.log("Modal closed")
}

// Add event listeners when the DOM is loaded
document.addEventListener("DOMContentLoaded", () => {
  console.log("DOM fully loaded")

  // Check if we're on the gallery page
  const isGalleryPage = document.querySelector(".gallery-section") !== null

  // Apply the scrolled class immediately if we're on the gallery page
  const header = document.querySelector("header")
  if (header && isGalleryPage) {
    // Add scrolled class immediately for gallery page
    header.classList.add("scrolled")

    // No need for scroll event on gallery page since we want it always colored
    console.log("Gallery page detected - navbar set to solid color")
  } else if (header) {
    // For other pages, keep the transparent to solid effect on scroll
    // Function to update header background based on scroll position
    function updateHeaderBackground() {
      if (window.scrollY > 50) {
        header.classList.add("scrolled")
      } else {
        header.classList.remove("scrolled")
      }
    }

    // Initial call to set the correct state on page load
    updateHeaderBackground()

    // Add scroll event listener
    window.addEventListener("scroll", updateHeaderBackground)
    console.log("Regular page - navbar transparency effect active")
  }

  // Test if we can find the modal
  const modal = document.getElementById("imageModal")
  if (modal) {
    console.log("Modal element found")
  } else {
    console.error("Modal element not found!")
  }

  // Test if we can find the gallery items
  const galleryItems = document.querySelectorAll(".image-item")
  console.log(`Found ${galleryItems.length} gallery items`)

  // Add click event listeners to all gallery images
  galleryItems.forEach((item, index) => {
    console.log(`Adding click listener to gallery item ${index + 1}`)
    item.addEventListener("click", function () {
      console.log(`Gallery item ${index + 1} clicked`)
      openModal(this)
    })
  })

  // Add scroll animation to gallery images
  galleryItems.forEach((item) => {
    item.classList.add("scroll-animation")
  })

  // Initialize testimonial slider if it exists
  initTestimonialSlider()

  // Add mobile menu toggle functionality
  const mobileMenuToggle = document.createElement("div")
  mobileMenuToggle.className = "mobile-menu-toggle"
  mobileMenuToggle.innerHTML = '<i class="fas fa-bars"></i>'

  const nav = document.querySelector("nav")
  if (nav) {
    nav.appendChild(mobileMenuToggle)

    mobileMenuToggle.addEventListener("click", () => {
      const navLinks = document.querySelector(".nav-links")
      navLinks.classList.toggle("active")

      // Change icon based on menu state
      if (navLinks.classList.contains("active")) {
        mobileMenuToggle.innerHTML = '<i class="fas fa-times"></i>'
      } else {
        mobileMenuToggle.innerHTML = '<i class="fas fa-bars"></i>'
      }
    })
  }

  // Add scroll animation to elements
  const animatedElements = document.querySelectorAll(
    ".contact-details, .map-container, .reservation-form, .section-title",
  )
  animatedElements.forEach((el) => {
    el.classList.add("scroll-animation")
  })

  // Form validation for reservation form
  const reservationForm = document.querySelector(".reservation-form")
  if (reservationForm) {
    // Add focus effects to form inputs
    const formInputs = reservationForm.querySelectorAll("input, select, textarea")
    formInputs.forEach((input) => {
      input.addEventListener("focus", function () {
        this.parentElement.classList.add("focused")
      })

      input.addEventListener("blur", function () {
        this.parentElement.classList.remove("focused")
      })
    })

    // Form validation
    reservationForm.addEventListener("submit", (e) => {
      let isValid = true

      // Basic validation for required fields
      const requiredFields = reservationForm.querySelectorAll("[required]")
      requiredFields.forEach((field) => {
        if (!field.value.trim()) {
          isValid = false
          field.classList.add("error")
        } else {
          field.classList.remove("error")
        }
      })

      // Email validation
      const emailField = reservationForm.querySelector("#email")
      if (emailField && emailField.value) {
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/
        if (!emailPattern.test(emailField.value)) {
          isValid = false
          emailField.classList.add("error")

          // Show error message
          let errorMsg = document.getElementById("email-error")
          if (!errorMsg) {
            errorMsg = document.createElement("div")
            errorMsg.id = "email-error"
            errorMsg.className = "error-message"
            errorMsg.textContent = "Please enter a valid email address"
            emailField.parentNode.appendChild(errorMsg)
          }
        } else {
          emailField.classList.remove("error")
          const errorMsg = document.getElementById("email-error")
          if (errorMsg) errorMsg.remove()
        }
      }

      // If form is not valid, prevent submission
      if (!isValid) {
        e.preventDefault()

        // Show general error message
        const alertContainer = document.getElementById("alertContainer")
        if (alertContainer) {
          const alertDiv = document.createElement("div")
          alertDiv.className = "alert alert-error"
          alertDiv.textContent = "Please fill in all required fields correctly."
          alertContainer.appendChild(alertDiv)

          // Auto-hide the alert after 5 seconds
          setTimeout(() => {
            alertDiv.style.opacity = "0"
            setTimeout(() => {
              alertContainer.removeChild(alertDiv)
            }, 500)
          }, 5000)
        }
      }
    })
  }

  // Display alert messages based on URL parameters
  const urlParams = new URLSearchParams(window.location.search)
  const status = urlParams.get("status")
  const message = urlParams.get("message")

  if (status && message) {
    const alertContainer = document.getElementById("alertContainer")
    if (alertContainer) {
      const alertDiv = document.createElement("div")

      alertDiv.className = status === "success" ? "alert alert-success" : "alert alert-error"
      alertDiv.textContent = message

      alertContainer.appendChild(alertDiv)

      // Auto-hide the alert after 5 seconds
      setTimeout(() => {
        alertDiv.style.opacity = "0"
        setTimeout(() => {
          alertContainer.removeChild(alertDiv)
        }, 500)
      }, 5000)
    }
  }

  // Testimonial form handling
  // Get all star rating inputs
  const starInputs = document.querySelectorAll(".stars-input input")

  // Add click event listeners to each star
  starInputs.forEach((input) => {
    input.addEventListener("click", function () {
      // This will handle the selection state
      // The CSS will take care of the visual feedback
      console.log(`Selected rating: ${this.value}`)
    })
  })

  // Get the thank you popup
  const thankYouPopup = document.getElementById("thank-you-popup")

  // Form submission handling
  const testimonialForm = document.querySelector(".testimonial-form-box")
  if (testimonialForm) {
    testimonialForm.addEventListener("submit", (e) => {
      e.preventDefault()

      // Get the selected rating
      const selectedRating = document.querySelector(".stars-input input:checked")
      const rating = selectedRating ? selectedRating.value : null

      if (!rating) {
        alert("Please rate our services before submitting.")
        return
      }

      // Show the thank you popup
      if (thankYouPopup) {
        thankYouPopup.classList.add("show")

        // Set a timeout to redirect after 5 seconds
        setTimeout(() => {
          // Hide the popup with a fade-out effect
          thankYouPopup.classList.remove("show")

          // Wait for the fade-out animation to complete before redirecting
          setTimeout(() => {
            window.location.href = "testimonials.php"
          }, 300) // This should match the transition time in CSS
        }, 5000)
      }
    })
  }

  // View amenities toggle
  const viewAmenitiesBtn = document.querySelector(".view-amenities-btn")
  if (viewAmenitiesBtn) {
    viewAmenitiesBtn.addEventListener("click", () => {
      const amenitiesSection = document.getElementById("amenities-section")
      if (amenitiesSection) {
        // Toggle visibility of amenities section
        if (amenitiesSection.style.display === "none" || amenitiesSection.style.display === "") {
          amenitiesSection.style.display = "block"
        } else {
          amenitiesSection.style.display = "none"
        }
      }
    })
  }

  // Implement smooth scrolling
  document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
    anchor.addEventListener("click", function (e) {
      e.preventDefault()

      const targetId = this.getAttribute("href")
      if (targetId === "#") return

      const targetElement = document.querySelector(targetId)
      if (targetElement) {
        window.scrollTo({
          top: targetElement.offsetTop - 100,
          behavior: "smooth",
        })
      }
    })
  })
})

// Carousel functionality
let slideIndex = 0
const slides = document.querySelectorAll(".carousel-slide")

// Initialize the carousel
function initCarousel() {
  if (slides.length === 0) return

  // Set initial styles for smooth transitions
  slides.forEach((slide) => {
    slide.style.transition = "opacity 0.5s ease-in-out"
    slide.style.opacity = "0"
    slide.style.display = "none"
  })

  // Show the first slide
  slides[0].style.display = "block"
  setTimeout(() => {
    slides[0].style.opacity = "1"
  }, 10)

  // Add event listeners to buttons if they exist
  const prevBtn = document.querySelector(".prev-btn")
  const nextBtn = document.querySelector(".next-btn")

  if (prevBtn) prevBtn.addEventListener("click", () => moveSlide(-1))
  if (nextBtn) nextBtn.addEventListener("click", () => moveSlide(1))
}

// Function to move to next/previous slide
function moveSlide(n) {
  const slides = document.querySelectorAll(".carousel-slide")
  if (slides.length === 0) return

  // Find the currently visible slide
  let currentIndex = 0
  slides.forEach((slide, index) => {
    if (slide.style.display === "block" || getComputedStyle(slide).display === "block") {
      currentIndex = index
    }
  })

  // Calculate new index
  let newIndex = currentIndex + n
  if (newIndex >= slides.length) {
    newIndex = 0
  } else if (newIndex < 0) {
    newIndex = slides.length - 1
  }

  // Add transition styles if not already present
  slides.forEach((slide) => {
    if (!slide.style.transition) {
      slide.style.transition = "opacity 0.5s ease-in-out"
    }
  })

  // Fade out current slide
  slides[currentIndex].style.opacity = "0"

  // Wait for fade out to complete, then switch slides
  setTimeout(() => {
    // Hide current slide
    slides[currentIndex].style.display = "none"

    // Show new slide but with opacity 0
    slides[newIndex].style.display = "block"
    slides[newIndex].style.opacity = "0"

    // Force browser to process the display change before fading in
    setTimeout(() => {
      // Fade in new slide
      slides[newIndex].style.opacity = "1"
    }, 10)
  }, 500) // This matches the transition duration
}

// Function to show a specific slide
function showSlide(n) {
  if (slides.length === 0) return

  // Hide current slide with fade out
  slides[slideIndex].style.opacity = "0"

  // Calculate the new slide index
  slideIndex = n
  if (slideIndex >= slides.length) slideIndex = 0
  if (slideIndex < 0) slideIndex = slides.length - 1

  // Wait for fade out to complete before showing new slide
  setTimeout(() => {
    slides.forEach((slide, index) => {
      slide.style.display = "none"
    })

    // Show the new slide and fade it in
    slides[slideIndex].style.display = "block"
    setTimeout(() => {
      slides[slideIndex].style.opacity = "1"
    }, 10)
  }, 500) // This matches the transition duration
}

// Auto-advance slides every 5 seconds
function autoAdvance() {
  moveSlide(1)
}

// Initialize carousel slides with proper styles when page loads
document.addEventListener("DOMContentLoaded", () => {
  const slides = document.querySelectorAll(".carousel-slide")

  // Set initial styles for all slides
  slides.forEach((slide, index) => {
    slide.style.transition = "opacity 0.5s ease-in-out"

    // Hide all slides except the first one
    if (index === 0) {
      slide.style.display = "block"
      slide.style.opacity = "1"
    } else {
      slide.style.display = "none"
      slide.style.opacity = "0"
    }
  })

  // Set up auto-advance timer
  setInterval(autoAdvance, 5000)
})


// Initialize testimonial slider
function initTestimonialSlider() {
  console.log("Initializing testimonial slider")
  // Check if we're on the testimonials page
  const testimonialSlider = document.querySelector(".testimonial-slider")
  if (!testimonialSlider) {
    console.log("No testimonial slider found")
    return
  }

  // Get all testimonial slides
  const testimonialSlides = document.querySelectorAll(".testimonial-slide")
  if (testimonialSlides.length === 0) {
    console.log("No testimonial slides found")
    return
  }

  // Hide all slides except the first one
  testimonialSlides.forEach((slide, index) => {
    if (index === 0) {
      slide.style.display = "flex"
      slide.style.opacity = "1"
      slide.style.visibility = "visible"
    } else {
      slide.style.display = "none"
      slide.style.opacity = "0"
      slide.style.visibility = "hidden"
    }
  })

  // Add click events to navigation buttons
  const prevButton = document.querySelector(".testimonial-navigation .prev")
  const nextButton = document.querySelector(".testimonial-navigation .next")

  if (prevButton) {
    prevButton.addEventListener("click", () => {
      moveTestimonial(-1)
    })
  }

  if (nextButton) {
    nextButton.addEventListener("click", () => {
      moveTestimonial(1)
    })
  }

  console.log("Testimonial slider initialized with", testimonialSlides.length, "slides")
}

// Function to move testimonial slider
function moveTestimonial(direction) {
  const testimonialSlides = document.querySelectorAll(".testimonial-slide")

  if (testimonialSlides.length <= 1) return

  // Find the currently visible slide
  let currentIndex = 0
  testimonialSlides.forEach((slide, index) => {
    if (slide.style.opacity === "1" || getComputedStyle(slide).opacity === "1") {
      currentIndex = index
    }
  })

  // Hide current slide (fade out)
  testimonialSlides[currentIndex].style.opacity = "0"
  testimonialSlides[currentIndex].style.visibility = "hidden"

  // Calculate new index
  let newIndex = currentIndex + direction
  if (newIndex >= testimonialSlides.length) {
    newIndex = 0
  } else if (newIndex < 0) {
    newIndex = testimonialSlides.length - 1
  }

  // Show new slide (fade in)
  testimonialSlides[newIndex].style.opacity = "1"
  testimonialSlides[newIndex].style.visibility = "visible"

  console.log(`Moved to testimonial slide ${newIndex + 1} of ${testimonialSlides.length}`)
}

// Scroll animations
window.addEventListener("load", () => {
  // Check if IntersectionObserver is supported
  if ("IntersectionObserver" in window) {
    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          // Add 'show' class when element is in view
          if (entry.isIntersecting) {
            entry.target.classList.add("show")
          }
        })
      },
      {
        threshold: 0.15,
        rootMargin: "0px 0px -50px 0px",
      },
    )

    // Get all elements with the scroll-animation class
    const animatedElements = document.querySelectorAll(".scroll-animation")

    // Start observing each element
    animatedElements.forEach((el) => {
      observer.observe(el)
    })

    console.log("Scroll animation initialized with", animatedElements.length, "elements")
  } else {
    // Fallback for browsers that don't support IntersectionObserver
    const animatedElements = document.querySelectorAll(".scroll-animation")
    animatedElements.forEach((el) => {
      el.classList.add("show")
    })
    console.log("IntersectionObserver not supported - showing all elements")
  }
});

// Enhanced dropdown functionality for click-based interaction
document.addEventListener('DOMContentLoaded', function() {
    // Handle dropdown menus
    const dropdowns = document.querySelectorAll('.dropdown');
    
    // Close all dropdowns when clicking outside
    document.addEventListener('click', function(event) {
        if (!event.target.closest('.dropdown')) {
            dropdowns.forEach(dropdown => {
                dropdown.classList.remove('active');
            });
        }
    });
    
    // Toggle dropdown on click
    dropdowns.forEach(dropdown => {
        const dropdownToggle = dropdown.querySelector('.dropdown-toggle');
        
        dropdownToggle.addEventListener('click', function(e) {
            // Always prevent default navigation for dropdown toggles
            e.preventDefault();
            
            // Close all other dropdowns
            dropdowns.forEach(otherDropdown => {
                if (otherDropdown !== dropdown) {
                    otherDropdown.classList.remove('active');
                }
            });
            
            // Toggle current dropdown
            dropdown.classList.toggle('active');
            
            // Stop propagation to prevent document click handler from immediately closing it
            e.stopPropagation();
        });
    });
    
    // Allow clicking on dropdown menu items without closing the dropdown
    const dropdownMenus = document.querySelectorAll('.dropdown-menu');
    dropdownMenus.forEach(menu => {
        menu.addEventListener('click', function(e) {
            // Only stop propagation if clicking on the menu itself, not its links
            if (e.target === menu) {
                e.stopPropagation();
            }
        });
    });
});

document.addEventListener('DOMContentLoaded', () => {
  // Get the current page's filename (e.g., 'index.php')
  const currentPage = window.location.pathname.split('/').pop() || 'index.php';

  // Select all nav links
  const navLinks = document.querySelectorAll('.nav-links a');

  // Loop through nav links to set active state
  navLinks.forEach(link => {
    const href = link.getAttribute('href');
    // Check if the link's href matches the current page
    if (href === currentPage) {
      link.classList.add('active');
    }
  });

  // Handle dropdown accommodation links
  const dropdownLinks = document.querySelectorAll('.dropdown-menu a');
  dropdownLinks.forEach(link => {
    const href = link.getAttribute('href');
    if (href === currentPage) {
      // Add active class to the parent dropdown toggle
      const parentDropdown = link.closest('.dropdown').querySelector('.dropdown-toggle');
      parentDropdown.classList.add('active');
    }
  });
});