<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AutoRent</title>
    <link rel="stylesheet" href="{{ asset('frontend/style.css') }}">
</head>

<body>

    <header class="navbar">
        <div class="logo">AutoRent</div>

        <button class="menu-btn" id="menuBtn" aria-label="Menu">☰</button>

        <nav class="nav-links" id="navLinks">
            
            <a href="{{ url('/') }}" class="active">Home</a>

            <a href="#cars">Explore Cars</a>

            <a href="{{ url('/pages') }}#about">About Us</a>

            <a href="{{ url('/pages') }}#contact">Contact Us</a>

            <a href="{{ url('/pages') }}#faq">FAQ</a>

            <a href="#" id="myBookingsLink">My Bookings</a>
        </nav>

        <div class="user-area">
            <span class="user-name" id="userName" hidden></span>
            <button class="login-btn" id="loginBtn">Login</button>
        </div>
    </header>


    <section class="hero">
        <form class="search-box" id="searchForm">
            <div class="search-field">
                <label for="dateInput">📅 Date</label>
                <input type="date" id="dateInput" name="date">
            </div>

            <div class="search-field">
                <label for="locationInput">📍 Location</label>
                <select id="locationInput" name="location">
                    <option value="">All Locations</option>
                    <option value="Damietta">Damietta</option>
                    <option value="Cairo">Cairo</option>
                    <option value="Alexandria">Alexandria</option>
                </select>
            </div>

            <div class="search-field">
                <label for="searchInput">🔍 Car Name</label>
                <input type="text" id="searchInput" name="q" placeholder="e.g. Tesla">
            </div>

            <button type="submit" class="search-btn">Search</button>
        </form>
    </section>


    <main class="cars-section" id="cars">
        <div class="section-head">
            <h2>Show Cars</h2>
            <span id="resultsCount"></span>
        </div>

        <div class="cars-grid" id="carsGrid">

            <div class="car-card" data-id="1" data-name="Tesla Model 3" data-price="1250000" data-seats="5"
                data-location="Damietta">
                <div class="car-image">
                    <img src="/frontend/photos/imge1.jpeg" alt="Tesla Model 3">
                    <button class="heart" aria-label="Add to favorites">♡</button>
                </div>
                <div class="car-info">
                    <h3>Tesla Model 3</h3>
                    <p class="car-description">Electric, modern, and efficient for daily drives and longer trips.</p>
                    <p class="price">$1,250,000 <small>total price</small></p>
                    <div class="details"><span>Automatic</span><span>5 Seats</span></div>
                    <button class="rent-btn">Rent Now</button>
                </div>
            </div>

            <div class="car-card" data-id="2" data-name="Hyundai Tucson" data-price="1480000" data-seats="5"
                data-location="Cairo">
                <div class="car-image">
                    <img src="/frontend/photos/imge2.jpeg" alt="Hyundai Tucson">
                    <button class="heart" aria-label="Add to favorites">♡</button>
                </div>
                <div class="car-info">
                    <h3>Hyundai Tucson</h3>
                    <p class="car-description">A comfortable SUV with generous space and strong everyday performance.</p>
                    <p class="price">$1,480,000 <small>total price</small></p>
                    <div class="details"><span>Automatic</span><span>5 Seats</span></div>
                    <button class="rent-btn">Rent Now</button>
                </div>
            </div>

            <div class="car-card" data-id="3" data-name="Dirkin Rowson" data-price="1175000" data-seats="5"
                data-location="Damietta">
                <div class="car-image">
                    <img src="/frontend/photos/imge3.jpeg" alt="Dirkin Rowson">
                    <button class="heart" aria-label="Add to favorites">♡</button>
                </div>
                <div class="car-info">
                    <h3>Dirkin Rowson</h3>
                    <p class="car-description">Practical and roomy, designed for relaxed city driving and family trips.</p>
                    <p class="price">$1,175,000 <small>total price</small></p>
                    <div class="details"><span>Automatic</span><span>5 Seats</span></div>
                    <button class="rent-btn">Rent Now</button>
                </div>
            </div>

            <div class="car-card" data-id="4" data-name="Payotra Car" data-price="980000" data-seats="5"
                data-location="Alexandria">
                <div class="car-image">
                    <img src="/frontend/photos/imge4.jpeg" alt="Payotra Car">
                    <button class="heart" aria-label="Add to favorites">♡</button>
                </div>
                <div class="car-info">
                    <h3>Payotra Car</h3>
                    <p class="car-description">A smart and affordable choice for simple travel with smooth everyday comfort.</p>
                    <p class="price">$980,000 <small>total price</small></p>
                    <div class="details"><span>Automatic</span><span>5 Seats</span></div>
                    <button class="rent-btn">Rent Now</button>
                </div>
            </div>

            <div class="car-card" data-id="5" data-name="BMW 5 Series" data-price="2350000" data-seats="5"
                data-location="Cairo">
                <div class="car-image">
                    <img src="/frontend/photos/imge5.jpeg" alt="BMW 5 Series">
                    <button class="heart" aria-label="Add to favorites">♡</button>
                </div>
                <div class="car-info">
                    <h3>BMW 5 Series</h3>
                    <p class="car-description">Luxury performance with a refined cabin, ideal for executive trips and premium travel.</p>
                    <p class="price">$2,350,000 <small>total price</small></p>
                    <div class="details"><span>Automatic</span><span>5 Seats</span></div>
                    <button class="rent-btn">Rent Now</button>
                </div>
            </div>

            <div class="car-card" data-id="6" data-name="Mercedes Benz" data-price="2850000" data-seats="5"
                data-location="Damietta">
                <div class="car-image">
                    <img src="/frontend/photos/imge6.jpeg" alt="Mercedes Benz">
                    <button class="heart" aria-label="Add to favorites">♡</button>
                </div>
                <div class="car-info">
                    <h3>Mercedes Benz</h3>
                    <p class="car-description">Elegant and powerful, crafted for comfort, prestige, and smooth long-distance drives.</p>
                    <p class="price">$2,850,000 <small>total price</small></p>
                    <div class="details"><span>Automatic</span><span>5 Seats</span></div>
                    <button class="rent-btn">Rent Now</button>
                </div>
            </div>

            <div class="car-card" data-id="7" data-name="Audi Q8" data-price="2150000" data-seats="5"
                data-location="Alexandria">
                <div class="car-image">
                    <img src="/frontend/photos/imge7.jpeg" alt="Audi Q8">
                    <button class="heart" aria-label="Add to favorites">♡</button>
                </div>
                <div class="car-info">
                    <h3>Audi Q8</h3>
                    <p class="car-description">A premium SUV with a bold design, luxury interior, and excellent road presence.</p>
                    <p class="price">$2,150,000 <small>total price</small></p>
                    <div class="details"><span>Automatic</span><span>5 Seats</span></div>
                    <button class="rent-btn">Rent Now</button>
                </div>
            </div>

            <div class="car-card" data-id="8" data-name="Range Rover" data-price="3200000" data-seats="7"
                data-location="Cairo">
                <div class="car-image">
                    <img src="/frontend/photos/imge8.jpeg" alt="Range Rover">
                    <button class="heart" aria-label="Add to favorites">♡</button>
                </div>
                <div class="car-info">
                    <h3>Range Rover</h3>
                    <p class="car-description">Powerful, spacious, and built for comfort on long routes and challenging roads.</p>
                    <p class="price">$3,200,000 <small>total price</small></p>
                    <div class="details"><span>Automatic</span><span>7 Seats</span></div>
                    <button class="rent-btn">Rent Now</button>
                </div>
            </div>

            <div class="car-card" data-id="9" data-name="Porsche 911" data-price="4750000" data-seats="2"
                data-location="Damietta">
                <div class="car-image">
                    <img src="/frontend/photos/imge9.jpeg" alt="Porsche 911">
                    <button class="heart" aria-label="Add to favorites">♡</button>
                </div>
                <div class="car-info">
                    <h3>Porsche 911</h3>
                    <p class="car-description">A sports icon with bold design, sharp performance, and high-end driving pleasure.</p>
                    <p class="price">$4,750,000 <small>total price</small></p>
                    <div class="details"><span>Automatic</span><span>2 Seats</span></div>
                    <button class="rent-btn">Rent Now</button>
                </div>
            </div>

            <div class="car-card" data-id="10" data-name="Lamborghini Huracan" data-price="6500000" data-seats="2"
                data-location="Cairo">
                <div class="car-image">
                    <img src="/frontend/photos/imge10.jpeg" alt="Lamborghini Huracan">
                    <button class="heart" aria-label="Add to favorites">♡</button>
                </div>
                <div class="car-info">
                    <h3>Lamborghini Huracan</h3>
                    <p class="car-description">An aggressive supercar built for speed, prestige, and unforgettable driving moments.</p>
                    <p class="price">$6,500,000 <small>total price</small></p>
                    <div class="details"><span>Automatic</span><span>2 Seats</span></div>
                    <button class="rent-btn">Rent Now</button>
                </div>
            </div>

            <div class="car-card" data-id="11" data-name="Ferrari Roma" data-price="5900000" data-seats="2"
                data-location="Alexandria">
                <div class="car-image">
                    <img src="/frontend/photos/imge11.jpeg" alt="Ferrari Roma">
                    <button class="heart" aria-label="Add to favorites">♡</button>
                </div>
                <div class="car-info">
                    <h3>Ferrari Roma</h3>
                    <p class="car-description">A sleek performance car that blends speed, power, and luxury in one statement vehicle.</p>
                    <p class="price">$5,900,000 <small>total price</small></p>
                    <div class="details"><span>Automatic</span><span>2 Seats</span></div>
                    <button class="rent-btn">Rent Now</button>
                </div>
            </div>

            <div class="car-card" data-id="12" data-name="Bentley Continental" data-price="4200000" data-seats="4"
                data-location="Damietta">
                <div class="car-image">
                    <img src="/frontend/photos/imge12.jpeg" alt="Bentley Continental">
                    <button class="heart" aria-label="Add to favorites">♡</button>
                </div>
                <div class="car-info">
                    <h3>Bentley Continental</h3>
                    <p class="car-description">Premium comfort and unmistakable elegance for travelers who want a luxury experience.</p>
                    <p class="price">$4,200,000 <small>total price</small></p>
                    <div class="details"><span>Automatic</span><span>4 Seats</span></div>
                    <button class="rent-btn">Rent Now</button>
                </div>
            </div>

        </div>

        <p class="no-results" id="noResults" hidden>No cars match your search 😕</p>
    </main>


    <!-- ===== Login Modal ===== -->
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
    <div class="modal" id="rentModal">
        <div class="modal-content">
            <button class="close-modal" data-close="rentModal">&times;</button>
            <h3 id="modalCarName">Car</h3>
            <p class="modal-price" id="modalCarPrice"></p>

            <form id="rentForm">
                <label>Full Name
                    <input type="text" id="renterName" required>
                </label>
                <label>Phone
                    <input type="tel" id="renterPhone" required pattern="01[0-9]{9}" placeholder="01xxxxxxxxx">
                </label>
                <div class="form-row">
                    <label>Pickup Date
                        <input type="date" id="rentDate" required>
                    </label>
                    <label>Pickup Time
                        <input type="time" id="rentTime" required>
                    </label>
                </div>
                <div class="form-row">
                    <label>Return Date
                        <input type="date" id="returnDate" required>
                    </label>
                    <label>Return Time
                        <input type="time" id="returnTime" required>
                    </label>
                </div>

                <button type="submit" class="rent-btn">Confirm Booking</button>
            </form>
        </div>
    </div>
    <div class="toast" id="toast"></div>

    <script src="{{ asset('frontend/script.js') }}"></script>
</body>

</html>