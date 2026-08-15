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
            font-family: Arial, sans-serif;
            background: #f5f7fb;
            color: #172033;
        }
        .card {
            width: min(680px, 100%);
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 18px;
            padding: 32px;
            box-shadow: 0 12px 35px rgba(0,0,0,.08);
        }
        h1 { margin-top: 0; }
        .ok {
            display: inline-block;
            padding: 8px 12px;
            border-radius: 999px;
            background: #e8f7ee;
            color: #187a42;
            font-weight: 700;
        }
        table { width: 100%; border-collapse: collapse; margin-top: 24px; }
        td { padding: 12px 0; border-bottom: 1px solid #eee; }
        td:first-child { font-weight: 700; width: 40%; }
        code {
            background: #f1f3f5;
            padding: 3px 6px;
            border-radius: 6px;
        }
    </style>
</head>
<body>
<main class="card">
    <span class="ok">PHP berjalan</span>
    <h1>PHP berhasil di-deploy ke Vercel</h1>
    <p>File ini adalah starter sederhana untuk memastikan runtime PHP Vercel bekerja.</p>

    <table>
        <tr><td>PHP Version</td><td><?= htmlspecialchars($phpVersion) ?></td></tr>
        <tr><td>Request Method</td><td><?= htmlspecialchars($method) ?></td></tr>
        <tr><td>Server Time</td><td><?= htmlspecialchars($time) ?></td></tr>
        <tr><td>Runtime</td><td><code>vercel-php</code></td></tr>
    </table>
</main>
</body>
</html>
