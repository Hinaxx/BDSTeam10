<?php
include('connect.php');

// Thêm biến trang hiện tại và số bản ghi mỗi trang
$page = isset($_GET['page']) ? $_GET['page'] : 1;

// Đảm bảo trang không nhỏ hơn 1
$page = max(1, $page);

$records_per_page = 4;

// Sửa truy vấn SQL để sử dụng LIMIT
$sql = "SELECT Full_Contract_Code, Customer_Name, Customer_Address FROM `dbo.full_contract`";
$result = $conn->query($sql);

// Tính toán tổng số trang
$total_records = $result->num_rows;
$total_pages = ceil($total_records / $records_per_page);

// Tính toán offset
$offset = ($page - 1) * $records_per_page;

// Sửa lại truy vấn SQL để sử dụng LIMIT và OFFSET
$sql = "SELECT Full_Contract_Code, Customer_Name, Customer_Address FROM `dbo.full_contract` LIMIT $offset, $records_per_page";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <title>Document</title>
</head>

<body>
  <section class="header">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <img src="img/logo.jpg" alt="" class="logo">
        </div>
      </div>
    </div>
  </section>
  <section>
    <div class="container">
      <div class="row">
        <div class="col-12 d-flex">
          <div class="col-3 bar-left">
            <ul class="list-tab">
              <li class="tab_bds"> <a href="quanlybatdongsan/index.php">Quản lý Bất Động Sản</a></li>
              <li class="tab_hd"> <a href="index.php">Quản Lý Hợp Đồng</a></li>
            </ul>
          </div>
          <div class="col-9 __bar-right">
            <div class="col-12 my-5">
              <p class="title_hd">Danh Sách Hợp Đồng</p>
            </div>
            <div class="col-12 d-flex align-items-center">
              <p class="__label">Tìm kiếm </p>
              <input type="text" class="__input">
              <input type="submit" value="SEARCH" class="__input-search">
            </div>
            <div class="col-12 d-flex  my-4">
              <p class="add_hd">Thêm +</p>
              <p class="pay-one">Thanh toán một lần</p>
              <p class="pay-more">thanh toán trả góp</p>
            </div>
            <div class="col-12">
        <table class="__table-all">
            <thead>
                <th>Mã hợp đồng</th>
                <th>Tên người mua</th>
                <th>Địa chỉ</th>
                <th></th>
            </thead>
            <tbody>
            <?php
            // Số lượng bản ghi
            $total_records = $result->num_rows;

            // Thêm biến để đếm số bản ghi
            $count = 1;

            // Sử dụng while để lặp qua dữ liệu
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["Full_Contract_Code"] . "</td>";
                echo "<td>" . $row["Customer_Name"] . "</td>";
                echo "<td>" . $row["Customer_Address"] . "</td>";
                echo "<td>";
                echo "<img src='img/Edit.jpg' alt='' class='update'>";
                echo "<img src='img/download-pdf-icon.png' alt='' class='print'>";
                echo "</td>";
                echo "</tr>";

                // Tăng biến đếm
                $count++;

                // Kiểm tra nếu đếm đủ số bản ghi, thoát vòng lặp
                if ($count > $records_per_page) {
                    break;
                }
            }
            ?>
            </tbody>
        </table>
    </div>

    <!-- Hiển thị nút Previous và Next -->
    <div class='pagination'>
        <?php
        
        // Hiển thị nút Previous
        if ($page > 1) {
            echo "<a href='?page=" . ($page - 1) . "'>&laquo; Previous</a>";
        }

        // Hiển thị các trang
        for ($i = 1; $i <= $total_pages; $i++) {
            // Thêm class 'active' cho trang hiện tại
            $active_class = ($i == $page) ? 'class="active"' : '';

            echo "<a href='?page=$i' $active_class>$i</a>";
        }

        // Hiển thị nút Next
        if ($page < $total_pages) {
            echo "<a href='?page=" . ($page + 1) . "'>Next &raquo;</a>";
        }
        echo '</div>';
        ?>
    </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="__new-hd ">
    <div class="col-10 __inner-add position-relative ">
      <p class=" close">x</p>

      <div class="col-12 mb-3">
        <p class="title_hd title_add pt-4 ">Thêm Hợp Đồng </p>
      </div>

      <form action="save_contract.php" method="post">
    <div class="d-flex __form-group">
        <label for="name-user">Tên người mua</label>
        <input type="text" id="name-user" name="user" class="__input">
    </div>
    <div class="d-flex __form-group">
        <label for="name-bth">Năm sinh</label>
        <input type="text" id="name-btn" name="name-bth" class="__input">
    </div>
    <div class="d-flex __form-group">
        <label for="ssn">SSN</label>
        <input type="text" id="ssn" name="ssn" class="__input">
    </div>
    <div class="d-flex __form-group">
        <label for="address">Địa chỉ</label>
        <input type="text" id="address" name="address" class="__input">
    </div>
    <div class="d-flex __form-group">
        <label for="phone">Số điện thoại</label>
        <input type="text" id="phone" name="phone" class="__input">
    </div>
    <div class="d-flex __form-group">
      <label for="price">Giá</label>
      <input type="text" id="price" name="price" class="__input">
    </div>
    <div class="d-flex __form-group">
        <label for="remain">Tiền gửi</label>
        <input type="text" id="deposit" name="deposit" class="__input">
    </div>
    <div class="d-flex __form-group">
        <label for="remain">Chi phí còn lại</label>
        <input type="text" id="remain" name="remain" class="__input">
    </div>
    <div class="d-flex __form-group">
        <label for="status">Status</label>
        <input type="text" id="status" name="status" class="__input">
    </div>
    <div class="col-12 d-flex justify-content-end __box-save">
        <input type="submit" value="Lưu" class="save">
    </div>
</form>

    </div>
  </section>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script src="main.js"></script>
</body>

</html>