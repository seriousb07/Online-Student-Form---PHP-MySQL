<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management</title>
    <link rel="stylesheet" href="./style.css"> <!-- Link to CSS file -->
</head>
<body>

    <div class="container">
        <h2>Student Management System</h2>

        <form action="insert.php" method="POST">
            <label>Name:</label>
            <input type="text" name="name" required>

            <label>Roll No:</label>
            <input type="number" name="roll_no" required>

            <label>Mobile No:</label>
            <input type="text" name="mobile_no" required>

            <label>Address:</label>
            <input type="text" name="adress" required>

            <button type="submit" name="insert">Insert</button>
        </form>

        <div class="buttons">
            <form action="delete.php" method="GET">
                <button type="submit" class="delete">Delete Student</button>
            </form>

            <form action="modify.php" method="GET">
                <button type="submit" class="modify">Modify Student</button>
            </form>

            <form action="" method="POST">
                <button type="submit" name="display" class="display">Display Records</button>
            </form>
        </div>

        <div class="table-container">
            <?php include "display.php"; ?> 
        </div>
    </div>

</body>
</html>
