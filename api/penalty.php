<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Penalty Unlimited</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    html, body {
      margin: 0;
      height: 100%;
      overflow: hidden;
    }

    .wrapper {
      position: relative;
      width: 100%;
      height: 100%;
    }

    iframe {
      width: 100%;
      height: 100%;
      border: none;
    }

    .watermark {
      position: absolute;
      bottom: 10px;
      right: 10px;
      font-size: 1.2rem;
      color: rgba(255, 255, 255, 0.5);
      font-family: sans-serif;
      pointer-events: none;
      z-index: 10;
    }
  </style>
  <script>
    document.addEventListener('contextmenu', e => e.preventDefault());
    document.addEventListener('keydown', e => {
      if (
        e.key === 'F12' ||
        (e.ctrlKey && e.shiftKey && ['I', 'J', 'C'].includes(e.key)) ||
        (e.ctrlKey && e.key === 'U')
      ) {
        e.preventDefault();
        return false;
      }
    });
  </script>
</head>
<body ondragstart="return false;" onselectstart="return false;">
  <div class="wrapper">
    <iframe
      src="https://api.inout.games/api/launch?gameMode=penalty-unlimited&authToken=247d3637-c5dc-a67b-50a1-89df27733343&operatorId=ee2013ed-e1f0-4d6e-97d2-f36619e2eb52&currency=USD&lang=en"
      allowfullscreen
    ></iframe>
    
  </div>
</body>
</html>
