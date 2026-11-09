<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Casino Games</title>
  <style>
    /* General Styles */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f8f9fa;
    }

    /* Slider Styling */
    .slider {
      width: 100%;
      overflow: hidden;
      position: relative;
    }

    .slides {
      display: flex;
      transition: transform 0.5s ease;
    }

    .slide {
      min-width: 100%;
      box-sizing: border-box;
    }

    /* Game Cards Grid Styling */
    .games {
      padding: 20px;
      text-align: center;
    }

    .game-grid {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 15px;
    }

    .game-card {
      background-color: #ffffff;
      border-radius: 8px;
      box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
      overflow: hidden;
      width: 180px;
      text-align: center;
    }

    .game-card img {
      width: 100%;
      height: auto;
      border-bottom: 1px solid #ddd;
    }

    .game-card h3 {
      font-size: 1.2em;
      margin: 10px 0;
    }

    .game-card button {
      padding: 10px;
      background-color: #007bff;
      color: white;
      border: none;
      cursor: pointer;
      width: 100%;
    }

    .game-card button:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
  <!-- Slider Section -->
  <section class="slider">
    <div class="slides">
      <div class="slide"><img src="slider1.jpg" alt="Game Promo 1" /></div>
      <div class="slide"><img src="slider2.jpg" alt="Game Promo 2" /></div>
      <div class="slide"><img src="slider3.jpg" alt="Game Promo 3" /></div>
    </div>
  </section>

  <!-- Games Grid -->
  <section class="games">
    <h2>Our Games</h2>
    <div class="game-grid">
      <!-- Repeat card elements for each game -->
      <div class="game-card">
        <img src="game1.jpg" alt="Game 1">
        <h3>Slot Mania</h3>
        <button onclick="openGame('game1')">Play Now</button>
      </div>
      <div class="game-card">
        <img src="game2.jpg" alt="Game 2">
        <h3>Poker Pro</h3>
        <button onclick="openGame('game2')">Play Now</button>
      </div>
      <!-- Add more game cards up to 50 as needed -->
    </div>
  </section>

  <script>
    // JavaScript for slider functionality
    let currentSlide = 0;
    const slides = document.querySelectorAll('.slide');

    function showSlide(index) {
      const totalSlides = slides.length;
      slides.forEach((slide, i) => {
        slide.style.transform = `translateX(${(i - index) * 100}%)`;
      });
    }

    setInterval(() => {
      currentSlide = (currentSlide + 1) % slides.length;
      showSlide(currentSlide);
    }, 3000);

    // Function to open game
    function openGame(gameId) {
      window.location.href = `games/${gameId}.php`; // Replace with your game URL structure
    }
  </script>
</body>
</html>
