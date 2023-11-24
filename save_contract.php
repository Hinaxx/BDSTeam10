<?php
include('connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Receive data from the form
    $user = isset($_POST['user']) ? $_POST['user'] : '';
    $custom_bth = isset($_POST['name-bth']) ? $_POST['name-bth'] : '';
    $ssn = isset($_POST['ssn']) ? $_POST['ssn'] : '';
    $address = isset($_POST['address']) ? $_POST['address'] : '';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $property_id = '3';
    $price = isset($_POST['price']) ? $_POST['price'] : '';
    $deposit = isset($_POST['deposit']) ? $_POST['deposit'] : '';   
    $remain = isset($_POST['remain']) ? $_POST['remain'] : '';
    $status = isset($_POST['status']) ? $_POST['status'] : '';

    // Use prepared statement to prevent SQL injection
    $sql = "INSERT INTO `dbo.full_contract` (Full_Contract_Code, Customer_Name, Year_Of_Birth, SSN, Customer_Address, Mobile, Property_ID, Date_Of_Contract, Price, Deposit, Remain, Status) VALUES (?, ?, ?, ?, ?, ?, ?, CURRENT_DATE, ?, ?, ?, ?)";

    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare($sql);
    // Bind parameters with appropriate types
    $stmt->bind_param("ssisssisdii", $ID, $user, $custom_bth, $ssn, $address, $phone, $property_id, $price, $deposit, $remain, $status);

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
