<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/style.css" rel="stylesheet">  <!-- Correct path to the CSS file -->
    <title>Portfolio</title>
</head>
<body class="<?php echo isset($bodyClass) ? $bodyClass : ''; ?>">

    <!-- Particles background -->
    <div id="particles-js"></div>
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script>
    // Initialize particles.js with configuration file (adjust path if necessary)
    particlesJS.load('particles-js', 'particles.json', function() {
        console.log('particles.js loaded');
    });
    </script>

<header>
    <div class="title"><?php echo '<span style="color: white">Port</span><span style="color: black">folio</span>'; ?></div>
    <nav style="text-align: center;">
    <ul>
        <li><a href="/index.php?section=home">Home</a></li>
        <li><a href="/index.php?section=about">About</a></li>
        <li><a href="/index.php?section=projects">Projects</a></li>
        <li><a href="/index.php?section=skills">Skills</a></li>
        <li><a href="/index.php?section=reviews">Reviews</a></li>
    </ul>
    </nav>
</header>

<section>