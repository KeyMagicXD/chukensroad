<?php
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: /login");
    exit;
}
?>
<html lang="en" style="font-size: 37.5px;">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="icon" href="icon.jpeg">
     <?php include 'head.php';?>
    <link href="css/app.46643acf.css" rel="preload" as="style">
    <link href="css/chunk-vendors.cf06751b.css" rel="preload" as="style">
  
    <link href="js/chunk-vendors.824d6eef.js" rel="preload" as="script">
    <link href="css/chunk-vendors.cf06751b.css" rel="stylesheet">
    <link href="css/app.46643acf.css" rel="stylesheet">
     <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>spl7casinoworld</title>
    
    <style>
        /* Fade-in effect for the whole page */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #fff;
            opacity: 0;
            animation: fadeIn 1s forwards; /* Fade-in animation */
        }

        @keyframes fadeIn {
            to {
                opacity: 1;
            }
        }

        header {
            background-image: url('https://img.b112j.com/upload/h5Announcement/image_172707.jpg'); /* Add your image URL here */
            background-size: 100%; /* Cover the entire header */
            background-position: center; /* Center the image */
            background-repeat: no-repeat; /* Prevent the image from repeating */
            color: black; /* Black text */
            padding: 15px 0; /* Vertical padding */
            text-align: center; /* Centered text */
            height: 400px; /* Set a height for the header */
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            padding: 10px;
        }

        .game-item {
            background: white;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            width: 150px; /* Fixed width for cards */
            height: 200px; /* Fixed height for cards */
            margin: 5px;
            overflow: hidden;
            transition: transform 0.3s, box-shadow 0.3s; /* Smooth transformation */
            position: relative; /* Position relative for absolute positioning of the image */
            transform: scale(1); /* Initial scale */
            animation: slideIn 0.5s; /* Slide-in animation for each card */
        }

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

        .game-image {
            position: absolute; /* Absolute positioning for full coverage */
            top: 0; /* Align to the top */
            left: 0; /* Align to the left */
            width: 100%; /* Ensure the image fills the card width */
            height: 100%; /* Ensure the image fills the card height */
            object-fit: cover; /* Maintain aspect ratio while covering the area */
            object-position: center; /* Center the image within the card */
            transition: transform 0.3s; /* Smooth image transform */
        }

        .game-item:hover {
            box-shadow: 0 4px 20px rgba(0,0,0,0.3);
            transform: scale(1.1) rotate(2deg); /* Slightly enlarge and rotate the card */
        }

        .game-item:hover .game-image {
            transform: scale(1.1); /* Slightly enlarge the image on hover */
        }

        footer {
            text-align: center;
            padding: 15px;
            background-color: #007BFF;
            color: white;
            position: relative;
            bottom: 0;
            width: 100%;
        }

      @media (max-width: 600px) {
    header {
        padding: 0; /* Remove top and bottom padding */
        height: 175px; /* Adjust height as needed */
    }
    footer {
        font-size: 16px;
        padding: 10px 0;
    }
    .game-item {
        flex: 1 1 40%; /* Two items per row on mobile view */
        margin: 7px; /* Adjust margin for better spacing */
        border-radius: 10px; /* Add border radius for rounded corners */
    }
    .container {
        justify-content: space-between; /* Space between items */
    }
}

    </style>
    <style>
        /* Fade-in effect for the whole page */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #fff;
            opacity: 0;
            animation: fadeIn 1s forwards; /* Fade-in animation */
        }

        @keyframes fadeIn {
            to {
                opacity: 1;
            }
        }

        header {
            background-image: url('https://img.b112j.com/upload/h5Announcement/image_172707.jpg'); /* Add your image URL here */
            background-size: 100%; /* Cover the entire header */
            background-position: center; /* Center the image */
            background-repeat: no-repeat; /* Prevent the image from repeating */
            color: black; /* Black text */
            padding: 15px 0; /* Vertical padding */
            text-align: center; /* Centered text */
            height: 400px; /* Set a height for the header */
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            padding: 10px;
        }

        .game-item {
            background: white;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            width: 150px; /* Fixed width for cards */
            height: 200px; /* Fixed height for cards */
            margin: 5px;
            overflow: hidden;
            transition: transform 0.3s, box-shadow 0.3s; /* Smooth transformation */
            position: relative; /* Position relative for absolute positioning of the image */
            transform: scale(1); /* Initial scale */
            animation: slideIn 0.5s; /* Slide-in animation for each card */
        }

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

        .game-image {
            position: absolute; /* Absolute positioning for full coverage */
            top: 0; /* Align to the top */
            left: 0; /* Align to the left */
            width: 100%; /* Ensure the image fills the card width */
            height: 100%; /* Ensure the image fills the card height */
            object-fit: cover; /* Maintain aspect ratio while covering the area */
            object-position: center; /* Center the image within the card */
            transition: transform 0.3s; /* Smooth image transform */
        }

        .game-item:hover {
            box-shadow: 0 4px 20px rgba(0,0,0,0.3);
            transform: scale(1.1) rotate(2deg); /* Slightly enlarge and rotate the card */
        }

        .game-item:hover .game-image {
            transform: scale(1.1); /* Slightly enlarge the image on hover */
        }

        footer {
            text-align: center;
            padding: 15px;
            background-color: #007BFF;
            color: white;
            position: relative;
            bottom: 0;
            width: 100%;
        }

      @media (max-width: 600px) {
    header {
        padding: 0; /* Remove top and bottom padding */
        height: 175px; /* Adjust height as needed */
    }
    footer {
        font-size: 16px;
        padding: 10px 0;
    }
    .game-item {
        flex: 1 1 40%; /* Two items per row on mobile view */
        margin: 7px; /* Adjust margin for better spacing */
        border-radius: 10px; /* Add border radius for rounded corners */
    }
    .container {
        justify-content: space-between; /* Space between items */
    }
}

    </style>
</head>

<body style="font-size: 36px;"><noscript><strong>We're sorry but default doesn't work properly without JavaScript
            enabled. Please enable it to continue.</strong></noscript>
  <?php
    session_start();
?>
<header>
   
</header>

<div class="container" id="game-container">
    <!-- Game items will be dynamically inserted here -->
</div>
        <div data-v-405e9a63="" data-v-0dfb1948="" class="footer">
            <ul data-v-405e9a63="" class="nav_foot">
                <li data-v-405e9a63="" onclick="window.location.href='/indexlogin'" class=""><img data-v-405e9a63=""
                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAAFEmlUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS42LWMxNDIgNzkuMTYwOTI0LCAyMDE3LzA3LzEzLTAxOjA2OjM5ICAgICAgICAiPiA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtbG5zOmRjPSJodHRwOi8vcHVybC5vcmcvZGMvZWxlbWVudHMvMS4xLyIgeG1sbnM6cGhvdG9zaG9wPSJodHRwOi8vbnMuYWRvYmUuY29tL3Bob3Rvc2hvcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ0MgKFdpbmRvd3MpIiB4bXA6Q3JlYXRlRGF0ZT0iMjAyMC0wNy0wNlQxMToxOTozOCswODowMCIgeG1wOk1vZGlmeURhdGU9IjIwMjAtMDctMDZUMTE6MzE6NDErMDg6MDAiIHhtcDpNZXRhZGF0YURhdGU9IjIwMjAtMDctMDZUMTE6MzE6NDErMDg6MDAiIGRjOmZvcm1hdD0iaW1hZ2UvcG5nIiBwaG90b3Nob3A6Q29sb3JNb2RlPSIzIiBwaG90b3Nob3A6SUNDUHJvZmlsZT0ic1JHQiBJRUM2MTk2Ni0yLjEiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6NmY2M2YzNjUtMzkyZS1mMzRj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"
                    alt=""><span data-v-405e9a63="">Home</span></li>
                  	<li data-v-405e9a63="" onclick="window.location.href='/api/ok'"  class="">
					<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABcAAAAXCAYAAADgKtSgAAAACXBIWXMAAAsTAAALEwEAmpwYAAAB6klEQVR4nO1Uv2tUQRB+RpQIYgpBIYgpBAuRgAhiIWgTghJRhAMhhQpy4skdzvft3Tuw2FSaMr3kDxAFIZ11LIIhXSIW/igihEAIRkUlgadMnDuW574XzlYHBt7OfN+3szuzL0n+Wy9Wr9cPkDydpunRWJ7kkOYV15MwgOMAlkj+JJkBAMlqx22dWX5R8TuKViqV3SSnjdSrP/be95VVfC8Aa8Vfi8QAfMrnAdwtE38ZgK9Xq9U9JGcjwusAbtr1fAtys2Xicx2giFxKkmQXgBcR8RWSlwGMk/wSxOcKxVut1hEAywb8TvKDfX+ObLCqJwjWy8ovqnqM5EXn3DDJjYD0huRJAAsWe+S930vyebDZhvIAXAUw+oc4yQltkIicBTBCctPEZ7QinQZb3zb8lAlvGv6CnhbAg5j4diUA1kie0IYFszwfVPkDwCvLZdbYU8Fpn8XEt+/X/KO9wImy2QbgnXPHrMGd+LvYU89yxKV2u33QOXcfwGTeNd5sNgcBvM9tmqVpOhA281xBdWnhaP3mPYzxROR8FyQidyKg1yKyr0y8VqvtB/A2wq11Qc65K7kr2RKRM2XCQWE6XVs58WtdgP5wADwJHs+tpAcjecN4yn+qP8AY6NBOV1Fk3vv+RqNx+G+4yb9lvwCpYwtfJTXi8gAAAABJRU5ErkJggg==">
							    <span data-v-405e9a63="">Games</span></li>
                          <li data-v-405e9a63="" onclick="window.location.href='/search'" class="active"><img data-v-405e9a63="" src="data:image/png;base64,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" alt=""><span data-v-405e9a63="">Search</span></a></li>
                         <li data-v-405e9a63="" onclick="window.location.href='/win'" class=""><img data-v-405e9a63=""
                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAADF0lEQVRoQ+1aO2gUURQ9Nx8mYCfYiR+w0EbsTMD4qyVqwA/aGBG7FUdm3jYBYxOYeS+OmE6IBoL4Az9gk8L4BbVSUlkIiXY2dkKEZK9MSGR8O7PzdXeKmXLn3nvOub/d91hCwse2bU5oWqiZlJKSBExk5AeqhCRJZwubqiJRySl9a3WKYM6Oa3KnSkjRKc0Zr6pIzgQW7h5akbDd3alZSsqlElJ4b0QETFORTwD2BON0dXVtdRzne/CzsrRWvV7f0mg0vmm6P/utdQfAOU3IoOM470oqZF+j0XirCZn2hQgAjvbikZTyZBmF2Lb9EMAJjW+dhBBDzPxMb1EiOu+6rl+t1acMrSWEGGHm2yFcj66eRyzLek1E+zWDX8x8RCn1qgxCLMs6SETPAWwI8mTmN0qpA+tCjhPR45DFsUBEV1zXfdrJigghjjHzdQDbdY7MPKyUevL3hGjb9n0ApyK2oD9cg+1auRpOK+wHUsrTvv1fIUKIfmZ+3yGymWCJaMB13Q//CFmblb1EdAvA7kyR2+c0z8wXlVIf1yGbLh9M09zY09NzE8DZ9vFKhXR3eXn5kud5P4NekbcolmVdBXA4ZJulQi3K2N9OAOaUUtfCYsZeB5mmuaO7u/vQmqjVwWrXw8z+AppbWVl56Xne11a4sUKCzrZtLwDY1iYhi1LKpnUbhZ1KSNQ36/8Qpv+yiMNIJaRWqxl9fX1f2lCVxaWlpZ2Tk5O/4wREbq04R38JENFYnF2e98w8FjXUhbTWehAhhMfMl/OQjSREdMN1XTNt7FStpQ1+0zkmLXiI/bSUciRLnMxCfLCwQ1kWEr4PM08ppS5k9c8lxAe1LOsMEY0C2JWFBDPPMrM3MTExm8U/87CHgdVqtU2GYYwS0TCAzQkJvWDme0qpqYT2Lc1yVyQY3V/PhmEMEFE/gAEAQxr6PICZ3t7emfHx8R9FCCi0ImGEwtZ0lrWaVGyhFQmCVkKSlkCzqyoSl7iqteIyFPG+aq24xFWtFZehqrVaZKjoa9Skf9cIo5Rr2CshEVWuKhK8xM6yLMrUWn8AMZSO49QGBtUAAAAASUVORK5CYII="
                        alt=""><span data-v-405e9a63="">Win</span></li>
             <li data-v-405e9a63="" onclick="window.location.href='/me'" class=""><img data-v-405e9a63=""
                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAAFEmlUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS42LWMxNDIgNzkuMTYwOTI0LCAyMDE3LzA3LzEzLTAxOjA2OjM5ICAgICAgICAiPiA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtbG5zOmRjPSJodHRwOi8vcHVybC5vcmcvZGMvZWxlbWVudHMvMS4xLyIgeG1sbnM6cGhvdG9zaG9wPSJodHRwOi8vbnMuYWRvYmUuY29tL3Bob3Rvc2hvcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ0MgKFdpbmRvd3MpIiB4bXA6Q3JlYXRlRGF0ZT0iMjAyMC0wNy0wNlQxMToyMDoyNSswODowMCIgeG1wOk1vZGlmeURhdGU9IjIwMjAtMDctMDZUMTE6MzI6MzcrMDg6MDAiIHhtcDpNZXRhZGF0YURhdGU9IjIwMjAtMDctMDZUMTE6MzI6MzcrMDg6MDAiIGRjOmZvcm1hdD0iaW1hZ2UvcG5nIiBwaG90b3Nob3A6Q29sb3JNb2RlPSIzIiBwaG90b3Nob3A6SUNDUHJvZmlsZT0ic1JHQiBJRUM2MTk2Ni0yLjEiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6YTc0MTM1YzQtMzMwNi05YzQ2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"
                        alt=""><span data-v-405e9a63="">My</span></li>
           
                
             
            </ul>
        </div>
    </div>
<script>
    // PHP script to get user information
    let phoneNumber = '<?php echo $_SESSION['username']; ?>';

    const fetchUser = async () => {
        try {
            // Simulate PHP-based API call for user data
            const response = await fetch('/api/webapi/GetUserInfo');
            const data = await response.json();

            if (data && data.data) {
                phoneNumber = encodeURIComponent(data.data.phone_user);
            } else {
                console.warn("User data not found. Displaying games without user ID.");
            }
            // Display games regardless of user ID
            displayGames('all');
        } catch (error) {
            console.error('Error fetching user data:', error);
            // Still display games even if user data fetch fails
            displayGames('all');
        }
    };

    const displayGames = (category) => {
        const container = document.getElementById('game-container');
        container.innerHTML = '';

        let gamesToDisplay = [];
        if (category === 'all') {
            // Include all games from mTypes
            // Slots: gType0
            const slotsGType0 = [
                '14092', '14091', '14090', '14089', '14088', '14087', '14086', '14085', '14084', '14083', 
                '14082', '14081', '14080', '14079', '14077', '14075', '14070', '14068', '14067', '14065', 
                '14064', '14063', '14061', '14060', '14059', '14058', '14055', '14054', '14053', '14052', 
                '14051', '14050', '14048', '14047', '14046', '14045', '14044', '14043', '14042', '14041', 
                '14040', '14039', '14038', '14036', '14035', '14034', '14033', '14030', '14029', '14027', 
                '14025', '14022', '14021', '14018', '14016', '14012', '14010', '14008', '14007', '14006', 
                '14005', '14003', '8001', '15012', '15010', '15005', '15002', '15001', '8051', '8050', 
                '8049', '8048', '8047', '8046', '8044', '8035', '8028', '8023', '8022', '8021', '8020', 
                '8019', '8018', '8017', '8015', '8014', '8007', '8006', '8005', '8004', '8003', '8002'
            ];

            // Slots: gType32
            const slotsGType32 = [
                '32059', '32058', '32057', '32056', '32055', '32054', '32053', '32051', '32050', '32049',
                '32047', '32048', '32045', '32043', '32042', '32041', '32040', '32039', '32038', '32037',
                '32036', '32034', '32032', '32031', '32030', '32029', '32028', '32027', '32026', '32024',
                '32023', '32022', '32021', '32020', '32019', '32018', '32017', '32016'
            ];

            // Spribe games: gType22
            const spribeGType22 = [
                '22001', '22009', '22008', '22007', '22006', '22005', '22004', '22003',  '22002'
            ];

            // Casino games: gType18
            const casinoGames = [
                '18030', '18029', '18028', '18027', '18026', '18025', '18024', '18023', '18022', '18021',
                '18020', '18013', '18005', '18004', '18002', '18001'
            ];

            // Populate gamesToDisplay with all game types
            gamesToDisplay = [
                
                ...slotsGType0.map(mType => ({ gType: 0, mType })),              
               
            ];
        }

        gamesToDisplay.forEach(game => {
            const gameUrl = `https://apiprovider.codesellr.com/home/post?iv=58fcfd9edc6bac1c&key=a9475e3d049664c8&uid=${phoneNumber}&serverUrl=https://selimdemo.site/api/index.php&parent=bwininrag&gType=${game.gType}&mType=${game.mType}`;
            const imageUrl = `https://apiprovider.codesellr.com/jdbimagesweb/${game.mType}.png`;

            const gameItem = document.createElement('div');
            gameItem.className = 'game-item';

            const img = new Image();
            img.src = imageUrl;
            img.className = 'game-image';
            img.onerror = () => {
                img.src = 'https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_2024010216505212ii.png';
            };

            const gameLink = document.createElement('a');
            gameLink.href = gameUrl;
            gameLink.className = 'game-link';
            gameLink.appendChild(img);

            gameItem.appendChild(gameLink);
            container.appendChild(gameItem);
        });
    };

    // Fetch user data and display games
    fetchUser();
</script>
</body>

</html>