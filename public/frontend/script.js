const $ = (sel) => document.querySelector(sel);
const $$ = (sel) => document.querySelectorAll(sel);

// ---------- Toast Notification ----------
let toastTimer;
function showToast(msg, isError = false) {
    const t = $('#toast');
    if (!t) return;
    t.textContent = msg;
    t.className = 'toast show' + (isError ? ' error' : '');
    clearTimeout(toastTimer);
    toastTimer = setTimeout(() => t.classList.remove('show'), 2500);
}

// ---------- Modals Control ----------
function openModal(id) {
    const modal = $('#' + id);
    if (modal) modal.classList.add('show');
}
function closeModal(id) {
    const modal = $('#' + id);
    if (modal) modal.classList.remove('show');
}

if ($$('.close-modal').length) {
    $$('.close-modal').forEach(b => b.addEventListener('click', () => closeModal(b.dataset.close)));
}
if ($$('.modal').length) {
    $$('.modal').forEach(m => m.addEventListener('click', e => { if (e.target === m) m.classList.remove('show'); }));
}
document.addEventListener('keydown', e => { if (e.key === 'Escape') $$('.modal').forEach(m => m.classList.remove('show')); });

// ---------- Mobile Menu ----------
if ($('#menuBtn') && $('#navLinks')) {
    $('#menuBtn').addEventListener('click', () => $('#navLinks').classList.toggle('show'));
}

// ---------- Login / Logout System ----------
const loginBtn = $('#loginBtn');
const getUser = () => JSON.parse(localStorage.getItem('user') || 'null');

if (loginBtn) {
    function renderUser() {
        const user = getUser();
        loginBtn.textContent = user ? 'Logout' : 'Login';
        const userName = $('#userName');
        if (userName) {
            userName.hidden = !user;
            userName.textContent = user ? `👤 ${user.name}` : '';
        }
    }

    loginBtn.addEventListener('click', () => {
        if (getUser()) {
            localStorage.removeItem('user');
            renderUser();
            showToast('Logged out successfully');
        } else {
            openModal('loginModal');
        }
    });

    renderUser();
}

if ($('#loginForm')) {
    $('#loginForm').addEventListener('submit', e => {
        e.preventDefault();
        const user = {
            name: $('#loginName').value.trim(),
            phone: $('#loginPhone').value.trim(),
            email: $('#loginEmail').value.trim()
        };
        localStorage.setItem('user', JSON.stringify(user));

        closeModal('loginModal');
        e.target.reset();
        if (loginBtn) renderUser();
        showToast(`Welcome, ${user.name} 👋`);
    });
}

// ---------- Favorites (❤️) ----------
if ($('.car-card')) {
    let favorites = JSON.parse(localStorage.getItem('favorites') || '[]');

    function renderFavorites() {
        $$('.car-card').forEach(card => {
            const h = card.querySelector('.heart');
            if (!h) return;
            const fav = favorites.includes(card.dataset.id);
            h.classList.toggle('active', fav);
            h.textContent = fav ? '♥' : '♡';
        });
    }

    $$('.heart').forEach(h => h.addEventListener('click', (e) => {
        e.stopPropagation();
        const card = h.closest('.car-card');
        const id = card.dataset.id;
        if (favorites.includes(id)) {
            favorites = favorites.filter(f => f !== id);
            showToast(`${card.dataset.name} removed from favorites`);
        } else {
            favorites.push(id);
            showToast(`${card.dataset.name} added to favorites ❤️`);
        }
        localStorage.setItem('favorites', JSON.stringify(favorites));
        renderFavorites();
    }));
    renderFavorites();
}

// ---------- Search & Filter ----------
if ($('#searchForm')) {
    function filterCars() {
        const q = $('#searchInput').value.trim().toLowerCase();
        const loc = $('#locationInput').value;
        let n = 0;

        $$('.car-card').forEach(card => {
            const ok = card.dataset.name.toLowerCase().includes(q) && (!loc || card.dataset.location === loc);
            card.style.display = ok ? '' : 'none';
            if (ok) n++;
        });

        $('#resultsCount').textContent = `${n} car${n !== 1 ? 's' : ''} found`;
        $('#noResults').hidden = n > 0;
    }

    $('#searchForm').addEventListener('submit', e => {
        e.preventDefault();
        filterCars();
        $('#cars').scrollIntoView({ behavior: 'smooth' });
    });

    if ($('#searchInput')) $('#searchInput').addEventListener('input', filterCars);
    if ($('#locationInput')) $('#locationInput').addEventListener('change', filterCars);
    filterCars();
}

// ---------- Date constraints ----------
const today = new Date().toISOString().split('T')[0];
if ($('#dateInput')) $('#dateInput').min = today;
if ($('#rentDate')) $('#rentDate').min = today;
if ($('#returnDate')) $('#returnDate').min = today;

if ($('#rentDate') && $('#returnDate')) {
    $('#rentDate').addEventListener('change', (e) => {
        $('#returnDate').min = e.target.value;
    });
}

// ---------- Rent Now Modal ----------
if ($('.car-card .rent-btn') && $('#rentForm')) {
    let selectedCar = null;

    $$('.car-card .rent-btn').forEach(btn => btn.addEventListener('click', () => {
        const user = getUser();
        if (!user) {
            showToast('Please login first to rent a car', true);
            openModal('loginModal');
            return;
        }
        selectedCar = { ...btn.closest('.car-card').dataset };
        $('#modalCarName').textContent = selectedCar.name;
        $('#modalCarPrice').textContent = '$' + Number(selectedCar.price).toLocaleString();

        $('#renterName').value = user.name;
        $('#renterPhone').value = user.phone;

        const curDate = $('#dateInput') ? $('#dateInput').value || today : today;
        $('#rentDate').value = curDate;
        $('#returnDate').min = curDate;

        openModal('rentModal');
    }));

    $('#rentForm').addEventListener('submit', e => {
        e.preventDefault();

        const pickupDate = $('#rentDate').value;
        const returnDate = $('#returnDate').value;

        if (returnDate < pickupDate) {
            showToast('Return date cannot be before pickup date!', true);
            return;
        }

        const booking = {
            carId: selectedCar.id,
            carName: selectedCar.name,
            price: selectedCar.price,
            name: $('#renterName').value.trim(),
            phone: $('#renterPhone').value.trim(),
            email: getUser().email,
            pickupDate: pickupDate,
            pickupTime: $('#rentTime').value,
            returnDate: returnDate,
            returnTime: $('#returnTime').value,
            createdAt: new Date().toISOString()
        };

        const bookings = JSON.parse(localStorage.getItem('bookings') || '[]');
        bookings.push(booking);
        localStorage.setItem('bookings', JSON.stringify(bookings));

        closeModal('rentModal');
        e.target.reset();
        showToast(`✅ ${booking.carName} booked successfully!`);
    });
}

// ---------- My Bookings Button ----------
if ($('#myBookingsLink')) {
    $('#myBookingsLink').addEventListener('click', (e) => {
        e.preventDefault();
        const bookings = JSON.parse(localStorage.getItem('bookings') || '[]');
        if (!bookings.length) {
            showToast('You have no bookings yet', true);
            return;
        }
        const list = bookings.map(b =>
            `• ${b.carName}\n  📥 From: ${b.pickupDate} at ${b.pickupTime}\n  📤 To: ${b.returnDate} at ${b.returnTime}`
        ).join('\n\n');

        alert(`Your Bookings:\n\n${list}`);
    });
}

// ---------- Pages Section Switcher ----------
const pageSections = $$('.page-section');
if (pageSections.length) {
    const showSection = (id) => {
        pageSections.forEach(section => {
            const match = section.id === id;
            section.classList.toggle('active', match);
            section.hidden = !match;
        });

        $$('.page-nav a').forEach(link => {
            const isActive = link.getAttribute('href') === '#' + id;
            link.classList.toggle('active', isActive);
        });
    };

    $$('.page-nav a').forEach(link => {
        link.addEventListener('click', (e) => {
            const targetId = link.getAttribute('href').replace('#', '');
            if (!targetId) return;
            e.preventDefault();
            history.replaceState(null, '', '#' + targetId);
            showSection(targetId);
            if ($('#navLinks')) {
                $('#navLinks').classList.remove('show');
            }
        });
    });

    const initialTarget = window.location.hash ? window.location.hash.replace('#', '') : 'about';
    if (document.getElementById(initialTarget)) {
        showSection(initialTarget);
    } else {
        showSection('about');
    }

    window.addEventListener('hashchange', () => {
        const target = window.location.hash ? window.location.hash.replace('#', '') : 'about';
        if (document.getElementById(target)) showSection(target);
    });

    $$('.faq-question').forEach(btn => {
        btn.addEventListener('click', () => {
            const item = btn.closest('.faq-item');
            const open = item.classList.contains('open');
            $$('.faq-item').forEach(faq => {
                faq.classList.remove('open');
                faq.querySelector('.faq-answer').style.maxHeight = null;
            });

            if (!open) {
                item.classList.add('open');
                const answer = item.querySelector('.faq-answer');
                answer.style.maxHeight = answer.scrollHeight + 'px';
            }
        });
    });

    const contactForm = $('#contactForm');
    if (contactForm) {
        contactForm.addEventListener('submit', e => {
            e.preventDefault();
            showToast('Your message has been sent successfully!');
            contactForm.reset();
        });
    }
}
