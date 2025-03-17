<?php
// Connect to MySQL
$servername = "localhost";
$username = "root";
$password = "";
$database = "student_db"; // Change this to your database name

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// INSERT operation
if (isset($_POST['insert'])) {
    $name = $_POST['name'];
    $roll_no = $_POST['roll_no'];
    $mobile_no = $_POST['mobile_no'];
    $adress = $_POST['adress'];

    if (!empty($name) && !empty($roll_no) && !empty($mobile_no) && !empty($adress)) {
        $sql = "INSERT INTO students (name, roll_no, mobile_no, adress) 
                VALUES ('$name', '$roll_no', '$mobile_no', '$adress')";
        
        if ($conn->query($sql) === TRUE) {
            echo "<p style='color: green;'>✅ Insert operation performed successfully!</p>";
        } else {
            echo "<p style='color: red;'>❌ Error: " . $conn->error . "</p>";
        }
    } else {
        echo "<p style='color: red;'>❌ Please fill in all fields!</p>";
    }
}

// DELETE operation
if (isset($_POST['delete'])) {
    $roll_no = $_POST['delete_roll_no'];

    $sql = "DELETE FROM students WHERE roll_no='$roll_no'";
    
    if ($conn->query($sql) === TRUE) {
        echo "<p style='color: green;'>✅ Student with Roll No $roll_no deleted successfully!</p>";
    } else {
        echo "<p style='color: red;'>❌ Error: " . $conn->error . "</p>";
    }
}

// UPDATE operation
if (isset($_POST['update'])) {
    $roll_no = $_POST['update_roll_no'];
    $name = $_POST['update_name'];
    $mobile_no = $_POST['update_mobile_no'];
    $adress = $_POST['update_adress'];

    if (!empty($name) || !empty($mobile_no) || !empty($adress)) {
        $sql = "UPDATE students SET 
                name=IF('$name'='', name, '$name'), 
                mobile_no=IF('$mobile_no'='', mobile_no, '$mobile_no'), 
                adress=IF('$adress'='', adress, '$adress') 
                WHERE roll_no='$roll_no'";

        if ($conn->query($sql) === TRUE) {
            echo "<p style='color: green;'>✅ Student with Roll No $roll_no updated successfully!</p>";
        } else {
            echo "<p style='color: red;'>❌ Error: " . $conn->error . "</p>";
        }
    } else {
        echo "<p style='color: red;'>❌ Please enter at least one field to update!</p>";
    }
}

// DISPLAY operation
if (isset($_POST['display'])) {
    $sql = "SELECT * FROM students";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table><tr><th>ID</th><th>Name</th><th>Roll No</th><th>Mobile No</th><th>Address</th></tr>";
        
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['roll_no']}</td>
                    <td>{$row['mobile_no']}</td>
                    <td>{$row['adress']}</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "<p style='color: red;'>❌ No records found!</p>";
    }
}

$conn->close();
?>
