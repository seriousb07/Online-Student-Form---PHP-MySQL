<?php
include "db_connect.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Student</title>

    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        /* Centered Container */
        .container {
            width: 50%;
            margin: 100px auto;
            background: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        /* Success & Error Messages */
        .message {
            font-size: 18px;
            font-weight: bold;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        /* Back Button */
        .back-btn {
            display: inline-block;
            margin-top: 10px;
            padding: 10px 15px;
            border-radius: 5px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            font-size: 16px;
        }

        .back-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="container">
    <?php
    if (isset($_POST['delete'])) {
        $roll_no = $_POST['delete_roll_no'];

        $sql = "DELETE FROM students WHERE roll_no='$roll_no'";

        if ($conn->query($sql) === TRUE) {
            echo "<p class='message success'>✅ Student with Roll No $roll_no deleted successfully!</p>";
        } else {
            echo "<p class='message error'>❌ Error: " . $conn->error . "</p>";
        }
    }
    ?>

    <a href="index.php" class="back-btn">Back</a>
</div>

</body>
</html>
