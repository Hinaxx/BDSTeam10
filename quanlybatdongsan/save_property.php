<?php
include('connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Receive data from the form
    $bds = isset($_POST['bds']) ? $_POST['bds'] : '';
    $address = isset($_POST['address']) ? $_POST['address'] : '';
    //$property_id = '3';
    $price = isset($_POST['price']) ? $_POST['price'] : '';
    $bath_room = isset($_POST['bath_room']) ? $_POST['bath_room'] : '';   
    $bed_room = isset($_POST['bed_room']) ? $_POST['bed_room'] : '';
    $description = isset($_POST['description']) ? $_POST['description'] : '';


    // Use prepared statement to prevent SQL injection
    $sql = "INSERT INTO `dbo.property` (Property_Name, Description, Address, Bed_Room, Bath_Room, Price) VALUES (?, ?, ?, ?, ?, ?)";

    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare($sql);

    // Bind parameters with appropriate types
    $stmt->bind_param("ssssss", $bds, $description, $address, $bed_room, $bath_room, $price);

    if ($stmt->execute()) {
        ?>
                <!DOCTYPE html>
                <html lang="en">
        
                <head>
                    <!-- Include necessary meta tags, stylesheets, and title -->
                    <title>Bạn Đã Thêm Dữ Liệu Thành Công!</title>
                </head>
        
                <body>
                    <!-- Display property details here -->
                    <h2>Bạn Đã Thêm Dữ Liệu Thành Công!</h2>
                    <a href="index.php">Quay  lại</a>
                </body>
                </html>
        <?php
            } else {
                echo "Error: " . $stmt->error;
            }
        
            // Close the prepared statement and database connection
            $stmt->close();
            $conn->close();
        }
        ?>