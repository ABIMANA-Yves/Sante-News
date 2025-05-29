<?php
session_start();
require 'db_config.php';

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add'])) {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $date = $_POST['date'];
        $today = date('Y-m-d');
        $category = (date('Y-m-d', strtotime($date)) == $today) ? 'updates' : (strtotime($date) > time() ? 'upcoming' : 'last');
        
        $stmt = $conn->prepare("INSERT INTO updates (title, content, date, category) VALUES (?, ?, ?, ?)");
        $stmt->execute([$title, $content, $date, $category]);
    } elseif (isset($_POST['edit'])) {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        $date = $_POST['date'];
        $today = date('Y-m-d');
        $category = (date('Y-m-d', strtotime($date)) == $today) ? 'updates' : (strtotime($date) > time() ? 'upcoming' : 'last');
        
        $stmt = $conn->prepare("UPDATE updates SET title = ?, content = ?, date = ?, category = ? WHERE id = ?");
        $stmt->execute([$title, $content, $date, $category, $id]);
    } elseif (isset($_POST['delete'])) {
        $id = $_POST['id'];
        $stmt = $conn->prepare("DELETE FROM updates WHERE id = ?");
        $stmt->execute([$id]);
    } elseif (isset($_POST['delete_message'])) {
        $id = $_POST['message_id'];
        $stmt = $conn->prepare("DELETE FROM messages WHERE id = ?");
        $stmt->execute([$id]);
    }
}

$updates = $conn->query("SELECT * FROM updates ORDER BY date DESC")->fetchAll(PDO::FETCH_ASSOC);
$messages = $conn->query("SELECT * FROM messages ORDER BY created_at DESC")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Santé - Admin Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/react@18.2.0/umd/react.development.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/react-dom@18.2.0/umd/react-dom.development.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@babel/standalone@7.22.5/babel.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50 font-sans">
    <div id="root"></div>
    <script type="text/babel">
        const Admin = () => {
            return (
                <div className="min-h-screen flex flex-col">
                    {/* Header */}
                    <header className="bg-white text-gray-800 p-4 shadow-md sticky top-0 z-10">
                        <div className="max-w-7xl mx-auto flex justify-between items-center">
                            <div className="flex items-center">
                                <h1 className="text-2xl font-bold text-blue-600"><i className="fas fa-heartbeat mr-2"></i>Santé Admin</h1>
                                <nav className="ml-8 space-x-6">
                  <a href="about.php" className="hover:text-blue-600 transition"><i className="fas fa-info-circle mr-1"></i>About</a>
                  <a href="updates.php" className="hover:text-blue-600 transition"><i className="fas fa-bullhorn mr-1"></i>Updates</a>
                  <a href="upcoming.php" className="hover:text-blue-600 transition"><i className="fas fa-calendar-alt mr-1"></i>Upcoming</a>
                  <a href="support.php" className="text-blue-600 font-semibold"><i className="fas fa-headset mr-1"></i>Support</a>
                                </nav>
                            </div>
                            <div className="flex items-center space-x-4">
                                <a href="logout.php" className="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition"><i className="fas fa-sign-out-alt mr-1"></i>Logout</a>
                            </div>
                        </div>
                    </header>

                    {/* Admin Content */}
                    <section className="py-12 px-4 bg-white">
                        <div className="max-w-7xl mx-auto">
                            {/* Add Update */}
                            <div id="updates" className="mb-12">
                                <h2 className="text-2xl font-semibold text-blue-600 mb-6"><i className="fas fa-bullhorn mr-2"></i>Add New Update</h2>
                                <form method="POST" className="space-y-4 bg-blue-50 p-4 rounded-lg shadow-md">
                                    <input
                                        type="text"
                                        name="title"
                                        placeholder="Title"
                                        required
                                        className="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                                    />
                                    <textarea
                                        name="content"
                                        placeholder="Content"
                                        required
                                        className="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                                    ></textarea>
                                    <input
                                        type="datetime-local"
                                        name="date"
                                        required
                                        className="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                                    />
                                    <button
                                        type="submit"
                                        name="add"
                                        className="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition"
                                    >
                                        <i className="fas fa-plus mr-1"></i>Add Update
                                    </button>
                                </form>
                            </div>

                            {/* Manage Updates */}
                            <div className="mb-12">
                                <h2 className="text-2xl font-semibold text-blue-600 mb-6"><i className="fas fa-edit mr-2"></i>Manage Updates</h2>
                                {<?php echo json_encode($updates); ?>.map(update => (
                                    <div key={update.id} className="mb-4 p-4 border rounded-lg bg-blue-50 shadow-md">
                                        <form method="POST" className="space-y-4">
                                            <input type="hidden" name="id" value={update.id} />
                                            <input
                                                type="text"
                                                name="title"
                                                defaultValue={update.title}
                                                required
                                                className="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                                            />
                                            <textarea
                                                name="content"
                                                defaultValue={update.content}
                                                required
                                                className="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                                            ></textarea>
                                            <input
                                                type="datetime-local"
                                                name="date"
                                                defaultValue={new Date(update.date).toISOString().slice(0, 16)}
                                                required
                                                className="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                                            />
                                            <div className="flex space-x-2">
                                                <button
                                                    type="submit"
                                                    name="edit"
                                                    className="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition"
                                                >
                                                    <i className="fas fa-edit mr-1"></i>Edit
                                                </button>
                                                <button
                                                    type="submit"
                                                    name="delete"
                                                    className="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition"
                                                >
                                                    <i className="fas fa-trash mr-1"></i>Delete
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                ))}
                            </div>

                            {/* Manage Messages */}
                            <div id="messages">
                                <h2 className="text-2xl font-semibold text-blue-600 mb-6"><i className="fas fa-envelope mr-2"></i>User Messages</h2>
                                {<?php echo json_encode($messages); ?>.map(message => (
                                    <div key={message.id} className="mb-4 p-4 border rounded-lg bg-blue-50 shadow-md">
                                        <form method="POST" className="space-y-4">
                                            <input type="hidden" name="message_id" value={message.id} />
                                            <p className="text-gray-600"><strong>Name:</strong> {message.name}</p>
                                            <p className="text-gray-600"><strong>Email:</strong> {message.email}</p>
                                            <p className="text-gray-600"><strong>Message:</strong> {message.message}</p>
                                            <p className="text-sm text-gray-500"><i className="fas fa-clock mr-1"></i>{new Date(message.created_at).toLocaleString()}</p>
                                            <button
                                                type="submit"
                                                name="delete_message"
                                                className="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition"
                                            >
                                                <i className="fas fa-trash mr-1"></i>Delete
                                            </button>
                                        </form>
                                    </div>
                                ))}
                            </div>
                        </div>
                    </section>

                    {/* Footer */}
                    <footer className="bg-gray-800 text-white py-8 px-4">
                        <div className="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">
                            <div>
                                <h4 className="text-lg font-semibold mb-4"><i className="fas fa-book mr-2"></i>Resources</h4>
                                <p><a href="about.html" className="text-gray-300 hover:text-white transition"><i className="fas fa-info-circle mr-1"></i>About Santé</a></p>
                                <p><a href="updates.html" className="text-gray-300 hover:text-white transition"><i className="fas fa-bullhorn mr-1"></i>Updates</a></p>
                                <p><a href="upcoming.html" className="text-gray-300 hover:text-white transition"><i className="fas fa-calendar-alt mr-1"></i>Upcoming</a></p>
                            </div>
                            <div>
                                <h4 className="text-lg font-semibold mb-4"><i className="fas fa-phone mr-2"></i>Connect with Us</h4>
                                <p><i className="fas fa-phone-alt mr-1"></i>Questions? Call +250 123 456 789</p>
                                <p><a href="support.php" className="text-gray-300 hover:text-white transition"><i className="fas fa-headset mr-1"></i>Find Local Help</a></p>
                                <div className="flex space-x-4 mt-4">
                                    <a href="#" className="text-gray-300 hover:text-white transition"><i className="fab fa-facebook-f"></i></a>
                                    <a href="#" className="text-gray-300 hover:text-white transition"><i className="fab fa-twitter"></i></a>
                                    <a href="#" className="text-gray-300 hover:text-white transition"><i className="fab fa-youtube"></i></a>
                                </div>
                            </div>
                            <div>
                                <h4 className="text-lg font-semibold mb-4"><i className="fas fa-globe mr-2"></i>Languages</h4>
                                <p><a href="#" className="text-gray-300 hover:text-white transition"><i className="fas fa-language mr-1"></i>English</a></p>
                                <p><a href="#" className="text-gray-300 hover:text-white transition"><i className="fas fa-language mr-1"></i>Français</a></p>
                                <p><a href="#" className="text-gray-300 hover:text-white transition"><i className="fas fa-language mr-1"></i>Español</a></p>
                            </div>
                        </div>
                        <div className="mt-8 text-center text-sm text-gray-400">
                            <p>© 2025 Santé. All rights reserved.</p>
                            <p>
                                <a href="support.php" className="hover:text-white transition"><i className="fas fa-envelope mr-1"></i>Contact Us</a> | 
                                <a href="privacy-policy" className="hover:text-white transition"><i className="fas fa-lock mr-1"></i>Privacy Policy</a> | 
                                <a href="accessibility" className="hover:text-white transition"><i className="fas fa-universal-access mr-1"></i>Accessibility</a>
                            </p>
                        </div>
                    </footer>
                </div>
            );
        };

        ReactDOM.render(<Admin />, document.getElementById('root'));
    </script>
</body>
</html>