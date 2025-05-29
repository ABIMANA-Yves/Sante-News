<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Santé - About Us</title>
  <script src="https://cdn.jsdelivr.net/npm/react@18.2.0/umd/react.development.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/react-dom@18.2.0/umd/react-dom.development.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@babel/standalone@7.22.5/babel.min.js"></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50 font-sans">
  <div id="root"></div>
  <script type="text/babel">
    const About = () => {
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
    <a href="support.php" className="hover:text-blue-600 transition"><i className="fas fa-headset mr-1"></i>Support</a>
                </nav>
              </div>
              
            </div>
          </header>

          {/* Hero Section */}
          <section
            className="relative bg-cover bg-center h-96 flex items-center justify-center text-center text-white"
            style={{ backgroundImage: "url('https://images.unsplash.com/photo-1576091160550-2173dba999ef?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80')" }}
          >
            <div className="absolute inset-0 bg-black opacity-50"></div>
            <div className="relative z-10">
              <h2 className="text-4xl font-bold mb-4"><i className="fas fa-heartbeat mr-2"></i>About Santé</h2>
              <p className="text-lg mb-6">Empowering Rwandans with health information, insurance guidance, and wellness tools.</p>
            </div>
          </section>

          {/* About Section */}
          <section className="py-12 px-4 bg-white">
            <div className="max-w-7xl mx-auto">
              <h3 className="text-2xl font-semibold text-blue-600 mb-6"><i className="fas fa-info-circle mr-2"></i>Our Mission</h3>
              <p className="text-gray-600 mb-6">
                Santé is a dedicated platform designed to improve the health and well-being of Rwandans by providing accessible, up-to-date health information, insurance options, and tools to track personal wellness. Our mission is to empower individuals and communities with the knowledge and resources needed to make informed health decisions, fostering a healthier Rwanda.
              </p>
              <p className="text-gray-600 mb-6">
                Launched in 2025, Santé serves as a trusted hub for health updates, preventive care tips, and connections to local healthcare providers. We aim to bridge the gap between health services and the people of Rwanda, ensuring everyone has access to vital information and support.
              </p>
            </div>
          </section>

          {/* Key Features Section */}
          <section className="py-12 px-4 bg-gray-100">
            <div className="max-w-7xl mx-auto">
              <h3 className="text-2xl font-semibold text-blue-600 mb-6"><i className="fas fa-star mr-2"></i>What We Offer</h3>
              <div className="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div className="bg-blue-50 p-6 rounded-lg shadow-md">
                  <h4 className="text-lg font-semibold text-gray-800 mb-2"><i className="fas fa-bullhorn mr-2"></i>Health Updates</h4>
                  <p className="text-gray-600">Stay informed with real-time health news and announcements tailored for Rwanda.</p>
                </div>
                
                <div className="bg-blue-50 p-6 rounded-lg shadow-md">
                  <h4 className="text-lg font-semibold text-gray-800 mb-2"><i className="fas fa-chart-line mr-2"></i>Track Wellness</h4>
                  <p className="text-gray-600">Log and monitor your health metrics to stay on top of your wellness goals.</p>
                </div>
              </div>
            </div>
          </section>

          {/* Team Section */}
          <section className="py-12 px-4 bg-white">
            <div className="max-w-7xl mx-auto">
              <h3 className="text-2xl font-semibold text-blue-600 mb-6"><i className="fas fa-users mr-2"></i>Our Team</h3>
              <p className="text-gray-600 mb-6">
                Our team at Santé consists of passionate healthcare professionals, tech experts, and community advocates working together to deliver reliable and accessible health solutions. We are committed to supporting the Rwandan community with innovative tools and resources.
              </p>
            </div>
          </section>

          {/* Contact Section */}
          <section className="py-12 px-4 bg-gray-100">
            <div className="max-w-7xl mx-auto">
              <h3 className="text-2xl font-semibold text-blue-600 mb-6"><i className="fas fa-envelope mr-2"></i>Contact Us</h3>
              <div className="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
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
 
                  <div className="space-y-4">
                    
                  </div>
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
                <p><a href="health-topics" className="text-gray-300 hover:text-white transition"><i className="fas fa-book-medical mr-1"></i>Health Topics</a></p>
                <p><a href="updates" className="text-gray-300 hover:text-white transition"><i className="fas fa-bullhorn mr-1"></i>Updates</a></p>
                <p><a href="recents" className="text-gray-300 hover:text-white transition"><i className="fas fa-history mr-1"></i>Recents</a></p>
                <p><a href="upcoming" className="text-gray-300 hover:text-white transition"><i className="fas fa-calendar-alt mr-1"></i>Upcoming</a></p>
              </div>
              <div>
                <h4 className="text-lg font-semibold mb-4"><i className="fas fa-phone mr-2"></i>Connect with Us</h4>
                <p><i className="fas fa-phone-alt mr-1"></i>Questions? Call +250 729 598 007</p>
                <p><a href="support" className="text-gray-300 hover:text-white transition"><i className="fas fa-headset mr-1"></i>Find Local Help</a></p>
                <p><a href="blog" className="text-gray-300 hover:text-white transition"><i className="fas fa-blog mr-1"></i>Visit the Santé Blog</a></p>
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
                <a href="contact" className="hover:text-white transition"><i className="fas fa-envelope mr-1"></i>Contact Us</a> | 
                <a href="login.php" className=" text-white px-4 py-2 ">Log in</a>
                <a href="privacy-policy" className="hover:text-white transition"><i className="fas fa-lock mr-1"></i>Privacy Policy</a> | 
                <a href="accessibility" className="hover:text-white transition"><i className="fas fa-universal-access mr-1"></i>Accessibility</a>
              </p>
            </div>
          </footer>
        </div>
      );
    };

    ReactDOM.render(<About />, document.getElementById('root'));
  </script>
</body>
</html>