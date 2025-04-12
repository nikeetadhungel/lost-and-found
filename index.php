<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lost and Found</title>
    <style>
        /* Global Styles */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #1d1f21; /* Dark background for a more immersive feel */
            color: #f4f4f4; /* Light text color */
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(to right, #0c273a, #8e44ad);
            color: white;
            padding: 100px 0;
            text-align: center;
            border-bottom: 5px solid #fff;
        }

        .hero h1 {
            font-size: 4rem;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .hero p {
            font-size: 1.3rem;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 30px;
        }

        .hero button {
            background-color: #ecf0f1;
            color: #3498db;
            border: none;
            padding: 15px 40px;
            font-size: 1.2rem;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .hero button:hover {
            background-color: #3498db;
            color: white;
            transform: scale(1.05);
        }

        /* Story List Container */
        .container {
            padding: 40px;
            margin: 40px auto;
            background-color: #fff;
            max-width: 1000px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            text-align: center;
        }

        .container h2 {
            font-size: 2.5rem;
            color: #2c3e50;
            margin-bottom: 20px;
        }

        /* Section Styling */
        .section {
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
        }

        .section h1 {
            font-size: 2.5rem;
            color: #7b1fa2; /* Purple color for title */
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .section p {
            font-size: 1.2rem;
            margin-bottom: 30px;
            color: #34495e;
        }

        /* Button Styling */
        a {
            text-decoration: none;
            display: inline-block;
            margin: 15px;
            padding: 15px 25px;
            background: linear-gradient(45deg, #7b1fa2, #9c27b0); /* Purple gradient */
            color: white;
            font-size: 1.1rem;
            border-radius: 8px;
            transition: transform 0.3s ease, background 0.3s ease;
        }

        a:hover {
            transform: translateY(-5px);
            background: linear-gradient(45deg, #9c27b0, #d500f9); /* Light purple gradient on hover */
        }

        a:active {
            transform: translateY(2px);
            background: linear-gradient(45deg, #9c27b0, #8e24aa); /* Darker purple on active */
        }

        /* Mobile Responsiveness */
        @media (max-width: 768px) {
            .container {
                width: 100%;
            }

            .section h1 {
                font-size: 2.2rem;
            }

            a {
                font-size: 1em;
                padding: 12px 20px;
            }
        }

        /* Flex for Better Alignment */
        .auth-links {
            display: flex;
            justify-content: center;
            gap: 20px;
        }
    </style>
</head>
<body>
    <div class="hero">
        <h1>FIND IT NOW</h1>
        <p>Lost or found something? Update it here!  
        Post, connect, and reunite easily. Fast and reliable – your items are just a click away.</p>
        <p><strong>To get started, sign in or create a new account to begin.</strong></p>
    </div>

    <div class="container">
        <!-- Navigation Section (Visible if logged in) -->
        <?php if (isset($_SESSION['username'])) { ?>
            <div class="section">
                <h1>Welcome, <?php echo $_SESSION['username']; ?>!</h1>
                <a href="post-items.php">Post a Lost or Found Item</a>
                <a href="lost-items.php">View Lost Items</a>
                <a href="found-items.php">View Found Items</a>
            </div>

            <!-- Logout Section -->
            <div class="section">
                <a href="logout.php">Logout</a>
            </div>
        <?php } else { ?>
            <!-- Authentication Links (Login / Signup) -->
            <div class="section">
                <h1>Sign In to Get Started</h1>
                <div class="auth-links">
                    <a href="login.php">Login</a>
                    <a href="signup.php">Sign Up</a>
                </div>
            </div>
        <?php } ?>
    </div>
</body>
</html>
