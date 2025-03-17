<?php
include "db_connect.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modify Student</title>

    <style>
        /* Base Styles */
        * { 
            margin: 0; 
            padding: 0; 
            box-sizing: border-box; 
            font-family: Arial, sans-serif; 
        }

        /* Page Container */
        .container { 
            width: 50%; 
            margin: 50px auto; 
            background: #fff; 
            padding: 25px; 
            border-radius: 8px; 
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); 
            text-align: center; 
        }

        /* Heading */
        h2 { 
            margin-bottom: 20px; 
            color: #333; 
            font-size: 24px; 
        }

        /* Message Styles */
        .message { 
            padding: 15px; 
            margin-bottom: 15px; 
            border-radius: 5px; 
            font-size: 16px; 
            font-weight: bold;
        }

        .success { 
            background: #d4edda; 
            color: #155724; 
            border: 1px solid #c3e6cb; 
        }

        .error { 
            background: #f8d7da; 
            color: #721c24; 
            border: 1px solid #f5c6cb; 
        }

        /* Back Button */
        .back-btn { 
            display: inline-block; 
            padding: 10px 15px; 
            margin-top: 15px; 
            border-radius: 5px; 
            background-color: #007bff; 
            color: white; 
            text-decoration: none; 
            font-size: 16px;
            transition: background 0.3s ease-in-out;
        }

        .back-btn:hover { 
            background-color: #0056b3; 
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                width: 90%;
                padding: 20px;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Modify Student</h2>

    <?php
    if (isset($_POST['update'])) {
        $roll_no = $_POST['update_roll_no'];
        $name = $_POST['update_name'];
        $mobile_no = $_POST['update_mobile_no'];
        $address = $_POST['update_address'];

        if (!empty($name) || !empty($mobile_no) || !empty($address)) {
            $sql = "UPDATE students SET 
                    name = IF('$name'='', name, '$name'), 
                    mobile_no = IF('$mobile_no'='', mobile_no, '$mobile_no'), 
                    address = IF('$address'='', address, '$address') 
                    WHERE roll_no='$roll_no'";

            if ($conn->query($sql) === TRUE) {
                echo "<p class='message success'>✅ Student with Roll No <b>$roll_no</b> updated successfully!</p>";
            } else {
                echo "<p class='message error'>❌ Error: " . $conn->error . "</p>";
            }
        } else {
            echo "<p class='message error'>❌ Please enter at least one field to update!</p>";
        }
    }
    ?>

    <a href="modify.php" class="back-btn">Back</a>
</div>

</body>
</html>
