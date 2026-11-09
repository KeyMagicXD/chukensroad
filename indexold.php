<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdityaLoot - Games</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #0d0d0d;
            color: #fff;
        }
        /* Header - Decreased height and made simpler */
         header {
            background-color: #1f1f1f;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.4);
        }
        header h1 {
            font-size: 2em;
            color: #f39c12;
            letter-spacing: 1px;
        }
        /* Navigation Links */
        .nav-links {
            display: flex;
            gap: 15px;
        }
        .nav-links a {
            color: #fff;
            text-decoration: none;
            font-size: 1em;
            padding: 5px 10px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .nav-links a:hover {
            background-color: #f39c12;
        }
        .nav-links a.login, .nav-links a.signup {
            border: 1px solid #f39c12;
            padding: 8px 15px;
        }
        .nav-links a.signup {
            background-color: #f39c12;
            color: #fff;
        }
        .nav-links a.login:hover {
            background-color: rgba(243, 156, 18, 0.3);
        }
        .nav-links a.signup:hover {
            background-color: #e67e22;
        }
        /* Slider */
        .slider-container {
            position: relative;
            overflow: hidden;
            max-height: 400px;
        }
        .slider-container img {
            width: 100%;
            height: auto;
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
        /* Game Categories Section */
        .game-category-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 20px;
    margin-top: 40px;
    padding: 0 20px;
}
        .category-card {
            position: relative;
            overflow: hidden;
            border-radius: 16px;
            /* Solid dark background to match theme */
            background-color: #292929;
            height: 120px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            display: flex;
            align-items: center;
            padding-left: 16px;
            cursor: pointer;
            text-decoration: none;
        }
        .category-card:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.6);
        }
        /* Remove underline from links in category cards */
        .category-card a {
            text-decoration: none;
            color: inherit;
        }
        .category-card img {
            position: absolute;
            right: 0;
            bottom: 0;
            width: 80px;
            height: 100px;
            object-fit: cover;
        }
        .category-info {
            display: flex;
            flex-direction: column;
            z-index: 2;
        }
        .category-info .title {
            font-size: 1.2em;
            font-weight: bold;
            color: #f39c12;
        }
        .category-info .description {
            font-size: 0.9em;
            color: rgba(255, 255, 255, 0.7);
        }
        /* Game Grid Section */
        .games-section {
            padding: 40px 20px;
            background-color: #0d0d0d;
        }
        .games-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
        }
        .game-card {
            background-color: #1f1f1f;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .game-card:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.5);
        }
        .game-card img {
            width: 100%;
            height: 150px;
            object-fit: cover;
        }
        .game-card h3 {
            text-align: center;
            padding: 15px;
            background-color: #262626;
            color: #f39c12;
            font-size: 1.2em;
        }
        /* View All Button */
        .view-all {
            text-align: center;
            margin-top: 20px;
        }
        .view-all a {
            background-color: #f39c12;
            color: #fff;
            padding: 10px 30px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 1.1em;
            font-weight: bold;
            display: inline-block;
        }
        .view-all a:hover {
            background-color: #e67e22;
        }
        /* Promo Section with Slider */
        .promo-section {
            padding: 50px 20px;
            background-color: #1f1f1f;
        }
        .promo-slider-container {
            display: flex;
            overflow-x: auto;
            scroll-behavior: smooth;
        }
        .promo-slide {
            min-width: 300px;
            margin-right: 20px;
            background-color: #333;
            background-size: cover;
            background-position: center;
            border-radius: 16px;
            padding: 20px;
            color: #fff;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .promo-slide h3 {
            font-size: 1.8em;
            margin-bottom: 10px;
        }
        .promo-slide p {
            font-size: 1em;
            margin-bottom: 15px;
        }
        .promo-slide button {
            background-color: transparent;
            border: 1px solid #fff;
            color: #fff;
            padding: 10px;
            cursor: pointer;
            border-radius: 8px;
        }
        .promo-slide button:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }
        .promo-all-link {
            text-align: center;
            display: block;
            margin-top: 20px;
            color: #f39c12;
            font-size: 1.1em;
            text-decoration: underline;
        }
        
         /* Popup Dialog */
        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 80%;
            max-width: 400px;
            background-color: #292929;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.5);
            text-align: center;
            z-index: 1000;
        }
        .popup h3 {
            color: #f39c12;
            margin-bottom: 20px;
        }
        .popup button {
            background-color: #f39c12;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin: 5px;
            transition: background-color 0.3s;
        }
        .popup button:hover {
            background-color: #e67e22;
        }
        .popup-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6);
            z-index: 999;
        }
        .popup-overlay.active,
        .popup.active {
            display: block;
            animation: fadeIn 0.5s ease;
        }
        /* Cross Icon to Close Popup */
.close-popup {
    position: absolute;
    top: 10px;
    right: 15px;
    font-size: 24px;
    color: #fff;
    cursor: pointer;
    background: none;
    border: none;
    font-weight: bold;
}
.close-popup:hover {
    color: #f39c12;
}
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
        /* Footer */
        footer {
            background-color: #1f1f1f;
            padding: 20px;
            text-align: center;
            border-top: 1px solid #333;
        }
        footer p {
            color: #aaa;
            font-size: 0.9em;
        }
        /* Responsive for small screens */
        @media (max-width: 768px) {
            header h1 {
                font-size: 1.8em;
            }
            .game-category-grid, .games-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            .promo-slide {
                min-width: 250px;
            }
        }
    </style>
</head>
<body>

<!-- Header Section -->
<header>
    <h1>Royale</h1>
    <div class="nav-links">
        <a href="#" class="login" onclick="openPopup()">Login</a>
        <a href="#" class="signup" onclick="openPopup()">Signup</a>
    </div>
</header>

<!-- Slider Section -->
<div class="slider-container">
    <img src="/gameimg/bx1.png" alt="Casino Slider 1">
    <img src="/gameimg/bx2.png" alt="Casino Slider 2">
    <img src="/gameimg/bx3.png" alt="Casino Slider 3">
    <div class="slider-controls">
        <button onclick="prevSlide()">&#10094;</button>
        <button onclick="nextSlide()">&#10095;</button>
    </div>
</div>

<!-- Game Categories Section -->
<section class="game-category-grid">
    <a class="category-card" onclick="openPopup()">
        <div class="category-info">
            <div class="title">Casino</div>
            <div class="description">11092 games</div>
        </div>
        <img src="//static.ibbf55-resources.com/ContentIB/Promo/CRM_Promo/New_Button_Blocks_V33/mob_Casino.png" alt="Casino Image">
    </a>
    <a class="category-card" onclick="openPopup()">
        <div class="category-info">
            <div class="title">Poker</div>
            <div class="description">506 games</div>
        </div>
        <img src="//static.ibbf55-resources.com/ContentIB/Promo/CRM_Promo/New_Button_Blocks_V33/mob_Live_casino.png" alt="Live Casino Image">
    </a>
 
    
     <a class="category-card" onclick="openPopup()">
        <div class="category-info">
            <div class="title">Sport</div>
            <div class="description">Top events</div>
        </div>
        <img src="//static.ibbf55-resources.com/ContentIB/Promo/CRM_Promo/New_Button_Blocks_V33/mob_Sport.png" alt="Sport Image">
    </a>
    <a class="category-card" onclick="openPopup()">
        <div class="category-info">
            <div class="title">Aviator</div>
            <div class="description">Instant game</div>
        </div>
        <img src="//static.ibbf55-resources.com/ContentIB/Promo/CRM_Promo/New_Button_Blocks_V33/mob_Aviator_supernew.png" alt="Aviator Image">
    </a>
     
</section>

<!-- Game Grid Section -->
<section class="games-section">
    <h2 style="text-align:center; margin-bottom: 20px; font-size: 2em;">Top Games</h2>
    <div class="games-grid">
         <div class="game-card" onclick="openPopup()">
            <img src="/gameimg/wingo.png" alt="Game 1">
            <h3>Wingo</h3>
        </div>
        <div class="game-card" onclick="openPopup()">
            <img src="/gameimg/aviator.png" alt="Game 2">
            <h3>Aviator</h3>
        </div>
        

        
        <div class="game-card" onclick="openPopup()">
            <img src="/gameimg/rouleete.png" alt="Game 3">
            <h3>Rouleete</h3>
        </div>
        <div class="game-card" onclick="openPopup()">
            <img src="/gameimg/mines.webp" alt="Game 4">
            <h3>Mines</h3>
        </div>
        <div class="game-card" onclick="openPopup()">
            <img src="/gameimg/birds.png" alt="Game 5">
            <h3>Birds Party</h3>
        </div>
        <div class="game-card" onclick="openPopup()">
            <img src="/gameimg/dragongates.png" alt="Game 6">
            <h3>Dragon Gate</h3>
        </div>
          <div class="game-card" onclick="openPopup()">
            <img src="/gameimg/lucky777.png" alt="Game 7">
            <h3>Lucky777</h3>
        
        </div>
        <div class="game-card" onclick="openPopup()">
            <img src="/gameimg/hilo.png" alt="Game 8">
            <h3>Hilo</h3>
        
        </div>
        
        <div class="game-card" onclick="openPopup()">
            <img src="/gameimg/tre.png" alt="Game 9">
            <h3>Treasure Bowl</h3>
            </div>
            
            <div class="game-card" onclick="openPopup()">
            <img src="/gameimg/dragontiger.png" alt="Game 10">
            <h3>Dragon & Tiger</h3>
        </div>
    </div>

    <!-- View All Button -->
    <div class="view-all">
        <a href="#" onclick="openPopup()">View All Games</a>
    </div>
</section>

<!-- Promo Section with Slider -->
<section class="promo-section">
    <h2 style="text-align:center; margin-bottom: 20px; font-size: 2em;">Community</h2>
    <div class="promo-slider-container">
        <div class="promo-slide" style="background-image: url('https://static.ibbf55-resources.com/ContentIB/Banners/Welcome/996_new_customers.jpg');">
            <h3>Bonuses for New Clients</h3>
            <p>Start playing and get bonuses for every deposit.</p>
            <button onclick="openPopup()">Learn More</button>
        </div>
        <div class="promo-slide" style="background-image: url('https://static.ibbf55-resources.com/ContentIB/Promo/CRM_Promo/New_Casino_Welcome_150_200FS/890h320.png');">
            <h3>Casino Welcome Bonus</h3>
            <p>150% + 200 FS for your first deposit.</p>
            <button onclick="openPopup()">Learn More</button>
        </div>
        <div class="promo-slide" style="background-image: url('telegram-back.png');">
            <h3>Join telegram channel</h3>
            <p>Get free prediction by joining the telegram channel.</p>
            <button onclick="openPopup()">Join Now</button>
        </div>
    </div>
 
</section>

<!-- Footer Section -->
<footer>
    <p>&copy; 2024 CODEOPENLAB. All rights reserved.</p>
</footer>

<!-- Popup Dialog -->
<div class="popup-overlay" onclick="closePopup()"></div>
<div class="popup">
    <span class="close-popup" onclick="closePopup()">&#10005;</span> <!-- Close Icon -->
    <h3>Please Sign Up or Login</h3>
    <button onclick="window.location.href='/register';">Signup</button>
    <button onclick="window.location.href='/login';">Login</button>
</div>


<script>
    let slideIndex = 0;
    const slides = document.querySelectorAll('.slider-container img');
    
    function showSlides() {
        slides.forEach((slide, index) => {
            slide.style.display = (index === slideIndex) ? "block" : "none";
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
        setTimeout(autoSlide, 3000); // Change image every 3 seconds
    }

    document.addEventListener("DOMContentLoaded", function() {
        showSlides();
        autoSlide(); // Start auto sliding
    });
    
    
    // Popup functionality
    function openPopup() {
        document.querySelector('.popup-overlay').classList.add('active');
        document.querySelector('.popup').classList.add('active');
    }

    function closePopup() {
        document.querySelector('.popup-overlay').classList.remove('active');
        document.querySelector('.popup').classList.remove('active');
    }
</script>

</body>
</html>
