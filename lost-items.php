<?php
include('includes/db.php');
$result = $conn->query("SELECT * FROM items WHERE item_type = 'lost'");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lost Items - Lost and Found</title>
    <style>
        /* General Styles */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7f6;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            width: 80%;
            max-width: 1000px;
            margin-top: 20px;
            background-color: #ffffff;
            padding: 20px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            text-align: center;
        }

        h2 {
            font-size: 2.5em;
            color: #333;
            margin-bottom: 20px;
        }

        .item {
            background-color: #fff;
            padding: 15px;
            margin: 10px 0;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            transition: transform 0.3s ease;
        }

        .item:hover {
            transform: translateY(-5px);
        }

        .item h3 {
            color: #1a73e8;
            font-size: 1.8em;
            margin-bottom: 10px;
        }

        .item p {
            color: #666;
            font-size: 1.1em;
            line-height: 1.6;
        }

        .item p.contact {
            font-weight: bold;
            color: #333;
        }

        /* Button Style */
        .item button {
            padding: 10px 20px;
            background-color: #1a73e8;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1em;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .item button:hover {
            background-color: #0f5bbd;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                width: 95%;
            }
            h2 {
                font-size: 2em;
            }
            .item h3 {
                font-size: 1.5em;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Lost Items</h2>
        <?php while ($item = $result->fetch_assoc()) { ?>
            <div class="item">
                <h3><?php echo $item['title']; ?></h3>
                <p><?php echo $item['description']; ?></p>
                <p class="contact">Contact: <?php echo $item['contact']; ?></p>
                <button>Contact</button>
            </div>
        <?php } ?>
    </div>
</body>
</html>
