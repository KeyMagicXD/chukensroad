<html>

<style>
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
         @media (max-width: 768px) {
            .nav-links {
                display: none;
                flex-direction: column;
                position: absolute;
                top: 60px; /* Menu appears below header */
                right: 20px;
                background-color: #1f1f1f;
                width: 200px;
                border-radius: 8px;
                padding: 10px;
                z-index: 1001; /* Ensure menu is above everything */
            }
            .nav-links.active {
                display: flex;
            }
            .menu-bar {
                display: block;
            }
        }
</style>
<script>
     // Toggle the navigation menu in smaller screens
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
<header>
    <h1>CHICKEN ROAD</h1>
    <div class="nav-links">
        <a href="/indexlogin">Home</a>
        <!--<a href="/api/ok">Games</a>-->
        <a href="/invite">Invite</a>
        <a href="/me">Profile</a>
    </div>
    <div class="menu-bar" onclick="toggleMenu()">&#9776;</div>
    
</header>
</html>