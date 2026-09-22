<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AutoRent | Pages</title>
    <link rel="stylesheet" href="{{ asset('frontend/style.css') }}">
</head>

<body>
    <header class="navbar">
        <div class="logo">AutoRent</div>

        <button class="menu-btn" id="menuBtn" aria-label="Menu">☰</button>

        <nav class="nav-links" id="navLinks">
            <a href="{{ url('/') }}">Home</a>
            <a href="#about" class="active">About</a>
            <a href="#contact">Contact</a>
            <a href="#faq">FAQ</a>
            <a href="#not-found">404</a>
            <a href="#" id="myBookingsLink">My Bookings</a>
        </nav>

        <div class="user-area">
            <span class="user-name" id="userName" hidden></span>
            <button class="login-btn" id="loginBtn">Login</button>
        </div>
    </header>

    <div class="page-shell">
        <nav class="page-nav" aria-label="Page navigation">
            <a href="#about" class="active">About Us</a>
            <a href="#contact">Contact Us</a>
            <a href="#faq">FAQ</a>
            <a href="#not-found">404</a>
        </nav>

        <!-- Future Blade View: resources/views/about.blade.php -->
        <section class="page-section active" id="about">
            <div class="page-hero">
                <h1>About AutoRent</h1>
                <p>AutoRent helps travelers and locals book the perfect car in minutes with clear prices, flexible options, and a smooth rental experience from pickup to return.</p>
            </div>

            <div class="page-card">
                <div class="features-grid">
                    <article class="feature-card">
                        <div class="feature-icon">⚡</div>
                        <h3>Easy Booking</h3>
                        <p>Search, choose, and confirm your vehicle quickly with a simple step-by-step process.</p>
                    </article>

                    <article class="feature-card">
                        <div class="feature-icon">🚘</div>
                        <h3>Wide Selection</h3>
                        <p>From compact city cars to premium SUVs and luxury models, we cover every trip style.</p>
                    </article>

                    <article class="feature-card">
                        <div class="feature-icon">💳</div>
                        <h3>Transparent Pricing</h3>
                        <p>No hidden fees and no confusing rates—just clear total pricing before you book.</p>
                    </article>

                    <article class="feature-card">
                        <div class="feature-icon">🛡️</div>
                        <h3>Reliable Service</h3>
                        <p>Professional support, verified vehicles, and flexible help whenever you need it.</p>
                    </article>
                </div>
            </div>
        </section>

        <!-- Future Blade View: resources/views/contact.blade.php -->
        <section class="page-section" id="contact">
            <div class="page-hero">
                <h1>Contact Us</h1>
                <p>Need support or want to ask about a booking? Our team is ready to help you with fast and friendly assistance.</p>
            </div>

            <div class="contact-layout">
                <div class="contact-card">
                    <h2>Get in touch</h2>
                    <p>We respond to questions about reservations, pickup details, pricing, and special requests.</p>

                    <ul class="contact-list">
                        <li>
                            <span class="icon">📍</span>
                            <span>123 Nile Street, Downtown, Cairo, Egypt</span>
                        </li>
                        <li>
                            <span class="icon">📞</span>
                            <span>+966 55 123 4567</span>
                        </li>
                        <li>
                            <span class="icon">✉️</span>
                            <span>support@autorent.com</span>
                        </li>
                    </ul>
                </div>

                <div class="contact-card">
                    <h3>Send Message</h3>
                    <form class="contact-form" id="contactForm">
                        <div class="field-row">
                            <label>
                                Name
                                <input type="text" name="name" placeholder="Your name" required>
                            </label>
                            <label>
                                Email
                                <input type="email" name="email" placeholder="you@example.com" required>
                            </label>
                        </div>

                        <label>
                            Subject
                            <input type="text" name="subject" placeholder="How can we help?" required>
                        </label>

                        <label>
                            Message
                            <textarea name="message" placeholder="Write your message here..." required></textarea>
                        </label>

                        <button type="submit" class="submit-btn">Send Message</button>
                    </form>
                </div>
            </div>
        </section>

        <!-- Future Blade View: resources/views/faq.blade.php -->
        <section class="page-section" id="faq">
            <div class="page-hero">
                <h1>Frequently Asked Questions</h1>
                <p>Find quick answers about renting, booking changes, documents, pricing, and cancellation policies.</p>
            </div>

            <div class="faq-wrap">
                <div class="faq-item open">
                    <button class="faq-question" type="button">
                        <span>How do I book a car?</span>
                        <span>＋</span>
                    </button>
                    <div class="faq-answer">
                        <p>Choose your preferred car, set your pickup date and location, then click Rent Now and confirm the booking in the modal form.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <button class="faq-question" type="button">
                        <span>Can I cancel my reservation?</span>
                        <span>＋</span>
                    </button>
                    <div class="faq-answer">
                        <p>Yes. Cancellation is allowed based on the booking terms and timing. Please contact support as soon as possible for assistance.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <button class="faq-question" type="button">
                        <span>What documents are required?</span>
                        <span>＋</span>
                    </button>
                    <div class="faq-answer">
                        <p>Usually a valid national ID or passport, a driver license, and a working phone number or email for confirmation.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <button class="faq-question" type="button">
                        <span>How is the price calculated?</span>
                        <span>＋</span>
                    </button>
                    <div class="faq-answer">
                        <p>Prices are based on the selected vehicle, rental duration, pickup and return schedule, and any optional service or insurance.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <button class="faq-question" type="button">
                        <span>Can I change my booking dates?</span>
                        <span>＋</span>
                    </button>
                    <div class="faq-answer">
                        <p>Yes, date changes may be possible depending on vehicle availability. Contact support to review the new dates and pricing.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Future Blade View: resources/views/errors/404.blade.php -->
        <section class="page-section" id="not-found">
            <div class="not-found-box">
                <div class="code">404</div>
                <h2>Page Not Found</h2>
                <p>The page you are trying to access does not exist or has been moved. Please return to the homepage.</p>
                <a href="{{ url('/') }}" class="back-home-btn">Back to Home</a>
            </div>
        </section>
    </div>

    <footer class="site-footer">
        <div class="footer-inner">
            <div class="footer-brand">AutoRent</div>
            <div class="footer-links">
                <a href="{{ url('/') }}">Home</a>
                <a href="#about">About</a>
                <a href="#contact">Contact</a>
                <a href="#faq">FAQ</a>
            </div>
        </div>
    </footer>

    <div class="modal" id="loginModal">
        <div class="modal-content">
            <button class="close-modal" data-close="loginModal">&times;</button>
            <h3>Login to AutoRent</h3>
            <p class="modal-sub">Enter your details to continue</p>

            <form id="loginForm">
                <label>Full Name
                    <input type="text" id="loginName" required minlength="3" placeholder="Ahmed Mohamed">
                </label>
                <label>Phone
                    <input type="tel" id="loginPhone" required pattern="01[0-9]{9}" placeholder="01xxxxxxxxx">
                </label>
                <label>Email
                    <input type="email" id="loginEmail" required placeholder="you@example.com">
                </label>
                <button type="submit" class="rent-btn">Login</button>
            </form>
        </div>
    </div>

    <div class="toast" id="toast"></div>

    <script src="{{ asset('frontend/script.js') }}"></script>
</body>

</html>
