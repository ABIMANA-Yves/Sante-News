<?php
require 'db_config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_message'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Basic validation
    if (!empty($name) && !empty($email) && !empty($message)) {
        $stmt = $conn->prepare("INSERT INTO messages (name, email, message) VALUES (?, ?, ?)");
        $stmt->execute([$name, $email, $message]);
        $success = "Message sent successfully!";
    } else {
        $error = "All fields are required.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Santé - Support</title>
  <script src="https://cdn.jsdelivr.net/npm/react@18.2.0/umd/react.development.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/react-dom@18.2.0/umd/react-dom.development.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@babel/standalone@7.22.5/babel.min.js"></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50 font-sans">
  <div id="root"></div>
  <script type="text/babel">
    const Support = () => {
      return (
        <div className="min-h-screen flex flex-col">
          {/* Header */}
          <header className="bg-white text-gray-800 p-4 shadow-md sticky top-0 z-10">
            <div className="max-w-7xl mx-auto flex justify-between items-center">
              <div className="flex items-center">
                <h1 className="text-2xl font-bold text-blue-600"><i className="fas fa-heartbeat mr-2"></i>Santé</h1>
                <nav className="ml-8 space-x-6">
                  <a href="index.php" className="hover:text-blue-600 transition"><i className="fas fa-home mr-1"></i>Home</a>
                  <a href="about.php" className="hover:text-blue-600 transition"><i className="fas fa-info-circle mr-1"></i>About</a>
                  <a href="support.php" className="text-blue-600 font-semibold"><i className="fas fa-headset mr-1"></i>Support</a>
                </nav>
              </div>
              
            </div>
          </header>

          {/* Support Section */}
          <section className="py-12 px-4 bg-white">
            <div className="max-w-7xl mx-auto">
              <h2 className="text-2xl font-semibold text-blue-600 mb-6"><i className="fas fa-headset mr-2"></i>Support Center</h2>
              <p className="text-gray-600 mb-6">
                We're here to help you navigate the Santé platform and answer any questions you may have. Explore our FAQs, contact us directly, or connect with local support in Rwanda.
              </p>

              {/* Success/Error Messages */}
              <?php if (isset($success)): ?>
                <div className="bg-green-100 text-green-700 p-4 rounded-lg mb-6">
                  <i className="fas fa-check-circle mr-2"></i><?php echo $success; ?>
                </div>
              <?php elseif (isset($error)): ?>
                <div className="bg-red-100 text-red-700 p-4 rounded-lg mb-6">
                  <i className="fas fa-exclamation-circle mr-2"></i><?php echo $error; ?>
                </div>
              <?php endif; ?>

              {/* FAQs */}
              <div className="mb-12">
                <h3 className="text-xl font-semibold text-gray-800 mb-4"><i className="fas fa-question-circle mr-2"></i>Frequently Asked Questions</h3>
                <div className="space-y-4">
                  <div className="bg-blue-50 p-4 rounded-lg">
                    <h4 className="text-lg font-semibold text-blue-600">How do I access health updates?</h4>
                    <p className="text-gray-600">Visit the <a href="updates.html" className="text-blue-600 hover:underline">Updates</a> page to view the latest health news and announcements.</p>
                  </div>
                  <div className="bg-blue-50 p-4 rounded-lg">
                    <h4 className="text-lg font-semibold text-blue-600">How can I contact Santé?</h4>
                    <p className="text-gray-600">Reach us via phone at +250 123 456 789, email at support@sante.rw, or use the contact form below.</p>
                  </div>
                  <div className="bg-blue-50 p-4 rounded-lg">
                    <h4 className="text-lg font-semibold text-blue-600">Can I track upcoming health events?</h4>
                    <p className="text-gray-600">Yes, check the <a href="upcoming.html" className="text-blue-600 hover:underline">Upcoming</a> page for future events and deadlines.</p>
                  </div>
                </div>
              </div>

              {/* Contact Form */}
              <div className="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                  <h3 className="text-xl font-semibold text-gray-800 mb-4"><i className="fas fa-envelope mr-2"></i>Contact Information</h3>
                  <p className="text-gray-600 mb-4"><i className="fas fa-phone-alt mr-2"></i>Phone: +250 123 456 789</p>
                  <p className="text-gray-600 mb-4"><i className="fas fa-envelope mr-2"></i>Email: support@sante.rw</p>
                  <p className="text-gray-600 mb-4"><i className="fas fa-map-marker-alt mr-2"></i>Address: Kigali, Rwanda</p>
                  <div className="flex space-x-4 mt-4">
                    <a href="#" className="text-blue-600 hover:text-blue-800"><i className="fab fa-facebook-f fa-lg"></i></a>
                    <a href="#" className="text-blue-600 hover:text-blue-800"><i className="fab fa-twitter fa-lg"></i></a>
                    <a href="#" className="text-blue-600 hover:text-blue-800"><i className="fab fa-youtube fa-lg"></i></a>
                  </div>
                </div>
                <div>
                  <h3 className="text-xl font-semibold text-gray-800 mb-4"><i className="fas fa-comment mr-2"></i>Get in Touch</h3>
                  <form method="POST" className="space-y-4">
                    <input
                      type="text"
                      name="name"
                      placeholder="Your Name"
                      className="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                    />
                    <input
                      type="email"
                      name="email"
                      placeholder="Your Email"
                      className="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                    />
                    <textarea
                      name="message"
                      placeholder="Your Message"
                      className="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                    ></textarea>
                    <button
                      type="submit"
                      name="submit_message"
                      className="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition"
                    >
                      <i className="fas fa-paper-plane mr-1"></i>Send Message
                    </button>
                  </form>
                </div>
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
                <a href="login.php" className=" text-white px-4 py-2 ">Log in</a>
                <a href="privacy-policy" className="hover:text-white transition"><i className="fas fa-lock mr-1"></i>Privacy Policy</a> | 
                <a href="accessibility" className="hover:text-white transition"><i className="fas fa-universal-access mr-1"></i>Accessibility</a>
              </p>
            </div>
          </footer>
        </div>
      );
    };

    ReactDOM.render(<Support />, document.getElementById('root'));
  </script>
</body>
</html>