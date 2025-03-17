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
            width: 40%;
            margin: 100px auto;
            background: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        /* Title */
        h2 {
            margin-bottom: 15px;
            color: #333;
        }

        /* Form Styling */
        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        label {
            font-size: 16px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        /* Delete Button */
        .delete-btn {
            background: #dc3545;
            color: white;
            border: none;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        .delete-btn:hover {
            background: #c82333;
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
        <h2>Delete Student</h2>
        <form action="delete_action.php" method="POST">
            <label>Enter Roll No to Delete:</label>
            <input type="number" name="delete_roll_no" required>
            <button type="submit" name="delete" class="delete-btn">Delete</button>
        </form>
        <a href="index.php" class="back-btn">Back</a>
    </div>

</body>
</html>
