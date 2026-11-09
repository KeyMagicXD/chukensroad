<?php
session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>AdityaLoot - Premium Gaming Experience</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    :root {
      --primary: #FFD700;
      --secondary: #7B68EE;
      --dark: #0A0A0F;
      --darker: #050508;
      --light: #F8F8FF;
      --accent: #FF1493;
      --glass: rgba(15, 15, 25, 0.6);
      --neon-glow: 0 0 15px rgba(255, 215, 0, 0.7);
    }
    
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: 'Poppins', sans-serif;
      background: var(--dark);
      color: var(--light);
      min-height: 100vh;
      overflow-x: hidden;
      position: relative;
    }

    /* Animated Background */
    body::before {
      content: '';
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: 
        radial-gradient(circle at 20% 30%, rgba(123, 104, 238, 0.15) 0%, transparent 30%),
        radial-gradient(circle at 80% 70%, rgba(255, 20, 147, 0.15) 0%, transparent 30%),
        linear-gradient(to bottom, var(--darker), var(--dark));
      z-index: -2;
      animation: backgroundPulse 15s infinite alternate;
    }

    @keyframes backgroundPulse {
      0% { opacity: 0.8; }
      50% { opacity: 1; }
      100% { opacity: 0.8; }
    }

    /* Floating Particles */
    .particles {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: -1;
      overflow: hidden;
    }

    .particle {
      position: absolute;
      background: rgba(255, 215, 0, 0.5);
      border-radius: 50%;
      animation: float linear infinite;
    }

    @keyframes float {
      0% { transform: translateY(0) rotate(0deg); }
      100% { transform: translateY(-100vh) rotate(360deg); }
    }

    /* Header Styles */
    header {
      background: var(--glass);
      backdrop-filter: blur(12px);
      -webkit-backdrop-filter: blur(12px);
      border-bottom: 1px solid rgba(255, 215, 0, 0.1);
      padding: 1rem 2rem;
      position: sticky;
      top: 0;
      z-index: 1000;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .logo {
      font-size: 1.8rem;
      font-weight: 800;
      color: var(--primary);
      display: flex;
      align-items: center;
      text-shadow: var(--neon-glow);
      transition: all 0.3s ease;
    }

    .logo:hover {
      transform: scale(1.05);
    }

    .logo img {
      height: 40px;
      margin-right: 10px;
    }

    .nav-container {
      display: flex;
      align-items: center;
      gap: 1.5rem;
    }

    .nav-links {
      display: flex;
      gap: 1.5rem;
    }

    .nav-links a {
      color: var(--light);
      text-decoration: none;
      font-weight: 500;
      transition: all 0.3s ease;
      position: relative;
      font-size: 0.95rem;
      padding: 0.5rem 0;
    }

    .nav-links a:hover {
      color: var(--primary);
    }

    .nav-links a::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 0;
      width: 0;
      height: 2px;
      background: var(--primary);
      transition: width 0.3s ease;
    }

    .nav-links a:hover::after {
      width: 100%;
    }

    .user-actions {
      display: flex;
      gap: 1rem;
      align-items: center;
    }

    .btn {
      padding: 0.6rem 1.2rem;
      border-radius: 50px;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s ease;
      border: none;
      font-size: 0.9rem;
      white-space: nowrap;
      position: relative;
      overflow: hidden;
    }

    .btn-primary {
      background: linear-gradient(135deg, var(--primary), #FFA500);
      color: var(--dark);
      box-shadow: 0 4px 15px rgba(255, 215, 0, 0.3);
    }

    .btn-primary:hover {
      transform: translateY(-3px);
      box-shadow: 0 10px 25px rgba(255, 215, 0, 0.5);
    }

    .btn-primary::after {
      content: '';
      position: absolute;
      top: -50%;
      left: -50%;
      width: 200%;
      height: 200%;
      background: linear-gradient(
        to bottom right,
        rgba(255, 255, 255, 0.3),
        rgba(255, 255, 255, 0)
      );
      transform: translateX(-100%) rotate(45deg);
      transition: all 0.6s ease;
    }

    .btn-primary:hover::after {
      transform: translateX(100%) rotate(45deg);
    }

    .btn-outline {
      background: transparent;
      border: 1px solid var(--primary);
      color: var(--primary);
    }

    .btn-outline:hover {
      background: rgba(255, 215, 0, 0.1);
    }

    .mobile-menu-btn {
      display: none;
      background: none;
      border: none;
      color: var(--light);
      font-size: 1.5rem;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .mobile-menu-btn:hover {
      color: var(--primary);
      transform: scale(1.1);
    }

    /* Mobile Menu */
    .mobile-menu {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: var(--darker);
      z-index: 9999;
      display: none;
      flex-direction: column;
      padding: 2rem;
      transform: translateX(100%);
      transition: transform 0.4s cubic-bezier(0.785, 0.135, 0.15, 0.86);
    }

    .mobile-menu.active {
      transform: translateX(0);
      display: flex;
    }

    .mobile-menu-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 2rem;
    }

    .mobile-menu-links {
      display: flex;
      flex-direction: column;
      gap: 1.5rem;
    }

    .mobile-menu-links a {
      color: var(--light);
      text-decoration: none;
      font-size: 1.2rem;
      padding: 0.8rem 0;
      border-bottom: 1px solid rgba(255,255,255,0.1);
      transition: all 0.3s ease;
      display: flex;
      align-items: center;
      gap: 1rem;
    }

    .mobile-menu-links a i {
      width: 25px;
      text-align: center;
    }

    .mobile-menu-links a:hover {
      color: var(--primary);
      padding-left: 10px;
    }

    .mobile-menu-actions {
      margin-top: auto;
      display: flex;
      flex-direction: column;
      gap: 1rem;
      padding-top: 2rem;
    }

    /* Slider Styles */
    .slider-container {
      position: relative;
      overflow: hidden;
      height: 70vh;
      max-height: 800px;
      border-radius: 0 0 20px 20px;
      box-shadow: 0 20px 50px rgba(0, 0, 0, 0.5);
    }

    .slider-container img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: none;
      position: absolute;
      top: 0;
      left: 0;
      opacity: 0;
      transition: opacity 1.5s cubic-bezier(0.77, 0, 0.175, 1);
    }

    .slider-container img.active {
      display: block;
      opacity: 1;
    }

    .slider-overlay {
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      padding: 3rem;
      background: linear-gradient(to top, rgba(0,0,0,0.9), transparent);
      z-index: 2;
    }

    .slider-text {
      max-width: 1200px;
      margin: 0 auto;
    }

    .slider-text h1 {
      font-size: clamp(2rem, 5vw, 3.5rem);
      margin-bottom: 1rem;
      background: linear-gradient(90deg, var(--light), var(--primary));
      -webkit-background-clip: text;
      background-clip: text;
      color: transparent;
      text-shadow: 0 0 20px rgba(255, 215, 0, 0.3);
    }

    .slider-text p {
      font-size: clamp(1rem, 2vw, 1.2rem);
      max-width: 600px;
      margin-bottom: 2rem;
    }

    /* Game Section */
    .section-title {
      text-align: center;
      font-size: clamp(2rem, 5vw, 3rem);
      margin: 5rem 0 3rem;
      position: relative;
    }

    .section-title::after {
      content: '';
      display: block;
      width: 100px;
      height: 4px;
      background: linear-gradient(90deg, var(--primary), var(--accent));
      margin: 1rem auto 0;
      border-radius: 2px;
    }

    .game-section {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(min(350px, 100%), 1fr));
      gap: 2rem;
      padding: 0 5%;
      max-width: 1800px;
      margin: 0 auto;
    }

    .game-box {
      background: var(--glass);
      backdrop-filter: blur(10px);
      -webkit-backdrop-filter: blur(10px);
      border-radius: 20px;
      overflow: hidden;
      transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
      border: 1px solid rgba(255, 255, 255, 0.05);
      position: relative;
    }

    .game-box:hover {
      transform: translateY(-10px) scale(1.02);
      box-shadow: 0 15px 40px rgba(255, 215, 0, 0.2);
      border-color: rgba(255, 215, 0, 0.3);
    }

    .game-box::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 3px;
      background: linear-gradient(90deg, var(--primary), var(--accent));
      opacity: 0;
      transition: opacity 0.3s ease;
    }

    .game-box:hover::before {
      opacity: 1;
    }

    .game-img {
      width: 100%;
      height: 200px;
      object-fit: cover;
      transition: transform 0.5s ease;
    }

    .game-box:hover .game-img {
      transform: scale(1.05);
    }

    .game-content {
      padding: 1.5rem;
    }

    .game-title {
      font-size: 1.3rem;
      margin-bottom: 0.5rem;
      font-weight: 600;
      color: var(--primary);
      text-align: center;
    }

    .game-desc {
      color: rgba(255, 255, 255, 0.7);
      margin-bottom: 1.5rem;
      font-size: 0.9rem;
      text-align: center;
    }

    .play-btn {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 0.5rem;
      background: linear-gradient(135deg, var(--primary), #FFA500);
      color: var(--dark);
      padding: 0.8rem 2rem;
      border-radius: 50px;
      font-weight: 600;
      text-decoration: none;
      transition: all 0.3s ease;
      width: 100%;
      border: none;
      cursor: pointer;
    }

    .play-btn:hover {
      transform: translateY(-3px);
      box-shadow: 0 10px 20px rgba(255, 215, 0, 0.3);
    }

    /* Promo Section */
    .promo-section {
      padding: 5rem 5%;
      background: linear-gradient(to bottom, rgba(10, 10, 15, 0.8), rgba(5, 5, 8, 0.9));
      position: relative;
      overflow: hidden;
    }

    .promo-section::before {
      content: '';
      position: absolute;
      top: -50%;
      left: -50%;
      width: 200%;
      height: 200%;
      background: radial-gradient(circle, rgba(255, 215, 0, 0.05) 0%, transparent 70%);
      z-index: -1;
      animation: rotate 20s linear infinite;
    }

    @keyframes rotate {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }

    .promo-slider-container {
      display: flex;
      gap: 2rem;
      padding: 2rem 0;
      overflow-x: auto;
      scroll-snap-type: x mandatory;
      scroll-behavior: smooth;
      -webkit-overflow-scrolling: touch;
    }

    .promo-slider-container::-webkit-scrollbar {
      height: 8px;
    }

    .promo-slider-container::-webkit-scrollbar-track {
      background: rgba(255, 255, 255, 0.1);
      border-radius: 10px;
    }

    .promo-slider-container::-webkit-scrollbar-thumb {
      background: linear-gradient(var(--primary), #FFA500);
      border-radius: 10px;
    }

    .promo-slide {
      min-width: min(400px, 90vw);
      height: 250px;
      scroll-snap-align: start;
      border-radius: 20px;
      overflow: hidden;
      position: relative;
      box-shadow: 0 15px 35px rgba(0, 0, 0, 0.5);
      transition: all 0.3s ease;
    }

    .promo-slide:hover {
      transform: translateY(-5px);
    }

    .promo-slide::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: linear-gradient(to bottom, transparent 0%, rgba(0,0,0,0.8) 100%);
      z-index: 1;
    }

    .promo-slide img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      position: absolute;
      top: 0;
      left: 0;
    }

    .promo-content {
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      padding: 2rem;
      z-index: 2;
    }

    .promo-content h3 {
      font-size: clamp(1.3rem, 3vw, 1.8rem);
      margin-bottom: 0.5rem;
      color: var(--primary);
    }

    .promo-content p {
      margin-bottom: 1.5rem;
      opacity: 0.9;
      font-size: clamp(0.9rem, 2vw, 1rem);
    }

    .promo-btn {
      background: transparent;
      border: 2px solid var(--primary);
      color: var(--primary);
      padding: 0.5rem 1.5rem;
      border-radius: 50px;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s ease;
      font-size: 0.9rem;
    }

    .promo-btn:hover {
      background: var(--primary);
      color: var(--dark);
    }

    /* Footer */
    footer {
      background: var(--darker);
      padding: 3rem 5%;
      text-align: center;
      position: relative;
    }

    .footer-content {
      max-width: 1200px;
      margin: 0 auto;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 2rem;
      text-align: left;
    }

    .footer-column h3 {
      font-size: 1.2rem;
      margin-bottom: 1.5rem;
      color: var(--primary);
      position: relative;
      display: inline-block;
    }

    .footer-column h3::after {
      content: '';
      position: absolute;
      bottom: -5px;
      left: 0;
      width: 50%;
      height: 2px;
      background: var(--primary);
    }

    .footer-links {
      list-style: none;
    }

    .footer-links li {
      margin-bottom: 0.8rem;
    }

    .footer-links a {
      color: rgba(255, 255, 255, 0.7);
      text-decoration: none;
      transition: all 0.3s ease;
      display: inline-block;
      font-size: 0.9rem;
    }

    .footer-links a:hover {
      color: var(--primary);
      transform: translateX(5px);
    }

    .social-links {
      display: flex;
      gap: 1rem;
      margin-top: 1rem;
    }

    .social-links a {
      color: var(--light);
      background: rgba(255, 255, 255, 0.1);
      width: 40px;
      height: 40px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: all 0.3s ease;
    }

    .social-links a:hover {
      background: var(--primary);
      color: var(--dark);
      transform: translateY(-3px);
    }

    .copyright {
      margin-top: 3rem;
      padding-top: 1.5rem;
      border-top: 1px solid rgba(255, 255, 255, 0.1);
      color: rgba(255, 255, 255, 0.5);
      font-size: 0.9rem;
    }

    /* Smooth scrolling for anchor links */
    html {
      scroll-behavior: smooth;
    }

    /* Responsive Design */
    @media (max-width: 992px) {
      .nav-links {
        display: none;
      }
      
      .mobile-menu-btn {
        display: block;
      }
      
      .user-actions {
        margin-left: auto;
      }
    }

    @media (max-width: 768px) {
      header {
        padding: 1rem;
      }
      
      .btn {
        padding: 0.5rem 1rem;
      }
      
      .slider-overlay {
        padding: 2rem;
      }
      
      .promo-slide {
        height: 200px;
      }
      
      .promo-content {
        padding: 1.5rem;
      }
    }

    @media (max-width: 576px) {
      .logo {
        font-size: 1.5rem;
      }
      
      .logo img {
        height: 30px;
      }
      
      .user-actions {
        gap: 0.5rem;
      }
      
      .btn {
        font-size: 0.8rem;
        padding: 0.4rem 0.8rem;
      }
      
      .slider-overlay {
        padding: 1.5rem;
      }
      
      .game-section {
        padding: 0 1rem;
      }
      
      .footer-content {
        grid-template-columns: 1fr;
        gap: 1.5rem;
      }
    }
  </style>
</head>
<body>

<!-- Floating Particles Background -->
<div class="particles" id="particles"></div>

<header>
  <div class="logo">
   
    CHICKEN ROAD
  </div>
  
  <div class="nav-container">
    <nav class="nav-links">
      <div class="bottom-nav">
  <a href="https://selimdemo.site/">
    <i class="fas fa-home"></i>
    Home
  </a>
  <a href="https://selimdemo.site/invite">
    <i class="fas fa-user-plus"></i>
    Invite
  </a>
  <a href="https://selimdemo.site/me">
    <i class="fas fa-user-circle"></i>
    Profile
  </a>
</div>
    </nav>
    
    <button class="mobile-menu-btn" id="mobileMenuBtn">
      <i class="fas fa-bars"></i>
    </button>
  </div>
</header>

<!-- Mobile Menu -->
<div class="mobile-menu" id="mobileMenu">
  <div class="mobile-menu-header">
    <div class="logo">
     
      CHICKEN ROAD
    </div>
    <button id="closeMobileMenu"><i class="fas fa-times"></i></button>
  </div>
  
  <nav class="mobile-menu-links">
   <div class="bottom-nav">
  <a href="https://selimdemo.site/">
    <i class="fas fa-home"></i>
    Home
  </a>
  <a href="https://selimdemo.site/invite">
    <i class="fas fa-user-plus"></i>
    Invite
  </a>
  <a href="https://selimdemo.site/me">
    <i class="fas fa-user-circle"></i>
    Profile
  </a>
</div>
  </nav>
</div>

<!-- Slider -->
<div class="slider-container" id="home">
  <img src="/img/b1.gif" class="active" alt="Premium Gaming Experience">
  <img src="/img/b2.gif" alt="Win Big Prizes">
  <img src="/img/b3.gif" alt="Exciting Tournaments">
  
  <div class="slider-overlay">
    <div class="slider-text">
      <h1>PREMIUM GAMING EXPERIENCE</h1>
      <p>Join millions of players worldwide in our exciting games with massive prizes and thrilling gameplay.</p>
      <button class="btn btn-primary">Get Started</button>
    </div>
  </div>
</div>

<!-- Game Section -->
<h2 class="section-title">FEATURED GAMES</h2>
<section class="game-section">
  <div class="game-box">
    <img src="/img/chicken_road.png" alt="Chicken Road" class="game-img">
    <div class="game-content">
      <h3 class="game-title">Chicken Road</h3>
      <p class="game-desc">Navigate through traffic and collect coins in this exciting adventure game.</p>
      <a href="/api/chicken_road.php" class="play-btn"><i class="fas fa-play"></i> Play Now</a>
    </div>
  </div>

  <div class="game-box">
    <img src="/img/chicken_road_2.png" alt="Chicken Road 2" class="game-img">
    <div class="game-content">
      <h3 class="game-title">Chicken Road 2</h3>
      <p class="game-desc">The sequel to the hit game with new levels and challenges.</p>
      <a href="/api/chicken_road_2.php" class="play-btn"><i class="fas fa-play"></i> Play Now</a>
    </div>
  </div>

  <div class="game-box">
    <img src="/img/penality.png" alt="Penalty Shootout" class="game-img">
    <div class="game-content">
      <h3 class="game-title">Penalty Shootout</h3>
      <p class="game-desc">Test your skills in this thrilling football penalty challenge.</p>
      <a href="/api/penalty.php" class="play-btn"><i class="fas fa-play"></i> Play Now</a>
    </div>
  </div>
</section>

<!-- Promo Section -->
<section class="promo-section" id="promotions">
  <h2 class="section-title">LATEST PROMOTIONS</h2>
  <div class="promo-slider-container">
    <div class="promo-slide">
      <img src="https://static.ibbf55-resources.com/ContentIB/Banners/Welcome/996_new_customers.jpg" alt="New Customer Bonus">
      <div class="promo-content">
        <h3>New Player Bonus</h3>
        <p>Get 150% bonus on your first deposit up to ₹10,000</p>
        <button class="promo-btn">Claim Now</button>
      </div>
    </div>
    
    <div class="promo-slide">
      <img src="https://static.ibbf55-resources.com/ContentIB/Promo/CRM_Promo/New_Casino_Welcome_150_200FS/890h320.png" alt="Casino Welcome">
      <div class="promo-content">
        <h3>Casino Welcome</h3>
        <p>150% + 200 Free Spins for new casino players</p>
        <button class="promo-btn">Learn More</button>
      </div>
    </div>
    
    <div class="promo-slide">
      <img src="telegram-back.png" alt="Telegram Channel">
      <div class="promo-content">
        <h3>Join Our Telegram</h3>
        <p>Get exclusive bonuses and free predictions</p>
        <button class="promo-btn">Join Now</button>
      </div>
    </div>
  </div>
</section>

<!-- Invite Section -->
<section id="invite" style="padding: 5rem 5%;">
  <h2 class="section-title">INVITE FRIENDS</h2>
  <div style="text-align: center; max-width: 800px; margin: 0 auto;">
    <p>Invite your friends and earn rewards when they join and play!</p>
    <div style="margin-top: 2rem;">
      <button class="btn btn-primary" style="margin: 0.5rem;">
        <i class="fas fa-share-alt"></i> Share Referral Link
      </button>
    </div>
  </div>
</section>

<!-- Profile Section -->
<section id="profile" style="padding: 5rem 5%; background: var(--darker);">
  <h2 class="section-title">MY PROFILE</h2>
  <div style="text-align: center; max-width: 800px; margin: 0 auto;">
    <p>Manage your account settings and game preferences</p>
    <div style="margin-top: 2rem;">
      <a href="#" class="btn btn-outline" style="margin: 0.5rem;">
        <i class="fas fa-cog"></i> Settings
      </a>
      <a href="#" class="btn btn-outline" style="margin: 0.5rem;">
        <i class="fas fa-history"></i> Game History
      </a>
    </div>
  </div>
</section>

<!-- Footer -->
<footer>
  <div class="footer-content">
    <div class="footer-column">
      <h3>Chicken Road</h3>
      <p>Premium gaming platform with exciting games and massive rewards.</p>
      <div class="social-links">
        <a href="#"><i class="fab fa-telegram"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="#"><i class="fab fa-facebook"></i></a>
      </div>
    </div>
    
    <div class="footer-column">
      <h3>Quick Links</h3>
      <ul class="footer-links">
        <li><a href="#home">Home</a></li>
        <li><a href="#games">Games</a></li>
        <li><a href="#promotions">Promotions</a></li>
      </ul>
    </div>
    
    <div class="footer-column">
      <h3>Legal</h3>
      <ul class="footer-links">
        <li><a href="#">Terms & Conditions</a></li>
        <li><a href="#">Privacy Policy</a></li>
        <li><a href="#">Responsible Gaming</a></li>
      </ul>
    </div>
    
    <div class="footer-column">
      <h3>Contact Info</h3>
      <ul class="footer-links">
        <li><i class="fas fa-envelope"></i> support@chickenroad.com</li>
        <li><i class="fas fa-clock"></i> 24/7 Support</li>
      </ul>
    </div>
  </div>
  
  <div class="copyright">
    &copy; 2024 Chicken Road. All Rights Reserved.
  </div>
</footer>

<!-- JavaScript -->
<script>
  // Create floating particles
  function createParticles() {
    const particlesContainer = document.getElementById('particles');
    const particleCount = window.innerWidth < 768 ? 30 : 50;
    
    for (let i = 0; i < particleCount; i++) {
      const particle = document.createElement('div');
      particle.classList.add('particle');
      
      // Random size between 2px and 6px
      const size = Math.random() * 4 + 2;
      particle.style.width = `${size}px`;
      particle.style.height = `${size}px`;
      
      // Random position
      particle.style.left = `${Math.random() * 100}vw`;
      particle.style.top = `${Math.random() * 100}vh`;
      
      // Random opacity
      particle.style.opacity = Math.random() * 0.5 + 0.1;
      
      // Random animation duration (10s to 20s) and delay
      const duration = Math.random() * 10 + 10;
      const delay = Math.random() * -20;
      particle.style.animation = `float ${duration}s linear infinite`;
      particle.style.animationDelay = `${delay}s`;
      
      particlesContainer.appendChild(particle);
    }
  }
  
  // Mobile Menu Toggle
  const mobileMenuBtn = document.getElementById('mobileMenuBtn');
  const closeMobileMenu = document.getElementById('closeMobileMenu');
  const mobileMenu = document.getElementById('mobileMenu');
  
  mobileMenuBtn.addEventListener('click', () => {
    mobileMenu.classList.add('active');
    document.body.style.overflow = 'hidden';
  });
  
  closeMobileMenu.addEventListener('click', () => {
    mobileMenu.classList.remove('active');
    document.body.style.overflow = '';
  });
  
  // Close mobile menu when clicking on links
  document.querySelectorAll('.mobile-menu-links a').forEach(link => {
    link.addEventListener('click', () => {
      mobileMenu.classList.remove('active');
      document.body.style.overflow = '';
    });
  });
  
  // Slider functionality
  const slides = document.querySelectorAll('.slider-container img');
  let currentSlide = 0;
  
  function showSlide(index) {
    slides.forEach((img, i) => {
      img.classList.toggle('active', i === index);
    });
  }
  
  function nextSlide() {
    currentSlide = (currentSlide + 1) % slides.length;
    showSlide(currentSlide);
  }
  
  // Auto-slide every 5 seconds
  setInterval(nextSlide, 5000);
  
  // Initialize first slide and particles
  window.addEventListener('DOMContentLoaded', () => {
    showSlide(0);
    createParticles();
  });
</script>
</body>
</html>