<?php
$servername = "localhost";
$username = "your_username";
$password = "";
$dbname = "your_database";

// Tạo kết nối đến CSDL
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}


$sql = "CREATE TABLE IF NOT EXISTS my_contacts (
    id INT(11) NOT NULL AUTO_INCREMENT,
    full_names varchar(255) NOT NULL,
    gender varchar(6) NOT NULL,
    contact_no varchar(75) NOT NULL,
    email varchar(255) NOT NULL,
    city varchar(255) NOT NULL,
    country varchar(255) NOT NULL,
    -- Thêm các cột khác tại đây
    PRIMARY KEY (id)
)";
$sql = "INSERT INTO my_contacts (id, full_names, gender, contact_no, email, city, country) VALUES
    (1, 'zesus', 'Male', '111', 'zesus@olympus.mt.com', 'Agos', 'Greece'),
    (2, 'Anthena', 'Female', '123', 'anthena@olympus.mt.com', 'Athens', 'Greece'),
    (3, 'Jupiter', 'Male', '783', 'jupiter@planet.pt.com', 'Rome', 'Italy'),
    (4, 'Venius', 'Female', '987', 'venus@planet.pt.com', 'Rome', 'Italy')";

if ($conn->query($sql) === TRUE) {
    echo "Bảng đã được tạo hoặc đã tồn tại.";
} else {
    echo "Lỗi trong quá trình tạo bảng: " . $conn->error;
}

// Đóng kết nối
$conn->close();
?>