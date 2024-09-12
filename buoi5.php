<?php
// Kết nối đến cơ sở dữ liệu
$dbh = mysqli_connect('localhost', 'root', '', 'in4');

// Kiểm tra kết nối
if (!$dbh) {
    die("Unable to connect to MySQL: " . mysqli_connect_error());
}

// *** Thực thi câu lệnh SELECT ***

$sql_stmt = "SELECT * FROM my_contacts";
$result = mysqli_query($dbh, $sql_stmt);

// Kiểm tra nếu thực thi câu lệnh SELECT thành công
if (!$result) {
    die("Database access failed: " . mysqli_error($dbh));
}

// Hiển thị dữ liệu từ câu lệnh SELECT
$rows = mysqli_num_rows($result); // Lấy số hàng trả về
if ($rows) {
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        echo 'ID: ' . $row['id'] . '<br>';
        echo 'Full Names: ' . $row['full_names'] . '<br>';
        echo 'Gender: ' . $row['gender'] . '<br>';
        echo 'Contact No: ' . $row['contact_no'] . '<br>';
        echo 'Email: ' . $row['email'] . '<br>';
        echo 'City: ' . $row['city'] . '<br>';
        echo 'Country: ' . $row['country'] . '<br><br>';
    }
}

// *** Thêm dữ liệu ***

$name = "Ten";
$gender = "Male";
$contact_no = "0123456789";
$email = "ten@gmail.com";
$city = "Hai Phong";
$country = "Vietnam";

// Chuẩn bị câu lệnh SQL để thêm dữ liệu
$sql_insert = "INSERT INTO my_contacts (full_names, gender, contact_no, email, city, country) VALUES (?, ?, ?, ?, ?, ?)";

// Chuẩn bị câu lệnh
$stmt = mysqli_prepare($dbh, $sql_insert);
if (!$stmt) {
    die("Prepare failed: " . mysqli_error($dbh));
}

// Gán giá trị cho các tham số
mysqli_stmt_bind_param($stmt, "ssssss", $name, $gender, $contact_no, $email, $city, $country);

// Thực thi câu lệnh INSERT
if (mysqli_stmt_execute($stmt)) {
    echo "Dữ liệu đã được thêm thành công!<br>";
} else {
    echo "Lỗi thêm dữ liệu: " . mysqli_stmt_error($stmt) . "<br>";
}

// *** Xóa dữ liệu ***

$id_to_delete = 8; // ID của bản ghi cần xóa

$sql_delete = "DELETE FROM my_contacts WHERE id = ?";

// Chuẩn bị câu lệnh DELETE
$stmt = mysqli_prepare($dbh, $sql_delete);
if (!$stmt) {
    die("Prepare failed: " . mysqli_error($dbh));
}

// Gán giá trị cho tham số ID
mysqli_stmt_bind_param($stmt, "i", $id_to_delete);

// Thực thi câu lệnh DELETE
if (mysqli_stmt_execute($stmt)) {
    echo "Dữ liệu đã được xóa thành công!<br>";
} else {
    echo "Lỗi xóa dữ liệu: " . mysqli_stmt_error($stmt) . "<br>";
}

// *** Cập nhật dữ liệu ***

$id_to_update = 1; // ID của bản ghi cần cập nhật
$name = "Ten Updated";
$gender = "Female";
$contact_no = "0987654321";
$email = "updated.ten@gmail.com";
$city = "Da Nang";
$country = "Vietnam";

// Chuẩn bị câu lệnh SQL để cập nhật dữ liệu
$sql_update = "UPDATE my_contacts SET full_names = ?, gender = ?, contact_no = ?, email = ?, city = ?, country = ? WHERE id = ?";

// Chuẩn bị câu lệnh
$stmt = mysqli_prepare($dbh, $sql_update);
if (!$stmt) {die("Prepare failed: " . mysqli_error($dbh));
}

// Gán giá trị cho các tham số
mysqli_stmt_bind_param($stmt, "ssssssi", $name, $gender, $contact_no, $email, $city, $country, $id_to_update);

// Thực thi câu lệnh UPDATE
if (mysqli_stmt_execute($stmt)) {
    echo "Dữ liệu đã được cập nhật thành công!<br>";
} else {
    echo "Lỗi cập nhật dữ liệu: " . mysqli_stmt_error($stmt) . "<br>";
}

// Đóng câu lệnh và kết nối
mysqli_stmt_close($stmt);
mysqli_close($dbh);


$conn = new PDO("mysql:host=localhost;dbname=in4", "root", "");
// Thiết lập chế độ lỗi PDO để ném ngoại lệ
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// 2. Dữ liệu để chèn vào bảng
$name = "Ten";
$gender = "Male";
$contact_no = "0123456789";
$email = "ten@gmail.com";
$city = "Hai Phong";
$country = "Vietnam";

// 3. Chuẩn bị câu truy vấn SQL
$stmt = $conn->prepare('INSERT INTO my_contacts (full_names, gender, contact_no, email, city, country) VALUES (?, ?, ?, ?, ?, ?)');

// 4. Thực thi câu truy vấn với các giá trị tương ứng
$stmt->execute([$name, $gender, $contact_no, $email, $city, $country]);
// $stmt->bindParam(1,$id);
$stmt->bindParam(1,$name);
$stmt->bindParam(2,$gender);
$stmt->bindParam(3,$contact_no);
$stmt->bindParam(4,$email);
$stmt->bindParam(5,$city);
$stmt->bindParam(6,$country);


$stmt_fetch = $conn->prepare('SELECT * from my_contacts');

$stmt_fetch->setFetchMode(PDO::FETCH_ASSOC);
$stmt_fetch->execute(array());

// Xóa dữ liệu bằng Id
$stmt = $conn->prepare('DELETE FROM my_contacts WHERE ID = ?');
$id = 5;
$stmt->execute([$id]);
// Cập nhật dữ liệu
$id = 6; // Ví dụ ID của bản ghi cần cập nhật
$name = "Ten Updated"; // Tên mới
$email = "updated.ten@gmail.com"; // Email mới
$city = "Da Nang"; // Thành phố mới

// 3. Chuẩn bị câu truy vấn SQL để cập nhật dữ liệu
$stmt = $conn->prepare('UPDATE my_contacts SET full_names = ?, email = ?, city = ? WHERE id = ?');

// 4. Thực thi câu truy vấn với giá trị mới và ID tương ứng
$stmt->execute([$name, $email, $city, $id]);
// hiển thị dữ liệu
while($row = $stmt_fetch->fetch()) {
    echo 'ID: ' . $row['id'] . '<br>';
    echo 'Full Names: ' . $row['full_names'] . '<br>';
    echo 'Gender: ' . $row['gender'] . '<br>';
    echo 'Contact No: ' . $row['contact_no'] . '<br>';
    echo 'Email: ' . $row['email'] . '<br>';
    echo 'City: ' . $row['city'] . '<br>';
    echo 'Country: ' . $row['country'] . '<br><br>';
}

?>
