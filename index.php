<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Chicken Road - Play Now & Win Real Money!</title>
    <meta name="description" content="Play Chicken Road for free and win real cash prizes! The most exciting chicken crossing game with instant withdrawals.">
    
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&family=Fredoka+One&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    
    <style>
        :root {
            --primary: #FFC107;
            --primary-dark: #FFA000;
            --secondary: #FF5722;
            --dark: #121212;
            --darker: #0A0A0A;
            --light: #FFFFFF;
            --gray: #2D2D2D;
            --success: #4CAF50;
            --danger: #F44336;
            --info: #2196F3;
            --shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
            --transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
            --gradient: linear-gradient(135deg, var(--primary), var(--secondary));
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--dark);
            color: var(--light);
            overflow-x: hidden;
            line-height: 1.6;
        }
        
        /* Preloader */
        .preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: var(--darker);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            transition: opacity 0.5s ease;
        }
        
        .preloader.fade-out {
            opacity: 0;
        }
        
        .loader {
            width: 50px;
            height: 50px;
            border: 5px solid var(--gray);
            border-top-color: var(--primary);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }
        
        @keyframes spin {
            to { transform: rotate(360deg); }
        }
        
        /* Header Styles */
        header {
            background-color: rgba(10, 10, 10, 0.9);
            padding: 1.2rem 3rem;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            box-shadow: var(--shadow);
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: var(--transition);
            backdrop-filter: blur(10px);
        }
        
        .logo {
            display: flex;
            align-items: center;
        }
        
        .logo img {
            height: 45px;
            transition: var(--transition);
        }
        
        .logo:hover img {
            transform: scale(1.1);
        }
        
        .nav-links {
            display: flex;
            gap: 2.5rem;
        }
        
        .nav-links a {
            color: var(--light);
            text-decoration: none;
            font-weight: 500;
            position: relative;
            padding: 0.5rem 0;
            font-size: 1.05rem;
            transition: var(--transition);
        }
        
        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 3px;
            background: var(--gradient);
            transition: var(--transition);
        }
        
        .nav-links a:hover::after {
            width: 100%;
        }
        
        .nav-links a:hover {
            color: var(--primary);
        }
        
        .cta-button {
            padding: 0.8rem 1.8rem;
            background: var(--gradient);
            color: var(--darker);
            font-weight: 600;
            border-radius: 50px;
            text-decoration: none;
            transition: var(--transition);
            box-shadow: 0 4px 15px rgba(255, 193, 7, 0.4);
            border: none;
            cursor: pointer;
            font-size: 1rem;
            display: inline-block;
        }
        
        .cta-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(255, 193, 7, 0.6);
        }
        
        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            color: var(--light);
            font-size: 1.8rem;
            cursor: pointer;
            transition: var(--transition);
        }
        
        .mobile-menu-btn:hover {
            color: var(--primary);
        }
        
        /* Hero Section */
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding: 8rem 3rem 4rem;
            position: relative;
            overflow: hidden;
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('https://images.unsplash.com/photo-1516054575922-f0b8eeadec1a?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80') no-repeat center center/cover;
        }
        
        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle, rgba(255,193,7,0.1) 0%, rgba(0,0,0,0.8) 70%);
            z-index: 1;
        }
        
        .hero-content {
            max-width: 1200px;
            margin: 0 auto;
            position: relative;
            z-index: 2;
            text-align: center;
            width: 100%;
        }
        
        .hero h1 {
            font-size: 4rem;
            font-weight: 800;
            margin-bottom: 1.5rem;
            color: var(--primary);
            font-family: 'Fredoka One', cursive;
            text-shadow: 0 3px 10px rgba(0, 0, 0, 0.5);
            line-height: 1.2;
            animation: fadeInDown 1s ease-out;
        }
        
        .hero p {
            font-size: 1.4rem;
            margin-bottom: 2.5rem;
            color: rgba(255, 255, 255, 0.9);
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
            animation: fadeInUp 1s ease-out 0.3s both;
        }
        
        .hero-image {
            width: 250px;
            margin: 0 auto 2rem;
            animation: bounce 2s infinite alternate, fadeIn 1s ease-out;
        }
        
        .hero-buttons {
            display: flex;
            justify-content: center;
            gap: 1.5rem;
            margin-top: 2rem;
            animation: fadeInUp 1s ease-out 0.6s both;
        }
        
        .secondary-button {
            padding: 0.8rem 1.8rem;
            background: transparent;
            color: var(--light);
            border: 2px solid var(--primary);
            border-radius: 50px;
            font-weight: 600;
            text-decoration: none;
            transition: var(--transition);
            display: inline-block;
        }
        
        .secondary-button:hover {
            background: rgba(255, 193, 7, 0.1);
            transform: translateY(-3px);
        }
        
        /* Floating Coins Animation */
        .floating-coins {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            pointer-events: none;
            z-index: 1;
            overflow: hidden;
        }
        
        .coin {
            position: absolute;
            width: 30px;
            height: 30px;
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="%23FFC107"><path d="M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12A10,10 0 0,1 12,2M12,4A8,8 0 0,0 4,12A8,8 0 0,0 12,20A8,8 0 0,0 20,12A8,8 0 0,0 12,4M11,7H13V11H17V13H13V17H11V13H7V11H11V7Z"/></svg>');
            background-size: contain;
            opacity: 0.6;
            animation: float linear infinite;
        }
        
        @keyframes float {
            0% {
                transform: translateY(0) rotate(0deg);
                opacity: 0;
            }
            10% {
                opacity: 0.6;
            }
            100% {
                transform: translateY(-100vh) rotate(360deg);
                opacity: 0;
            }
        }
        
        /* Features Section */
        .features {
            padding: 6rem 3rem;
            background-color: var(--darker);
            position: relative;
            overflow: hidden;
        }
        
        .features::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none"><path fill="rgba(255,193,7,0.03)" d="M0,0 L100,0 L100,100 Q50,80 0,100 L0,0 Z"></path></svg>');
            background-size: 100% auto;
            background-repeat: no-repeat;
            background-position: bottom;
            z-index: 0;
        }
        
        .section-title {
            text-align: center;
            margin-bottom: 4rem;
            position: relative;
            z-index: 1;
        }
        
        .section-title h2 {
            font-size: 2.8rem;
            color: var(--primary);
            font-family: 'Fredoka One', cursive;
            margin-bottom: 1rem;
        }
        
        .section-title p {
            color: rgba(255, 255, 255, 0.7);
            font-size: 1.2rem;
            max-width: 700px;
            margin: 0 auto;
        }
        
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2.5rem;
            max-width: 1200px;
            margin: 0 auto;
            position: relative;
            z-index: 1;
        }
        
        .feature-card {
            background: rgba(45, 45, 45, 0.6);
            padding: 2.5rem 2rem;
            border-radius: 15px;
            text-align: center;
            transition: var(--transition);
            backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 193, 7, 0.1);
            box-shadow: var(--shadow);
        }
        
        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
            border-color: rgba(255, 193, 7, 0.3);
            background: rgba(45, 45, 45, 0.8);
        }
        
        .feature-icon {
            font-size: 3.5rem;
            margin-bottom: 1.5rem;
            color: var(--primary);
            display: inline-block;
            transition: var(--transition);
        }
        
        .feature-card:hover .feature-icon {
            transform: scale(1.1);
        }
        
        .feature-card h3 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            color: var(--light);
        }
        
        .feature-card p {
            color: rgba(255, 255, 255, 0.7);
        }
        
        /* How to Play Section */
        .how-to-play {
            padding: 6rem 3rem;
            background-color: var(--dark);
            position: relative;
        }
        
        .steps-container {
            max-width: 1000px;
            margin: 0 auto;
            position: relative;
        }
        
        .step-line {
            position: absolute;
            left: 40px;
            top: 0;
            bottom: 0;
            width: 4px;
            background: linear-gradient(to bottom, var(--primary), var(--secondary));
            z-index: 0;
        }
        
        .steps {
            position: relative;
            z-index: 1;
        }
        
        .step {
            display: flex;
            margin-bottom: 3rem;
            position: relative;
            padding-left: 100px;
            align-items: center;
        }
        
        .step-number {
            position: absolute;
            left: 0;
            width: 80px;
            height: 80px;
            background: var(--gradient);
            color: var(--darker);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            font-weight: 700;
            font-family: 'Fredoka One', cursive;
            box-shadow: 0 5px 15px rgba(255, 193, 7, 0.4);
            z-index: 1;
        }
        
        .step-content {
            background: rgba(45, 45, 45, 0.7);
            padding: 2rem;
            border-radius: 15px;
            flex: 1;
            box-shadow: var(--shadow);
            border-left: 5px solid var(--primary);
            transition: var(--transition);
            backdrop-filter: blur(5px);
        }
        
        .step:hover .step-content {
            transform: translateX(10px);
            background: rgba(45, 45, 45, 0.9);
        }
        
        .step-content h3 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            color: var(--primary);
        }
        
        .step-content p {
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 1rem;
        }
        
        .step-image {
            width: 200px;
            height: 150px;
            border-radius: 10px;
            object-fit: cover;
            margin-left: 2rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            transition: var(--transition);
        }
        
        .step:hover .step-image {
            transform: scale(1.05);
        }
        
        /* Testimonials Section */
        .testimonials {
            padding: 6rem 3rem;
            background-color: var(--darker);
            position: relative;
            overflow: hidden;
        }
        
        .testimonials::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none"><path fill="rgba(255,193,7,0.03)" d="M0,100 L100,100 L100,0 Q50,20 0,0 L0,100 Z"></path></svg>');
            background-size: 100% auto;
            background-repeat: no-repeat;
            background-position: top;
            z-index: 0;
        }
        
        .testimonial-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2.5rem;
            max-width: 1200px;
            margin: 0 auto;
            position: relative;
            z-index: 1;
        }
        
        .testimonial-card {
            background: rgba(45, 45, 45, 0.7);
            padding: 2.5rem;
            border-radius: 15px;
            box-shadow: var(--shadow);
            position: relative;
            transition: var(--transition);
            backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 193, 7, 0.1);
        }
        
        .testimonial-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
            border-color: rgba(255, 193, 7, 0.3);
        }
        
        .testimonial-card::before {
            content: '"';
            position: absolute;
            top: 20px;
            left: 20px;
            font-size: 5rem;
            color: rgba(255, 193, 7, 0.1);
            font-family: serif;
            line-height: 1;
            z-index: -1;
        }
        
        .testimonial-content {
            margin-bottom: 2rem;
            font-style: italic;
            color: rgba(255, 255, 255, 0.9);
            position: relative;
            z-index: 1;
        }
        
        .testimonial-author {
            display: flex;
            align-items: center;
        }
        
        .testimonial-author img {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            margin-right: 1.5rem;
            object-fit: cover;
            border: 3px solid var(--primary);
            transition: var(--transition);
        }
        
        .testimonial-card:hover .testimonial-author img {
            transform: scale(1.1);
        }
        
        .author-info h4 {
            color: var(--light);
            margin-bottom: 0.3rem;
            font-size: 1.2rem;
        }
        
        .author-info p {
            color: var(--primary);
            font-size: 0.9rem;
        }
        
        /* Withdrawals Section */
        .withdrawals {
            padding: 6rem 3rem;
            background-color: var(--dark);
            text-align: center;
        }
        
        .withdrawal-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            max-width: 1000px;
            margin: 3rem auto 0;
        }
        
        .withdrawal-card {
            background: rgba(45, 45, 45, 0.7);
            padding: 2rem;
            border-radius: 15px;
            box-shadow: var(--shadow);
            transition: var(--transition);
            border: 1px solid rgba(255, 193, 7, 0.1);
            backdrop-filter: blur(5px);
        }
        
        .withdrawal-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
            border-color: rgba(255, 193, 7, 0.3);
        }
        
        .withdrawal-amount {
            font-size: 2rem;
            font-weight: 700;
            color: var(--success);
            margin-bottom: 1rem;
        }
        
        .withdrawal-method {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.5rem;
        }
        
        .withdrawal-method img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 1rem;
            object-fit: cover;
        }
        
        .withdrawal-method span {
            font-weight: 500;
        }
        
        .withdrawal-info {
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.9rem;
        }
        
        /* CTA Section */
        .cta-section {
            padding: 6rem 3rem;
            text-align: center;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: var(--darker);
            position: relative;
            overflow: hidden;
        }
        
        .cta-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none"><path fill="rgba(0,0,0,0.05)" d="M0,0 L100,0 L100,100 Q50,80 0,100 L0,0 Z"></path></svg>');
            background-size: 100% auto;
            background-repeat: no-repeat;
            background-position: bottom;
            z-index: 0;
        }
        
        .cta-content {
            position: relative;
            z-index: 1;
            max-width: 800px;
            margin: 0 auto;
        }
        
        .cta-section h2 {
            font-size: 3rem;
            margin-bottom: 1.5rem;
            font-family: 'Fredoka One', cursive;
        }
        
        .cta-section p {
            font-size: 1.3rem;
            margin-bottom: 2.5rem;
            opacity: 0.9;
        }
        
        .cta-buttons {
            display: flex;
            justify-content: center;
            gap: 1.5rem;
        }
        
        .dark-button {
            padding: 0.8rem 1.8rem;
            background: var(--darker);
            color: var(--light);
            border-radius: 50px;
            font-weight: 600;
            text-decoration: none;
            transition: var(--transition);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            display: inline-block;
        }
        
        .dark-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
        }
        
        /* Footer */
        footer {
            background-color: var(--darker);
            padding: 4rem 3rem 2rem;
            position: relative;
        }
        
        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 3rem;
        }
        
        .footer-logo {
            width: 150px;
            margin-bottom: 1.5rem;
        }
        
        .footer-about p {
            color: rgba(255, 255, 255, 0.7);
            margin-bottom: 1.5rem;
        }
        
        .social-links {
            display: flex;
            gap: 1rem;
        }
        
        .social-link {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--light);
            text-decoration: none;
            transition: var(--transition);
        }
        
        .social-link:hover {
            background: var(--primary);
            color: var(--darker);
            transform: translateY(-3px);
        }
        
        .footer-links h3 {
            color: var(--primary);
            font-size: 1.3rem;
            margin-bottom: 1.5rem;
            font-weight: 600;
        }
        
        .footer-links ul {
            list-style: none;
        }
        
        .footer-links li {
            margin-bottom: 0.8rem;
        }
        
        .footer-links a {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            transition: var(--transition);
        }
        
        .footer-links a:hover {
            color: var(--primary);
            padding-left: 5px;
        }
        
        .footer-contact p {
            display: flex;
            align-items: center;
            color: rgba(255, 255, 255, 0.7);
            margin-bottom: 1rem;
        }
        
        .footer-contact i {
            margin-right: 0.8rem;
            color: var(--primary);
            width: 20px;
            text-align: center;
        }
        
        .footer-bottom {
            text-align: center;
            padding-top: 3rem;
            margin-top: 3rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: rgba(255, 255, 255, 0.5);
            font-size: 0.9rem;
        }
        
        /* Floating Action Button */
        .fab {
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            width: 60px;
            height: 60px;
            background: var(--gradient);
            color: var(--darker);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            box-shadow: 0 5px 20px rgba(255, 193, 7, 0.5);
            z-index: 100;
            transition: var(--transition);
            text-decoration: none;
        }
        
        .fab:hover {
            transform: scale(1.1) translateY(-5px);
            box-shadow: 0 8px 25px rgba(255, 193, 7, 0.7);
        }
        
        /* Responsive Styles */
        @media (max-width: 1200px) {
            .hero h1 {
                font-size: 3.5rem;
            }
            
            .step-image {
                width: 180px;
                height: 135px;
            }
        }
        
        @media (max-width: 992px) {
            .hero h1 {
                font-size: 3rem;
            }
            
            .hero p {
                font-size: 1.2rem;
            }
            
            .section-title h2 {
                font-size: 2.5rem;
            }
            
            .step {
                flex-direction: column;
                padding-left: 0;
                padding-top: 100px;
                text-align: center;
            }
            
            .step-number {
                top: 0;
                left: 50%;
                transform: translateX(-50%);
            }
            
            .step-content {
                margin-bottom: 1.5rem;
            }
            
            .step-image {
                margin-left: 0;
                width: 100%;
                max-width: 300px;
            }
            
            .step-line {
                left: 50%;
                transform: translateX(-50%);
                height: calc(100% - 80px);
                top: 80px;
            }
        }
        
        @media (max-width: 768px) {
            header {
                padding: 1rem;
            }
            
            .nav-links {
                position: fixed;
                top: 80px;
                left: 0;
                width: 100%;
                background-color: rgba(10, 10, 10, 0.95);
                flex-direction: column;
                align-items: center;
                padding: 1.5rem 0;
                gap: 1.5rem;
                box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
                transform: translateY(-150%);
                transition: var(--transition);
                z-index: 999;
                backdrop-filter: blur(10px);
            }
            
            .nav-links.active {
                transform: translateY(0);
            }
            
            .mobile-menu-btn {
                display: block;
            }
            
            .hero {
                padding: 7rem 1.5rem 3rem;
            }
            
            .hero h1 {
                font-size: 2.5rem;
            }
            
            .hero p {
                font-size: 1.1rem;
            }
            
            .hero-buttons {
                flex-direction: column;
                gap: 1rem;
            }
            
            .section-title h2 {
                font-size: 2.2rem;
            }
            
            .cta-section h2 {
                font-size: 2.5rem;
            }
            
            .cta-buttons {
                flex-direction: column;
                gap: 1rem;
            }
            
            .features, .how-to-play, .testimonials, .withdrawals, .cta-section {
                padding: 4rem 1.5rem;
            }
        }
        
        @media (max-width: 480px) {
            .hero h1 {
                font-size: 2rem;
            }
            
            .hero-image {
                width: 180px;
            }
            
            .section-title h2 {
                font-size: 1.8rem;
            }
            
            .cta-section h2 {
                font-size: 2rem;
            }
            
            .footer-content {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <!-- Preloader -->
    <div class="preloader" id="preloader">
        <div class="loader"></div>
    </div>
    
    <!-- Header -->
    <header>
        <a href="https://selimdemo.site/" class="logo">
            <img src="https://selimdemo.site/img/logo_head.png" alt="Chicken Road Logo">
        </a>
        
        <nav class="nav-links">
            <a href="#features">Features</a>
            <a href="#how-to-play">How to Play</a>
            <a href="#testimonials">Winners</a>
            <a href="#withdrawals">Withdrawals</a>
        </nav>
        
        <a href="https://selimdemo.site/indexlogin" class="cta-button">Play Now</a>
        
        <button class="mobile-menu-btn" id="menuBtn"><i class="fas fa-bars"></i></button>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <!-- Floating coins animation -->
        <div class="floating-coins" id="floatingCoins"></div>
        
        <div class="hero-content">
            <img src="https://selimdemo.site/img/logo.png" alt="Chicken Road" class="hero-image">
            <h1>Chicken Road Adventure!</h1>
            <p>Dodge traffic, collect coins, and win real money in the most exciting chicken crossing game! Play now and get ₹100 free bonus.</p>
            
            <div class="hero-buttons">
                <a href="https://selimdemo.site/indexlogin" class="cta-button">Play Now - It's Free!</a>
                <a href="#how-to-play" class="secondary-button">How to Play</a>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features" id="features">
        <div class="section-title">
            <h2>Why You'll Love Chicken Road</h2>
            <p>Join thousands of players winning real cash every day</p>
        </div>
        
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon"><i class="fas fa-money-bill-wave"></i></div>
                <h3>Real Cash Prizes</h3>
                <p>Win actual money that you can withdraw to your bank account or digital wallet. No fake points - real rewards!</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon"><i class="fas fa-bolt"></i></div>
                <h3>Instant Withdrawals</h3>
                <p>Get your winnings in minutes with our lightning-fast withdrawal processing. No waiting, no hassles.</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon"><i class="fas fa-gamepad"></i></div>
                <h3>Addictive Gameplay</h3>
                <p>Simple tap controls with increasingly challenging levels that keep you coming back for more.</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon"><i class="fas fa-trophy"></i></div>
                <h3>Daily Tournaments</h3>
                <p>Compete in special events with big prize pools and exclusive rewards for top players.</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon"><i class="fas fa-lock"></i></div>
                <h3>Secure & Fair</h3>
                <p>Provably fair system ensures all games are 100% transparent and random. Your security is our priority.</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon"><i class="fas fa-mobile-alt"></i></div>
                <h3>Play Anywhere</h3>
                <p>Enjoy the game on mobile, tablet, or desktop with seamless sync across all your devices.</p>
            </div>
        </div>
    </section>

    <!-- How to Play Section -->
    <section class="how-to-play" id="how-to-play">
        <div class="section-title">
            <h2>How to Play & Win</h2>
            <p>Follow these simple steps to start earning real money</p>
        </div>
        
        <div class="steps-container">
            <div class="step-line"></div>
            
            <div class="steps">
                <div class="step">
                    <div class="step-number">1</div>
                    <div class="step-content">
                        <h3>Sign Up & Get Bonus</h3>
                        <p>Create your free account in seconds and receive ₹100 bonus to start playing immediately. No deposit required!</p>
                    </div>
                    <img src="https://images.unsplash.com/photo-1556740738-b6a63e27c4df?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="Sign Up" class="step-image">
                </div>
                
                <div class="step">
                    <div class="step-number">2</div>
                    <div class="step-content">
                        <h3>Learn the Controls</h3>
                        <p>Tap to jump over obstacles, swipe to change lanes. Avoid cars, collect coins, and reach the finish line safely.</p>
                        <p>Complete daily challenges for extra rewards!</p>
                    </div>
                    <img src="https://images.unsplash.com/photo-1542751371-adc38448a05e?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="Game Controls" class="step-image">
                </div>
                
                <div class="step">
                    <div class="step-number">3</div>
                    <div class="step-content">
                        <h3>Earn Coins & Power-ups</h3>
                        <p>Every successful crossing earns you coins. Use them to buy power-ups, skins, and special abilities for your chicken.</p>
                        <p>Unlock rare chickens with special skills!</p>
                    </div>
                    <img src="https://images.unsplash.com/photo-1555774698-0b77e0d5fac6?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="Power-ups" class="step-image">
                </div>
                
                <div class="step">
                    <div class="step-number">4</div>
                    <div class="step-content">
                        <h3>Withdraw Your Winnings</h3>
                        <p>Convert your coins to real money and withdraw instantly to your bank, UPI, or digital wallet. Minimum withdrawal just ₹100!</p>
                    </div>
                    <img src="https://images.unsplash.com/photo-1579621970563-ebec7560ff3e?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="Withdrawals" class="step-image">
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials" id="testimonials">
        <div class="section-title">
            <h2>Our Happy Winners</h2>
            <p>See what our players are saying about Chicken Road</p>
        </div>
        
        <div class="testimonial-grid">
            <div class="testimonial-card">
                <div class="testimonial-content">
                    "I've won over ₹25,000 playing Chicken Road in just 2 weeks! The game is so addictive and the payouts are real. Already withdrawn ₹15,000 to my bank account. Highly recommend!"
                </div>
                <div class="testimonial-author">
                    <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Rahul K.">
                    <div class="author-info">
                        <h4>Rahul K.</h4>
                        <p>Mumbai • Level 58 Player</p>
                    </div>
                </div>
            </div>
            
            <div class="testimonial-card">
                <div class="testimonial-content">
                    "Never thought a simple chicken game could be this exciting! The daily challenges keep me engaged and I've made some good pocket money. Withdrawal process is super quick - got my money in 15 minutes!"
                </div>
                <div class="testimonial-author">
                    <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Priya M.">
                    <div class="author-info">
                        <h4>Priya M.</h4>
                        <p>Delhi • 3 Months Playing</p>
                    </div>
                </div>
            </div>
            
            <div class="testimonial-card">
                <div class="testimonial-content">
                    "The best part is being able to play anywhere. I use my commute time to play and earn. Won ₹8,500 in a tournament last week! Customer support is excellent too - they helped me instantly when I had an issue."
                </div>
                <div class="testimonial-author">
                    <img src="https://randomuser.me/api/portraits/men/67.jpg" alt="Vikram S.">
                    <div class="author-info">
                        <h4>Vikram S.</h4>
                        <p>Bangalore • Tournament Winner</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Withdrawals Section -->
    <section class="withdrawals" id="withdrawals">
        <div class="section-title">
            <h2>Recent Withdrawals</h2>
            <p>Real players, real winnings - paid out instantly</p>
        </div>
        
        <div class="withdrawal-cards">
            <div class="withdrawal-card">
                <div class="withdrawal-amount">₹12,500</div>
                <div class="withdrawal-method">
                    <img src="https://logo.clearbit.com/paytm.com" alt="Paytm">
                    <span>Paytm</span>
                </div>
                <div class="withdrawal-info">
                    <p>Rohit P. from Pune</p>
                    <p>Completed 2 minutes ago</p>
                </div>
            </div>
            
            <div class="withdrawal-card">
                <div class="withdrawal-amount">₹8,200</div>
                <div class="withdrawal-method">
                    <img src="https://logo.clearbit.com/phonepe.com" alt="PhonePe">
                    <span>PhonePe</span>
                </div>
                <div class="withdrawal-info">
                    <p>Anjali M. from Delhi</p>
                    <p>Completed 15 minutes ago</p>
                </div>
            </div>
            
            <div class="withdrawal-card">
                <div class="withdrawal-amount">₹18,750</div>
                <div class="withdrawal-method">
                    <img src="https://logo.clearbit.com/googlepay.com" alt="Google Pay">
                    <span>Google Pay</span>
                </div>
                <div class="withdrawal-info">
                    <p>Sanjay K. from Bangalore</p>
                    <p>Completed 1 hour ago</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="cta-content">
            <h2>Ready to Start Winning?</h2>
            <p>Join over 500,000 players who are already having fun and earning money with Chicken Road!</p>
            
            <div class="cta-buttons">
                <a href="https://selimdemo.site/indexlogin" class="cta-button">Play Now for Free</a>
                <a href="#how-to-play" class="dark-button">Learn How to Play</a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="footer-content">
            <div class="footer-about">
                <img src="https://selimdemo.site/img/logo_head.png" alt="Chicken Road Logo" class="footer-logo">
                <p>Chicken Road is the most exciting skill-based game where you can win real money by crossing roads safely. Play now and start earning!</p>
                
                <div class="social-links">
                    <a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="social-link"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
            
            <div class="footer-links">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="#features">Features</a></li>
                    <li><a href="#how-to-play">How to Play</a></li>
                    <li><a href="#testimonials">Winner Stories</a></li>
                    <li><a href="#withdrawals">Withdrawals</a></li>
                    <li><a href="#">FAQ</a></li>
                </ul>
            </div>
            
            <div class="footer-links">
                <h3>Legal</h3>
                <ul>
                    <li><a href="#">Terms of Service</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Refund Policy</a></li>
                    <li><a href="#">Responsible Gaming</a></li>
                </ul>
            </div>
            
            <div class="footer-contact">
                <h3>Contact Us</h3>
                <p><i class="fas fa-envelope"></i> support@chickenroad.com</p>
                <p><i class="fas fa-phone"></i> +91 9219565158</p>
                <p><i class="fas fa-map-marker-alt"></i> Mumbai, India</p>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p>&copy; 2025 Chicken Road Game. All Rights Reserved.</p>
        </div>
    </footer>
    
    <!-- Floating Action Button -->
    <a href="https://selimdemo.site/indexlogin" class="fab" title="Play Now">
        <i class="fas fa-gamepad"></i>
    </a>

    <!-- JavaScript -->
    <script>
        // Preloader
        window.addEventListener('load', function() {
            setTimeout(function() {
                document.getElementById('preloader').classList.add('fade-out');
                setTimeout(function() {
                    document.getElementById('preloader').style.display = 'none';
                }, 500);
            }, 1000);
        });
        
        // Mobile menu toggle
        const menuBtn = document.getElementById('menuBtn');
        const navLinks = document.querySelector('.nav-links');
        
        menuBtn.addEventListener('click', () => {
            navLinks.classList.toggle('active');
            menuBtn.innerHTML = navLinks.classList.contains('active') ? '<i class="fas fa-times"></i>' : '<i class="fas fa-bars"></i>';
        });
        
        // Close mobile menu when clicking on a link
        document.querySelectorAll('.nav-links a').forEach(link => {
            link.addEventListener('click', () => {
                navLinks.classList.remove('active');
                menuBtn.innerHTML = '<i class="fas fa-bars"></i>';
            });
        });
        
        // Header scroll effect
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                document.querySelector('header').style.background = 'rgba(10, 10, 10, 0.97)';
                document.querySelector('header').style.padding = '0.8rem 1rem';
            } else {
                document.querySelector('header').style.background = 'rgba(10, 10, 10, 0.9)';
                document.querySelector('header').style.padding = '1.2rem 3rem';
            }
        });
        
        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    window.scrollTo({
                        top: target.offsetTop - 80,
                        behavior: 'smooth'
                    });
                }
            });
        });
        
        // Floating coins animation
        function createCoins() {
            const coinsContainer = document.getElementById('floatingCoins');
            const coinsCount = 15;
            
            for (let i = 0; i < coinsCount; i++) {
                const coin = document.createElement('div');
                coin.classList.add('coin');
                
                // Random position
                const posX = Math.random() * 100;
                const posY = Math.random() * 100 + 100; // Start below visible area
                
                // Random size
                const size = Math.random() * 20 + 15;
                
                // Random animation duration
                const duration = Math.random() * 10 + 10;
                
                // Random delay
                const delay = Math.random() * 5;
                
                coin.style.left = `${posX}%`;
                coin.style.top = `${posY}%`;
                coin.style.width = `${size}px`;
                coin.style.height = `${size}px`;
                coin.style.animationDuration = `${duration}s`;
                coin.style.animationDelay = `${delay}s`;
                
                coinsContainer.appendChild(coin);
            }
        }
        
        // Create coins when page loads
        window.addEventListener('load', createCoins);
        
        // Rotate withdrawal cards
        const withdrawalData = [
            {
                amount: "₹15,200",
                method: "Paytm",
                methodLogo: "https://logo.clearbit.com/paytm.com",
                name: "Amit S. from Hyderabad",
                time: "5 minutes ago"
            },
            {
                amount: "₹7,800",
                method: "PhonePe",
                methodLogo: "https://logo.clearbit.com/phonepe.com",
                name: "Neha P. from Chennai",
                time: "25 minutes ago"
            },
            {
                amount: "₹22,150",
                method: "Google Pay",
                methodLogo: "https://logo.clearbit.com/googlepay.com",
                name: "Rajesh M. from Kolkata",
                time: "1 hour ago"
            },
            {
                amount: "₹9,500",
                method: "Bank Transfer",
                methodLogo: "https://logo.clearbit.com/axisbank.com",
                name: "Priyanka D. from Pune",
                time: "2 hours ago"
            }
        ];
        
        let currentWithdrawal = 0;
        
        function rotateWithdrawals() {
            const cards = document.querySelectorAll('.withdrawal-card');
            const data = withdrawalData[currentWithdrawal];
            
            // Animate out
            cards.forEach(card => {
                card.style.transform = 'translateY(20px)';
                card.style.opacity = '0';
            });
            
            setTimeout(() => {
                // Update content
                cards[0].querySelector('.withdrawal-amount').textContent = data.amount;
                cards[0].querySelector('.withdrawal-method img').src = data.methodLogo;
                cards[0].querySelector('.withdrawal-method span').textContent = data.method;
                cards[0].querySelector('.withdrawal-info p:first-child').textContent = data.name;
                cards[0].querySelector('.withdrawal-info p:last-child').textContent = `Completed ${data.time}`;
                
                // Move first item to last
                withdrawalData.push(withdrawalData.shift());
                
                // Animate in
                cards.forEach(card => {
                    card.style.transform = 'translateY(0)';
                    card.style.opacity = '1';
                });
            }, 300);
        }
        
        // Rotate every 8 seconds
        setInterval(rotateWithdrawals, 8000);
        
        // Initialize first rotation after 8 seconds
        setTimeout(rotateWithdrawals, 8000);
    </script>
</body>
</html>