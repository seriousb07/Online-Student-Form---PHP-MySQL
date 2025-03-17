<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Student</title>

    <style>
        /* Reset Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        /* Container */
        .container {
            width: 50%;
            margin: 50px auto;
            background: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        /* Title */
        h2 {
            margin-bottom: 20px;
            color: #333;
        }

        /* Messages */
        .message {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 15px;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
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
            padding: 10px 15px;
            margin-top: 10px;
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
        <h2>Insert Student</h2>

        <?php
        include "db_connect.php"; // Database connection

        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['insert'])) {
            // Getting values from form
            $name = trim($_POST['name']);
            $roll_no = trim($_POST['roll_no']);
            $mobile_no = trim($_POST['mobile_no']);
            $address = trim($_POST['adress']); // Fixed spelling

            // Validate input (Ensure all fields are filled)
            if (!empty($name) && !empty($roll_no) && !empty($mobile_no) && !empty($address)) {

                // Use prepared statements to prevent SQL injection
                $sql = "INSERT INTO students (name, roll_no, mobile_no, address) VALUES (?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                
                if ($stmt) {
                    $stmt->bind_param("siss", $name, $roll_no, $mobile_no, $address);

                    if ($stmt->execute()) {
                        echo "<p class='message success'>✅ Record inserted successfully!</p>";
                    } else {
                        echo "<p class='message error'>❌ Error inserting record: " . $stmt->error . "</p>";
                    }

                    $stmt->close();
                } else {
                    echo "<p class='message error'>❌ SQL Error: " . $conn->error . "</p>";
                }
            } else {
                echo "<p class='message error'>❌ Please fill all fields!</p>";
            }
        }

        $conn->close();
        ?>

        <a href="index.php" class="back-btn">Back</a>
    </div>

</body>
</html>