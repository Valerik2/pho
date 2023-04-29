<?php

$dsn = 'mysql:host=localhost;dbname=photosenter';
$username = "root";
$password = "";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
];

try {
    $pdo = new PDO($dsn, $username, $password, $options);
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

$name = filter_var(substr($_POST['name'], 0, 50), FILTER_SANITIZE_STRING); 
$phone = filter_var($_POST['phone'], FILTER_SANITIZE_STRING); 

if (!preg_match("/^[0-9]{10}$/", $phone)) {
    die("Invalid phone number.");
}

$sql = "SELECT * FROM client WHERE full_name = :name AND phone_number = :phone";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':name', $name);
$stmt->bindParam(':phone', $phone);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    while($row = $stmt->fetch()) {
        echo "Name: " . htmlspecialchars($row["full_name"]). "<br>Phone: " . htmlspecialchars($row["phone_number"]). "<br>";
        header("Location: d4.php");
    }
}else {
    $sql = "INSERT INTO client (full_name, phone_number) VALUES (:name, :phone)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':phone', $phone);

    if ($stmt->execute()) {
         header("Location: d4.php");
        exit;
    } else {
        die("Error in query execution: " . print_r($stmt->errorInfo(), true));
    }
}

$pdo = null;

?>
