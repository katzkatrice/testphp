<?php
declare(strict_types=1);

header('Content-Type: text/html; charset=UTF-8');

$phpVersion = PHP_VERSION;
$method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
$time = date('Y-m-d H:i:s');

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP on Vercel</title>
    <style>
        * { box-sizing: border-box; }
        body {
            margin: 0;
            min-height: 100vh;
            display: grid;
            place-items: center;
            padding: 24px;
            font-family: 'Courier New', Courier, monospace;
            background: #05050c;
            color: #00ffcc;
            overflow: hidden;
            position: relative;
        }
        .bg-particles {
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            z-index: 1;
            pointer-events: none;
        }
        .particle {
            position: absolute;
            background: rgba(0, 255, 204, 0.3);
            border-radius: 50%;
        }
        .card {
            width: min(680px, 100%);
            background: rgba(10, 10, 25, 0.85);
            border: 1px solid #00ffcc;
            border-radius: 18px;
            padding: 32px;
            box-shadow: 0 0 20px rgba(0, 255, 204, 0.2), inset 0 0 15px rgba(0, 255, 204, 0.1);
            backdrop-filter: blur(10px);
            z-index: 2;
            opacity: 0;
            transform: translateY(50px);
        }
        h1 {
            margin-top: 0;
            font-size: 1.8rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            text-shadow: 0 0 10px rgba(0, 255, 204, 0.5);
        }
        .ok {
            display: inline-block;
            padding: 8px 16px;
            border-radius: 4px;
            background: rgba(0, 255, 204, 0.1);
            border: 1px solid #00ffcc;
            color: #00ffcc;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            box-shadow: 0 0 10px rgba(0, 255, 204, 0.2);
            margin-bottom: 15px;
        }
        table { width: 100%; border-collapse: collapse; margin-top: 24px; }
        td { padding: 16px 0; border-bottom: 1px solid rgba(0, 255, 204, 0.2); }
        td:first-child { font-weight: 700; width: 40%; color: #ff00ff; text-shadow: 0 0 5px rgba(255, 0, 255, 0.5); }
        code {
            background: rgba(255, 0, 255, 0.1);
            border: 1px solid #ff00ff;
            color: #ff00ff;
            padding: 3px 6px;
            border-radius: 4px;
        }
    </style>
</head>
<body>
<div class="bg-particles" id="particles"></div>
<main class="card">
    <span class="ok">SYSTEM ONLINE</span>
    <h1>PHP Vercel Deployment</h1>
    <p>starter sederhana vercel-php aktif.</p>

    <table>
        <tr class="row"><td>PHP Version</td><td><?= htmlspecialchars($phpVersion) ?></td></tr>
        <tr class="row"><td>Request Method</td><td><?= htmlspecialchars($method) ?></td></tr>
        <tr class="row"><td>Server Time</td><td><?= htmlspecialchars($time) ?></td></tr>
        <tr class="row"><td>Runtime</td><td><code>vercel-php</code></td></tr>
    </table>
</main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
<script>
    // Generate background particles
    const container = document.getElementById('particles');
    for (let i = 0; i < 40; i++) {
        const p = document.createElement('div');
        p.classList.add('particle');
        p.style.width = Math.random() * 6 + 2 + 'px';
        p.style.height = p.style.width;
        p.style.left = Math.random() * 100 + 'vw';
        p.style.top = Math.random() * 100 + 'vh';
        container.appendChild(p);
    }

    // Anime.js animations
    anime({
        targets: '.particle',
        translateX: () => anime.random(-50, 50),
        translateY: () => anime.random(-100, -300),
        opacity: [0.2, 0.8, 0],
        easing: 'linear',
        duration: () => anime.random(3000, 8000),
        delay: () => anime.random(0, 2000),
        loop: true
    });

    // Card slide up and glow
    anime({
        targets: '.card',
        opacity: [0, 1],
        translateY: [80, 0],
        duration: 1200,
        easing: 'easeOutElastic(1, .8)'
    });

    // Animate table rows stagger
    anime({
        targets: '.row',
        opacity: [0, 1],
        translateX: [-30, 0],
        delay: anime.stagger(150, {start: 500}),
        easing: 'easeOutQuad'
    });
</script>
</body>
</html>
