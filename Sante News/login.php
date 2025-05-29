<?php
session_start();
require 'db_config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $stmt = $conn->prepare("SELECT id, password FROM admins WHERE username = ?");
    $stmt->execute([$username]);
    $admin = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($admin && password_verify($password, $admin['password'])) {
        $_SESSION['admin_id'] = $admin['id'];
        header("Location: admin.php");
        exit;
    } else {
        $error = "Invalid credentials";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Santé - Admin Login</title>
    <script src="https://cdn.jsdelivr.net/npm/react@18.2.0/umd/react.development.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/react-dom@18.2.0/umd/react-dom.development.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@babel/standalone@7.22.5/babel.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100 font-sans">
    <div id="root"></div>
    <script type="text/babel">
        const Login = () => {
            return (
                <div className="min-h-screen flex flex-col">
                    {/* Navbar */}
                    <header className="bg-white text-gray-800 p-4 shadow-md sticky top-0 z-10">
                        <div className="max-w-7xl mx-auto flex justify-between items-center">
                            <div className="flex items-center">
                                <h1 className="text-2xl font-bold text-blue-600"><i className="fas fa-heartbeat mr-2"></i>Santé</h1>
                                <nav className="ml-8 space-x-6">
                                    <a href="index.php" className="hover:text-blue-600 transition"><i className="fas fa-home mr-1"></i>Home</a>
                                    <a href="about.php" className="hover:text-blue-600 transition"><i className="fas fa-info-circle mr-1"></i>About</a>
                                    <a href="support.php" className="hover:text-blue-600 transition"><i className="fas fa-headset mr-1"></i>Support</a>
                                </nav>
                            </div>
                            
                        </div>
                    </header>

                    {/* Login Form */}
                    <div className="flex items-center justify-center flex-grow">
                        <div className="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">
                            <h2 className="text-2xl font-bold mb-4 text-center text-gray-800"><i className="fas fa-lock mr-2"></i>Admin Login</h2>
                            {<?php echo isset($error) ? json_encode($error) : 'null'; ?> && (
                                <p className="text-red-500 mb-4 text-center"><i className="fas fa-exclamation-circle mr-1"></i><?php echo isset($error) ? htmlspecialchars($error) : ''; ?></p>
                            )}
                            <form method="POST" className="space-y-4">
                                <input
                                    type="text"
                                    name="username"
                                    placeholder="Username"
                                    required
                                    className="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                                />
                                <input
                                    type="password"
                                    name="password"
                                    placeholder="Password"
                                    required
                                    className="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                                />
                                <button
                                    type="submit"
                                    className="w-full bg-blue-600 text-white p-2 rounded-lg hover:bg-blue-700 transition"
                                >
                                    <i className="fas fa-sign-in-alt mr-1"></i>Login
                                </button>
                            </form>
                            
                        </div>
                    </div>

                    {/* Footer */}
                    <footer className="bg-gray-800 text-white py-8 px-4">
                        <div className="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">
                            <div>
                                <h4 className="text-lg font-semibold mb-4"><i className="fas fa-book mr-2"></i>Resources</h4>
                                <p><a href="about.php" className="text-gray-300 hover:text-white transition"><i className="fas fa-info-circle mr-1"></i>About Santé</a></p>
                                <p><a href="updates.php" className="text-gray-300 hover:text-white transition"><i className="fas fa-bullhorn mr-1"></i>Updates</a></p>
                                <p><a href="upcoming.php" className="text-gray-300 hover:text-white transition"><i className="fas fa-calendar-alt mr-1"></i>Upcoming</a></p>
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

        ReactDOM.render(<Login />, document.getElementById('root'));
    </script>
</body>
</html>