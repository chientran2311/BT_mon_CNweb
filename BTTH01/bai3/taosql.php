<?php
require 'connection.php'; // Kết nối đến cơ sở dữ liệu

// Đọc dữ liệu từ file CSV
$file = fopen('data.csv', 'r');
if ($file !== false) {
    $sql = "INSERT INTO csv (username, password, lastname, firstname, city, email, course) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Bỏ qua dòng đầu tiên nếu nó chứa tên cột
    fgetcsv($file); 

    // Đọc từng dòng trong CSV và chèn vào cơ sở dữ liệu
    while (($data = fgetcsv($file)) !== false) {
        $stmt->execute([
            $data[0], // username
            $data[1], // password
            $data[2], // lastname
            $data[3], // firstname
            $data[4], // city
            $data[5], // email
            $data[6], // course
        ]);
    }

    fclose($file);
    echo "Dữ liệu đã được chèn thành công!";
} else {
    echo "Không thể mở file CSV.";
}
?>
