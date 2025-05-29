<?php
header('Content-Type: application/json');
require 'db_config.php';
session_start();

$action = $_GET['action'] ?? '';

if ($action === 'get_updates') {
    $today = date('Y-m-d');
    $yesterday = date('Y-m-d', strtotime('-1 day'));
    $updates = $conn->query("SELECT * FROM updates WHERE DATE(date) = '$today' ORDER BY date DESC")->fetchAll(PDO::FETCH_ASSOC);
    $upcoming = $conn->query("SELECT * FROM updates WHERE DATE(date) > '$today' ORDER BY date ASC")->fetchAll(PDO::FETCH_ASSOC);
    $last = $conn->query("SELECT * FROM updates WHERE DATE(date) <= '$yesterday' ORDER BY date DESC")->fetchAll(PDO::FETCH_ASSOC);

    foreach ([$updates, $upcoming, $last] as &$category) {
        foreach ($category as &$update) {
            $stmt = $conn->prepare("SELECT COUNT(*) as like_count FROM likes WHERE update_id = ?");
            $stmt->execute([$update['id']]);
            $update['like_count'] = $stmt->fetch(PDO::FETCH_ASSOC)['like_count'];

            $stmt = $conn->prepare("SELECT * FROM comments WHERE update_id = ? ORDER BY created_at DESC");
            $stmt->execute([$update['id']]);
            $update['comments'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }
    echo json_encode(['updates' => $updates, 'upcoming' => $upcoming, 'last' => $last]);
    exit;
}

if ($action === 'add_update' && isset($_SESSION['admin_id'])) {
    $data = json_decode(file_get_contents('php://input'), true);
    $title = $data['title'];
    $content = $data['content'];
    $date = $data['date'];
    $image = $data['image'] ?? null;
    $today = date('Y-m-d');
    $category = (date('Y-m-d', strtotime($date)) == $today) ? 'updates' : (strtotime($date) > time() ? 'upcoming' : 'last');

    $stmt = $conn->prepare("INSERT INTO updates (title, content, date, category, image) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$title, $content, $date, $category, $image]);
    echo json_encode(['success' => true]);
    exit;
}

if ($action === 'edit_update' && isset($_SESSION['admin_id'])) {
    $data = json_decode(file_get_contents('php://input'), true);
    $id = $data['id'];
    $title = $data['title'];
    $content = $data['content'];
    $date = $data['date'];
    $image = $data['image'] ?? null;
    $today = date('Y-m-d');
    $category = (date('Y-m-d', strtotime($date)) == $today) ? 'updates' : (strtotime($date) > time() ? 'upcoming' : 'last');

    $stmt = $conn->prepare("UPDATE updates SET title = ?, content = ?, date = ?, category = ?, image = ? WHERE id = ?");
    $stmt->execute([$title, $content, $date, $category, $image, $id]);
    echo json_encode(['success' => true]);
    exit;
}

if ($action === 'delete_update' && isset($_SESSION['admin_id'])) {
    $data = json_decode(file_get_contents('php://input'), true);
    $id = $data['id'];
    $stmt = $conn->prepare("DELETE FROM updates WHERE id = ?");
    $stmt->execute([$id]);
    echo json_encode(['success' => true]);
    exit;
}

if ($action === 'add_like') {
    $data = json_decode(file_get_contents('php://input'), true);
    $update_id = $data['update_id'];
    $user_ip = $_SERVER['REMOTE_ADDR'];
    $created_at = date('Y-m-d H:i:s');

    $stmt = $conn->prepare("SELECT COUNT(*) as count FROM likes WHERE update_id = ? AND user_ip = ?");
    $stmt->execute([$update_id, $user_ip]);
    if ($stmt->fetch(PDO::FETCH_ASSOC)['count'] == 0) {
        $stmt = $conn->prepare("INSERT INTO likes (update_id, user_ip, created_at) VALUES (?, ?, ?)");
        $stmt->execute([$update_id, $user_ip, $created_at]);
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Already liked']);
    }
    exit;
}

if ($action === 'add_comment') {
    $data = json_decode(file_get_contents('php://input'), true);
    $update_id = $data['update_id'];
    $content = $data['content'];
    $created_at = date('Y-m-d H:i:s');

    $stmt = $conn->prepare("INSERT INTO comments (update_id, content, created_at) VALUES (?, ?, ?)");
    $stmt->execute([$update_id, $content, $created_at]);
    echo json_encode(['success' => true]);
    exit;
}

if ($action === 'check_session') {
    echo json_encode(['loggedIn' => isset($_SESSION['admin_id'])]);
    exit;
}

echo json_encode(['error' => 'Invalid action']);
?>