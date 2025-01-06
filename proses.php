<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $name = htmlspecialchars($_POST["name"]);
  $email = htmlspecialchars($_POST["email"]);
  $message = htmlspecialchars($_POST["message"]);

  // Contoh penyimpanan ke database
  $conn = new mysqli("localhost", "username", "password", "database_name");

  if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
  }

  $sql = "INSERT INTO contacts (name, email, message) VALUES ('$name', '$email', '$message')";
  if ($conn->query($sql) === TRUE) {
    echo "Pesan berhasil dikirim.";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
}
?>