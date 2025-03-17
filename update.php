<?php
include 'config.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM students WHERE id=$id");
$row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $roll_no = $_POST['roll_no'];
    $mobile = $_POST['mobile_no'];
    $address = $_POST['address'];

    $sql = "UPDATE students SET name='$name', roll_no='$roll_no', mobile_no='$mobile', address='$address' WHERE id=$id";
    
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Record updated successfully!'); window.location.href='index.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modify Student</title>

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
            width: 40%;
            margin: 50px auto;
            background: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        /* Title */
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        /* Form */
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
        }

        /* Labels */
        label {
            font-weight: bold;
            text-align: left;
            width: 80%;
        }

        /* Inputs */
        input, textarea {
            width: 80%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        /* Buttons */
        button {
            padding: 10px 15px;
            margin-top: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            background-color: #007bff;
            color: white;
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
        }

        .back-btn:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Modify Student Details</h2>

        <form method="POST">
            <label>Name:</label>
            <input type="text" name="name" value="<?= $row['name'] ?>" required>

            <label>Roll No:</label>
            <input type="text" name="roll_no" value="<?= $row['roll_no'] ?>" required>

            <label>Mobile No:</label>
            <input type="text" name="mobile_no" value="<?= $row['mobile_no'] ?>" required>

            <label>Address:</label>
            <textarea name="address" required><?= $row['address'] ?></textarea>

            <button type="submit">Update</button>
            <a href="index.php" class="back-btn">Back</a>
        </form>
    </div>

</body>
</html>
