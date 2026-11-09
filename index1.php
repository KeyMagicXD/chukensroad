<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casino Home Page</title>
    <style>
        /* General Styling */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #1a1a2e;
            color: #fff;
        }

        .header {
            display: flex;
            justify-content: space-between;
            padding: 10px 20px;
            background-color: #2e2e4d;
        }

        .auth-buttons button {
            margin-left: 10px;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
            color: white;
            background-color: #ff4d4d;
            border-radius: 5px;
        }

        /* Banner Section with Responsive Slider and Text */
        .banner {
            position: relative;
            overflow: hidden;
            max-width: 100%;
            height: 400px;
        }

        .slider {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }

        .slide {
            min-width: 100%;
            height: 100%;
            position: relative;
        }

        .slide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .slide-content {
            position: absolute;
            bottom: 20px;
            left: 20px;
            color: #fff;
            background-color: rgba(0, 0, 0, 0.5); /* Add background for better visibility */
            padding: 10px;
            border-radius: 5px;
        }

        .slide-content h1 {
            font-size: 2rem;
            margin: 0;
        }

        .slide-content p {
            font-size: 1rem;
        }

        @media (max-width: 768px) {
            .banner {
                height: 200px;
            }

            .slide-content h1 {
                font-size: 1.5rem;
            }

            .slide-content p {
                font-size: 0.875rem;
            }
        }

        /* Categories Section with Updated Background and Icon Alignment */
        .categories {
            display: grid;
            gap: 10px;
            padding: 20px;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        }

        .category-item {
            background-color: #391549;
            padding: 10px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            text-align: left;
        }

        .category-icon {
            width: 30px;
            height: 30px;
            margin-right: 10px;
        }

        .category-item h3 {
            margin: 0;
            font-size: 1rem;
        }

        @media (max-width: 768px) {
            .category-item {
                padding: 8px;
                flex-direction: row;
                justify-content: center;
            }

            .category-icon {
                width: 20px;
                height: 20px;
            }

            .category-item h3 {
                font-size: 0.875rem;
            }
        }

        /* Games Section with Responsive Grid */
        .games {
            padding: 20px;
        }

        .section-title {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .games-grid {
            display: grid;
            gap: 10px;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        }

        .game-card {
            background-color: #333;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
        }

        .game-card img {
            width: 100%;
            border-radius: 5px;
        }

        .game-title {
            margin-top: 5px;
            font-size: 14px;
        }

        .view-more {
            display: block;
            margin: 10px auto;
            padding: 10px 20px;
            background-color: #ff4d4d;
            border: none;
            color: white;
            cursor: pointer;
            border-radius: 5px;
        }

        /* Footer Section with Centered Text */
        .footer {
            padding: 20px;
            background-color: #2e2e4d;
            text-align: center;
            font-size: 0.875rem;
        }

        .footer a {
            color: #fff;
            text-decoration: none;
            margin: 0 10px;
        }

        /* Responsive Design */
        @media (min-width: 768px) {
            .banner {
                height: 400px;
            }
        }
    </style>
</head>
<body>
    <!-- Header Section -->
    <header class="header">
        <div class="logo">
            <img src="https://origin-r2.ibbf55-resources.com/webStaticIB/promo/aviator_reg/img/logo.svg" alt="Logo" width="100"> <!-- Add your logo image -->
        </div>
        <div class="auth-buttons">
            <button class="login-btn">Log in</button>
            <button class="signup-btn">Sign up</button>
        </div>
    </header>

    <!-- Banner Section with Slider -->
    <section class="banner">
        <div class="slider" id="slider">
            <div class="slide">
                <img src="https://static.ibbf55-resources.com/ContentIB/Promo/CRM_Promo/New_Casino_Welcome_150_200FS/890h320.png" alt="Banner 1">
                <div class="slide-content">
                    <h1>Welcome to Casino</h1>
                    <p>Get 150% + 200 FS on your first deposit!</p>
                </div>
            </div>
            <div class="slide">
                <img src="https://static.ibbf55-resources.com/ContentIB/Promo/CRM_Promo/New_Sport_Welcome/890h320.webp" alt="Banner 2">
                <div class="slide-content">
                    <h1>Big Wins Await</h1>
                    <p>Play with confidence and win big!</p>
                </div>
            </div>
            <div class="slide">
                <img src="https://static.ibbf55-resources.com/ContentIB/Promo/CRM_Promo/New_Casino_Welcome_150_200FS/890h320.png" alt="Banner 3">
                <div class="slide-content">
                    <h1>Exclusive Games</h1>
                    <p>Explore top games handpicked for you.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Game Categories Section -->
    <section class="categories">
        <div class="category-item">
            <img src="https://static.ibbf55-resources.com/ContentIB/Promo/CRM_Promo/New_Button_Blocks_V33/mob_Sport.png" alt="Casino" class="category-icon">
            <h3>Casino</h3>
        </div>
        <div class="category-item">
            <img src="https://static.ibbf55-resources.com/ContentIB/Promo/CRM_Promo/New_Button_Blocks_V33/mob_Sport.png" alt="Cricket" class="category-icon">
            <h3>Cricket</h3>
        </div>
        <div class="category-item">
            <img src="https://static.ibbf55-resources.com/ContentIB/Promo/CRM_Promo/New_Button_Blocks_V33/mob_Sport.png" alt="Live Casino" class="category-icon">
            <h3>Live Casino</h3>
        </div>
        <div class="category-item">
            <img src="https://static.ibbf55-resources.com/ContentIB/Promo/CRM_Promo/New_Button_Blocks_V33/mob_Sport.png" alt="Sport" class="category-icon">
            <h3>Sport</h3>
        </div>
    </section>

    <!-- Games Section with Card Items -->
    <section class="games">
        <h2 class="section-title">Top Games</h2>
        <div class="games-grid">
            <div class="game-card">
                <img src="av.png" alt="Aviator">
                <div class="game-title">Aviator</div>
            </div>
            <div class="game-card">
                <img src="av.png" alt="JetX">
                <div class="game-title">JetX</div>
            </div>
            <div class="game-card">
                <img src="av.png" alt="Aviatrix">
                <div class="game-title">Aviatrix</div>
            </div>
            <div class="game-card">
                <img src="av.png" alt="Rocket Dice">
                <div class="game-title">Rocket Dice</div>
            </div>
        </div>
        <button class="view-more">View All Games</button>
    </section>

    <!-- Footer Section with Centered Text -->
    <footer class="footer">
        <p>&copy; 2024 Casino Gaming. All rights reserved. | <a href="#">Terms of Service</a> | <a href="#">Privacy Policy</a></p>
    </footer>

    <script>
        // JavaScript for automatic slider
        let sliderIndex = 0;
        const slides = document.querySelectorAll('.slide');
        const totalSlides = slides.length;

        function showSlide() {
            sliderIndex = (sliderIndex + 1) % totalSlides;
            document.getElementById('slider').style.transform = `translateX(-${sliderIndex * 100}%)`;
        }

        setInterval(showSlide, 3000); // Slide changes every 3 seconds
    </script>
</body>
</html>
