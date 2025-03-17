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
        /* Reset & Base Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        /* Page Container */
        .container {
            width: 40%;
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

        /* Labels */
        label {
            display: block;
            text-align: left;
            font-weight: bold;
            margin: 10px 0 5px;
            width: 80%;
            margin-left: auto;
            margin-right: auto;
        }

        /* Input Fields */
        input {
            width: 80%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
            transition: border 0.3s ease-in-out;
        }

        input:focus {
            border-color: #007bff;
            outline: none;
        }

        /* Buttons */
        button {
            width: 85%;
            padding: 12px;
            margin-top: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            background-color: #007bff;
            color: white;
            transition: background 0.3s ease-in-out;
        }

        button:hover {
            background-color: #0056b3;
        }

        /* Back Button */
        .back-btn {
            display: inline-block;
            padding: 10px 15px;
            margin-top: 10px;
            border-radius: 5px;
            background-color: #6c757d;
            color: white;
            text-decoration: none;
            transition: background 0.3s ease-in-out;
        }

        .back-btn:hover {
            background-color: #5a6268;
        }

        /* Message Box */
        .message {
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
        }

        .error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
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
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $roll_no = $_POST['roll_no'];

        $sql = "SELECT * FROM students WHERE roll_no = '$roll_no'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
    ?>

    <form action="modify_action.php" method="POST">
        <input type="hidden" name="update_roll_no" value="<?php echo $row['roll_no']; ?>">

        <label>Name:</label>
        <input type="text" name="update_name" value="<?php echo $row['name']; ?>">

        <label>Mobile No:</label>
        <input type="text" name="update_mobile_no" value="<?php echo $row['mobile_no']; ?>">

        <label>Address:</label>
        <input type="text" name="update_address" value="<?php echo $row['address']; ?>">

        <button type="submit" name="update">Update</button>
    </form>

    <?php
        } else {
            echo "<p class='message error'>❌ No student found with Roll No <b>$roll_no</b></p>";
        }
    }
    ?>

    <a href="modify.php" class="back-btn">Back</a>
</div>

</body>
</html>
