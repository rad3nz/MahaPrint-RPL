<?php
// order.php

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data
    $ukuran = $_POST["ukuran"];
    $bahan = $_POST["bahan"];
    $finishing = $_POST["finishing"];
    $jumlah = $_POST["jumlah"];
    $file = $_FILES["file"];

    // Database connection configuration
    $host = "your_host";
    $dbname = "mahaPrint";
    $username = "your_username";
    $password = "your_password";

    // Create a new PDO instance
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    // Insert the order details into the "orders" table
    $sql = "INSERT INTO orders (productID, userID, jumlahOrder, tglOrder) VALUES (:productID, :userID, :jumlahOrder, NOW())";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":productID", $productID);
    $stmt->bindParam(":userID", $userID);
    $stmt->bindParam(":jumlahOrder", $jumlah);
    
    // Set the productID and userID based on your logic (retrieve them from the database or session)
    $productID = 1; // Assuming the productID for posters is 1
    $userID = 1; // Assuming the userID of the currently logged-in user is 1
    
    // Execute the statement
    $stmt->execute();

    // Retrieve the last inserted orderID
    $orderID = $pdo->lastInsertId();

    // Move the uploaded file to a specific directory
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($file["name"]);
    move_uploaded_file($file["tmp_name"], $targetFile);

    // Display a success message
    echo "Order placed successfully. Your order ID is: " . $orderID;
}
?>
