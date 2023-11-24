<?php
include('connect.php');

// Thêm biến trang hiện tại và số bản ghi mỗi trang
$page = isset($_GET['page']) ? $_GET['page'] : 1;

// Đảm bảo trang không nhỏ hơn 1
$page = max(1, $page);

$records_per_page = 4;

// Sửa truy vấn SQL để sử dụng LIMIT
$sql = "SELECT ID, Property_Code, Property_Name, Address FROM `dbo.property`";
$result = $conn->query($sql);

// Tính toán tổng số trang
$total_records = $result->num_rows;
$total_pages = ceil($total_records / $records_per_page);

// Tính toán offset
$offset = ($page - 1) * $records_per_page;

// Sửa lại truy vấn SQL để sử dụng LIMIT và OFFSET
$sql = "SELECT ID, Property_Code, Property_Name, Address FROM `dbo.property` LIMIT $offset, $records_per_page";
$result = $conn->query($sql);
// Thay đổi truy vấn SQL để sử dụng LIKE cho tính năng tìm kiếm
if (isset($_GET['query']) && !empty($_GET['query'])) {
  $search_query = $conn->real_escape_string($_GET['query']);
  $sql = "SELECT ID, Property_Code, Property_Name, Address FROM `dbo.property` WHERE Property_Name LIKE '%$search_query%' OR Address LIKE '%$search_query%'";
} else {
  $sql = "SELECT ID, Property_Code, Property_Name, Address FROM `dbo.property`";
}

// Thêm LIMIT và OFFSET vào truy vấn SQL
$sql .= " LIMIT $offset, $records_per_page";
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
              <li class="tab_bds"> <a href="index.php">Quản lý Bất Động Sản</a></li>
              <li class="tab_hd"> <a href="/BDS/index.php">Quản Lý Hợp Đồng</a></li>
            </ul>
          </div>
          <div class="col-9 __bar-right">
            <div class="col-12 my-5">
              <p class="title_hd">Danh Sách Bất Động Sản</p>
            </div>
            <div class="col-12 d-flex align-items-center">
    <form action="" method="GET">
        <p class="__label">Tìm kiếm </p>
        <input type="text" name="query" class="__input">
        <input type="submit" value="SEARCH" class="__input-search">
    </form>
</div>
            <div class="col-12  my-4 addhd">
              <p class="add_hd">Thêm +</p>
            </div>
            <div class="col-12">
        <table class="__table-all">
            <thead>
                <th>Mã BDS</th>
                <th>Tên BDS</th>
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
              echo "<td>" . $row["Property_Code"] . "</td>";
              echo "<td>" . $row["Property_Name"] . "</td>";
              echo "<td>" . $row["Address"] . "</td>";
              echo "<td>";
              echo "<a href='property_detail.php?id=". $row["ID"] . "'><img src='img/Edit.jpg' alt='' class='update'></a>";
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
  <p class="close">x</p>
    <div class="col-7 __inner-add position-relative leftform ">
      <form action="save_property.php" method="post">
          <div class="d-flex __form-group">
              <label for="name-bds">Tên BDS</label>
              <input type="text" id="name-bds" name="bds" class="__input2">
          </div>
          <div class="d-flex __form-group">
              <label for="address">Địa chỉ</label>
              <input type="text" id="address" name="address" class="__input2">
          </div>
          <div class="d-flex __form-group">
            <label for="price">Mức giá</label>
            <input type="text" id="price" name="price" class="__input2">
          </div>
          <div class="d-flex __form-group">
              <label for="bath-room">Phòng tắm</label>
              <input type="text" id="bath-room" name="bath_room" class="__input2">
          </div>
          <div class="d-flex __form-group">
              <label for="bed-room">Phòng ngủ</label>
              <input type="text" id="bed-room" name="bed_room" class="__input2">
          </div>
          <div class="d-flex __form-group">
              <label for="description">Đặc điểm</label>
              <input type="text" id="description" name="description" class="__input2 description">
          </div>
          <div class="col-12 d-flex justify-content-end __box-save">
              <input type="submit" value="Lưu" class="save">
          </div>
      </form>
    </div>
    <div class="col-3 __inner-add position-relative rightform ">
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
    background-color: aqua;
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
    background-color: aqua;
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
    background-color: aqua;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700; margin-bottom: 20px;
    "> Hổ Trợ</div>
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