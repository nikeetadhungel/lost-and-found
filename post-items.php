<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Redirect if not logged in
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include('includes/db.php');
    
    // Get form data
    $title = $_POST['title'];
    $description = $_POST['description'];
    $item_type = $_POST['item_type'];  // "lost" or "found"
    $contact = $_POST['contact'];
    $location = $_POST['location']; // New location field
    $username = $_SESSION['username'];
    
    // Insert the posted item into the 'items' table
    $sql = "INSERT INTO items (title, description, item_type, contact, location, posted_by) 
            VALUES ('$title', '$description', '$item_type', '$contact', '$location', '$username')";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php"); // Redirect to homepage after posting
    } else {
        $error = "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Post Item - LOST AND FOUND</title>
    <style>
        /* General Styling */
        body {
            font-family: 'Arial', sans-serif;
            background: url('bg.jpg') no-repeat center center fixed;
            background-size: cover; /* Ensures the background image covers the entire page */
            margin: 0;
            padding: 0;
            color: #fff;
        }

        .container {
            width: 50%;
            margin: 50px auto;
            background-color: rgba(255, 255, 255, 0.8); /* White with some transparency for background */
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.15);
            text-align: center;
            transform: translateY(-20px); /* Slightly raised effect */
            transition: all 0.3s ease;
        }f

        .container:hover {
            transform: translateY(-30px); /* Lift effect on hover */
            box-shadow: 0px 15px 40px rgba(0, 0, 0, 0.25); /* Stronger shadow on hover */
        }

        h2 {
            color: black; /* Blue color for title */
            font-size: 32px;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;  
        }

        /* Input and Textarea styling */
        input[type="text"],
        textarea,
        select {
            width: 80%;
            padding: 12px;
            margin: 12px 0;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow */
            transition: all 0.3s ease;
        }

        input[type="text"]:focus,
        textarea:focus,
        select:focus {
            border-color: #3498db; /* Highlight with blue border on focus */
            box-shadow: 0 0 10px rgba(52, 152, 219, 0.5); /* Glow effect */
            outline: none;
        }

        textarea {
            height: 150px;
        }

        /* Label styling */
        label {
            font-size: 18px;
            color: #333;
            margin-top: 15px;
            font-weight: bold;
        }

        /* Button styling */
        button {
            width: 80%;
            padding: 15px;
            background-color: brown; /* Blue background for button */
            border: none;
            border-radius: 8px;
            color: white;
            font-size: 18px;
            cursor: pointer;
            margin-top: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); /* Button shadow */
            transition: all 0.3s ease;
        }

        button:hover {
            background-color: rgba(52, 152, 219, 0.5); /* Darker blue on hover */
            transform: translateY(-3px); /* Slight lift on hover */
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3); /* Stronger shadow on hover */
        }

        /* Error message styling */
        .error {
            color: red;
            font-size: 16px;
            margin-top: 20px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                width: 90%;
            }

            input[type="text"],
            textarea,
            select,
            button {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Post Lost or Found Item</h2>
        <form method="POST">
            <!-- Item Title -->
            <input type="text" name="title" placeholder="Item Title" required><br>
            
            <!-- Item Description -->
            <textarea name="description" placeholder="Description" required></textarea><br>
            
            <!-- Item Type Dropdown -->
            <label for="item_type">Item Type:</label>
            <select name="item_type" required>
                <option value="lost">Lost</option>
                <option value="found">Found</option>
            </select><br>
            
            <!-- Location -->
            <label for="location">Location:</label>
            <input type="text" name="location" placeholder="Enter the location" required><br>
            
            <!-- Contact Information -->
            <input type="text" name="contact" placeholder="Contact Information" required><br>
            
            <!-- Submit Button -->
            <button type="submit">Post Item</button>
        </form>
        
        <?php if (isset($error)) { echo "<p class='error'>$error</p>"; } ?>
    </div>
</body>
</html>
