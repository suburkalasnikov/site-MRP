<?php
require_once 'server.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Proses input data baru
    $image = $_FILES['image']['name'];
    $image_temp = $_FILES['image']['tmp_name'];
    $title = $_POST["title"];
    $description = $_POST["description"];
    $price = $_POST["price"];

    // Menentukan lokasi penyimpanan gambar
    $upload_dir = "img/"; // Ganti dengan direktori penyimpanan yang diinginkan
    $target_file = $upload_dir . basename($image);

    // Pindahkan file yang diunggah ke lokasi penyimpanan yang ditentukan
    move_uploaded_file($image_temp, $target_file);

    // Memasukkan data baru ke dalam tabel products
    $sql = "INSERT INTO products (image, title, description, price) VALUES ('$image', '$title', '$description', $price)";
    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil ditambahkan.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
