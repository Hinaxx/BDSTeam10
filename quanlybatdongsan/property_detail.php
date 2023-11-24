<?php

include('connect.php');

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);


// Check if Property ID is set in the URL
if (isset($_GET['id'])) {
    $property_id = $_GET['id'];
    $sql = "SELECT * FROM `dbo.Property` WHERE ID = $property_id";

    $result_detail = $conn->query($sql);

    if ($result_detail->num_rows > 0) {
        $property_detail = $result_detail->fetch_assoc();
        ?>
        <!-- Add your HTML structure to display property details -->
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <!-- Include necessary meta tags, stylesheets, and title -->
            <title>Property Details</title>
        </head>
        <style>
.custom-div {
    width: 40%; /* Hoặc sử dụng giá trị tỷ lệ như 60% */
    height: 60vh; /* Sử dụng 60% chiều cao của màn hình */
    position: absolute;
    top: 5%;
    left: 5%;
    border: 1px solid black;
}



.new-div {
    width: 40%;
    height: 60vh;
    position: absolute;
    top: 5%;
    left: 55%;
    border: 1px solid red;
}
th, td {
            padding: 10px; /* Đặt giá trị padding theo mong muốn của bạn, ở đây là 10px */
            border: 0px solid black; /* Thêm viền cho ô */
        }

</style>
</head>
<body>
    
    <div class="custom-div">
        
    <table border="0"  style="position:relative;margin: 0 auto;left:-181px">
        <tr>
            
            <th>Tên BĐS: 
            <?php
            echo $property_detail['Property_Name']; 
            ?>
            </th>
        </tr>
    <table  style="margin: 0 auto;">
        <tr>
            <th>Dia chi</th>
            <th>Muc Gia </th>
            <th>Phong Tam</th>
            <th>Phong Ngu</th>
        </tr>
        <tr>
            <td>
                <?php
            echo $property_detail['Address']; 
            ?>
            </td>
            <td >                <?php
            echo $property_detail['Price']; 
            ?></td>
            <td>                <?php
            echo $property_detail['Bath_Room']; 
            ?></td>
            <td>                <?php
            echo $property_detail['Bed_Room']; 
            ?></td>
        </tr>

    </table>
    <table  style="margin: 0 auto; background-color: #204C95; color:yellow">
        <tr>
            <th >Thong tin mo ta</th>
            
        </tr>
        <tr>
            <td>
                <?php
            echo $property_detail['Description']; 
            ?>
            </td>
        </tr>

    </table>
    
    </table>
        </table>
    </div>
    <div class="new-div">
    <div style="font-size: 16px; color:black; text-align: center;font-weight: 700">Thong Tin Nguoi Ban</div>
      <img style="position: relative;width: 140px;height: 138px;border-radius: 50%;
      display: block; /* Để đảm bảo hình ảnh là một khối (block element) */
        margin: auto;"
      src="img/logo2.jpg">
      <div style="font-size: 16px; color:black; text-align: center;font-weight: 700; margin-bottom: 30px;">Team 10</div>
      <div style="
    height: 48px;
    font-size: 16px;
    color: black;
    text-align: center;
    background-color: #204C95;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    margin-bottom: 20px;
    "> SDT : 123456789</div>
    <div style="
      height: 48px;
    font-size: 16px;
    color: black;
    text-align: center;
    background-color: #204C95;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    margin-bottom: 20px;
    "> Gui Email</div>
     <div style="
    height: 48px;
    font-size: 16px;
    color: black;
    text-align: center; 
    background-color:#204C95;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700; margin-bottom: 20px;
    "> Hổ Trợ</div>
      </div>
    </div>

</body>
<a href="index.php">Back to Property List</a>
</div>
        </html>
        <?php
    } else {
        echo "Property not found.";
    }
} else {
    echo "Property ID not specified.";
}


?>
