<?php
require 'db_config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    
    try {
        $stmt = $conn->prepare("INSERT INTO admins (username, password) VALUES (?, ?)");
        $stmt->execute([$username, $password]);
        header("Location: login.php");
        exit;
    } catch (PDOException $e) {
        $error = "Username already exists";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sante - Admin Register</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white p-6 rounded shadow w-full max-w-md">
        <h2 class="text-2xl font-bold mb-4 text-center">Admin Register</h2>
        <?php if (isset($error)): ?>
            <p class="text-red-500 mb-4"><?php echo $error; ?></p>
        <?php endif; ?>
        <form method="POST" class="space-y-4">
            <input type="text" name="username" placeholder="Username" required class="w-full p-2 border rounded">
            <input type="password" name="password" placeholder="Password" required class="w-full p-2 border rounded">
            <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded">Register</button>
        </form>
        <p class="mt-4 text-center">Already have an account? <a href="login.php" class="text-blue-500">Login</a></p>
    </div>
</body>
</html>