<?php
session_start();
 
// Check if the user is logged in, if not then redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, maximum-scale=1, minimum-scale=1">
    <title>JILI Games</title>
    <!-- External CSS for better caching -->
    <link rel="stylesheet" href="styles.css">
    <style>
/* Global Styles */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #1a1a2e;
    opacity: 0;
    animation: fadeIn 1s forwards; /* Fade-in animation */
}

/* Fade-in Animation */
@keyframes fadeIn {
    to {
        opacity: 1;
    }
}

/* Header Styles */
.head {
    background-color: #1f1f1f;
    padding: 10px 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.4);
}

.head h1 {
    font-size: 2em;
    color: #f39c12;
    letter-spacing: 1px;
}

/* Navigation Links */
.nav-links {
    display: flex;
    gap: 20px;
}

.nav-links a {
    color: white;
    text-decoration: none;
    font-size: 18px;
}

.nav-links a:hover {
    color: #f39c12;
}

/* Hamburger Menu Icon */
.menu-bar {
    display: none;
    font-size: 24px;
    cursor: pointer;
    color: white;
}

/* Responsive Menu */
@media (max-width: 768px) {
    .nav-links {
        display: none;
        flex-direction: column;
        position: absolute;
        top: 60px;
        right: 20px;
        background-color: #1f1f1f;
        width: 200px;
        border-radius: 8px;
        padding: 10px;
        z-index: 1001;
    }

    .nav-links.active {
        display: flex;
    }

    .menu-bar {
        display: block;
    }
}

/* Slider Styles */
.slider-container {
    position: relative;
    overflow: hidden;
    max-height: 400px;
}

.slider-container img {
    width: 100%;
    height: auto;
    display: none;
    transition: opacity 1s ease-in-out;
}

.slider-controls {
    position: absolute;
    top: 50%;
    width: 100%;
    display: flex;
    justify-content: space-between;
    transform: translateY(-50%);
}

.slider-controls button {
    background-color: rgba(0, 0, 0, 0.5);
    border: none;
    color: white;
    font-size: 2rem;
    padding: 10px;
    cursor: pointer;
}

/* Buttons Above Games Container */
.games-buttons {
    display: flex;
    justify-content: center;
    margin: 20px 0;
    width: 100%;
}

.games-buttons button {
    width: 45%; /* Each button takes 50% of the screen width */
    height: 100px;
    padding: 10px 20px;
    margin: 20px;
    background-color: #f39c12;
    border: none;
    color: white;
    font-size: 16px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.games-buttons button:hover {
    background-color: #e67e22;
}
.games-buttons button.active {
    background-color: #e67e22; /* A different background color for the active button */
    border: 2px solid #d35400; /* Add a border to indicate the active state */
}


/* Games Container Styles */
.games-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    padding: 20px;
}

/* Game Card Styles */
.jili_games_card {
    background: white;
    border-radius: 15px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    width: 105px;
    height: 140px;
    margin: 5px;
    overflow: hidden;
    transition: transform 0.3s, box-shadow 0.3s;
    position: relative;
    transform: scale(1);
    animation: slideIn 0.5s;
}

.jili_games_card img {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
    transition: transform 0.3s;
}

/* Preloader Styles */
#preloader {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.8); /* Slightly dark overlay */
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 10000;
    visibility: hidden;
    opacity: 0;
    transition: opacity 0.3s ease-in-out, visibility 0.3s ease-in-out;
}

#preloader.active {
    visibility: visible;
    opacity: 1;
}

.loader {
    width: 50px;
    height: 50px;
    border: 6px solid rgba(255, 255, 255, 0.3); /* Light white border */
    border-top: 6px solid #f39c12; /* Orange color */
    border-radius: 50%;
    animation: spin 1s linear infinite;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

/* Responsive Game Card Layout */
@media (max-width: 768px) {
    .games-container {
        justify-content: space-between;
    }

    .jili_games_card {
        width: 30%; /* Show 3 game cards per row */
    }
}

@media (max-width: 480px) {
    .jili_games_card {
        width: 30%; /* 3 cards per row for smaller screens too */
    }
}

/* Slide-in Animation */
@keyframes slideIn {
    from {
        transform: translateY(20px);
        opacity: 0;
    }
    to {
        transform: translateY(0);
        opacity: 1;
    }
}
    </style>
    <!-- Load Axios asynchronously -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js" async></script>
</head>
<body>
    <div class="head">
        <h1>CODEOPENLAB</h1>
        <div class="nav-links">
            <a href="/indexlogin">Home</a>
            <a href="/api/ok">Games</a>
            <a href="/invite">Invite</a>
            <a href="/me">Profile</a>
        </div>
        <div class="menu-bar" onclick="toggleMenu()">&#9776;</div>
    </div>

    <div class="slider-container">
        <img data-src="/gameimg/bx1.png" alt="Casino Slider 1" loading="lazy">
        <img data-src="/gameimg/bx2.png" alt="Casino Slider 2" loading="lazy">
        <img data-src="/gameimg/bx3.png" alt="Casino Slider 3" loading="lazy">
        <div class="slider-controls">
            <button onclick="prevSlide()">&#10094;</button>
            <button onclick="nextSlide()">&#10095;</button>
        </div>
    </div>

    <!-- Buttons Section Above Games Container -->
    <div class="games-buttons">
        <button onclick="window.location.href='/api/ok';">JDB GAMES</button>
        <button class="active" onclick="window.location.href='/api/ok2';">JILI GAMES</button>
    </div>

    <main class="games-container" id="games-container"></main>

    <div id="preloader">
        <div class="loader"></div>
    </div>

    <script>
        const displayGames = () => {
            const mobile = '<?php echo $_SESSION['username']; ?>'; 
            const baseUrl = "https://apiprovider.codesellr.com/play_jili";
            const imageBaseUrl = "https://apiprovider.codesellr.com/jiliimg";
            const gameIds = [
                224, 229, 232, 233, 235, 236, 241, 242, 254, 261, 5, 6, 9, 10, 13, 2, 4, 14, 16, 17, 21, 23, 26, 27, 30, 33, 35, 36, 37, 38, 40, 43, 44, 45, 46, 47, 48, 49, 51, 58, 61, 62, 63, 64, 66, 67, 76, 77, 78, 85, 87, 91, 92, 100, 101, 102, 103, 106, 108, 109, 110, 115, 116, 126, 130, 134, 135, 136, 137, 142, 144, 145, 146, 153, 164, 166, 171, 172, 176, 180, 181, 183, 191, 193, 198, 208, 209, 214, 223, 225, 226, 228, 230, 238, 239, 252, 258, 259, 263, 299, 300, 301, 302, 303, 399, 403, 420, 159, 160, 161, 163, 199, 210, 211, 219, 220, 221, 72, 75, 79, 94, 127, 132, 231, 253, 42, 60, 71, 1, 20, 32, 74, 82, 119, 212, 289, 123, 124, 125, 139, 148, 149, 150, 111, 112, 113, 114, 118, 122, 151, 152, 173, 174, 177, 178, 179, 182, 195, 197, 200, 204, 216, 217, 262, 297, 389, 397, 407, 439
            ];

            const container = document.getElementById('games-container');
            container.innerHTML = '';

            gameIds.forEach(gameId => {
                const paddedGameId = gameId.toString().padStart(2, '0');
                container.innerHTML += `
                    <a href="${baseUrl}?gameId=${gameId}&mobile=${mobile}&agentId=authlife_Seamless&agentKey=5fdcd4109ded52656d37f981a145734dde028e3a&referrerUrl=https://selimdemo.site/api/jili.php" class="jili_games_card" onclick="showPreloader(event)">
                        <img src="${imageBaseUrl}/GAMEID_${paddedGameId}.png" alt="Game ${gameId}" loading="lazy" onerror="this.style.display='none'">
                    </a>
                `;
            });
        };

        // Function to show the preloader
        function showPreloader(event) {
            event.preventDefault(); // Prevent immediate navigation
            document.getElementById('preloader').classList.add('active');
            
            // Redirect after a short delay to show the preloader
            setTimeout(() => {
                window.location.href = event.target.closest('a').href;
            }, 500); // 500ms delay before redirect
        }

        displayGames();

        function filterGames(category) {
            console.log(`Filtering games by category: ${category}`);
            // Logic for filtering games can be added here.
        }
    </script>

    <script>
        let slideIndex = 0;
        const slides = document.querySelectorAll('.slider-container img');

        function showSlides() {
            slides.forEach((slide, index) => {
                slide.style.display = (index === slideIndex) ? "block" : "none";
                if (!slide.src) {
                    slide.src = slide.dataset.src; // Lazy load only the visible slide
                }
            });
        }

        function nextSlide() {
            slideIndex = (slideIndex + 1) % slides.length;
            showSlides();
        }

        function prevSlide() {
            slideIndex = (slideIndex - 1 + slides.length) % slides.length;
            showSlides();
        }

        function autoSlide() {
            nextSlide();
            setTimeout(autoSlide, 3000);
        }

        document.addEventListener("DOMContentLoaded", function() {
            showSlides();
            autoSlide(); // Start auto sliding
        });

        function toggleMenu() {
            const navLinks = document.querySelector('.nav-links');
            navLinks.classList.toggle('active');
        }

        // Close menu when clicking outside
        document.addEventListener("click", function(event) {
            const navLinks = document.querySelector('.nav-links');
            const menuBar = document.querySelector('.menu-bar');

            if (!navLinks.contains(event.target) && !menuBar.contains(event.target)) {
                navLinks.classList.remove('active');
            }
        });
    </script>
</body>
</html>
