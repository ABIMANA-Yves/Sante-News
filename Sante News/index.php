<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Santé - Your Health & Insurance Hub</title>
  <script src="https://cdn.jsdelivr.net/npm/react@18.2.0/umd/react.development.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/react-dom@18.2.0/umd/react-dom.development.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@babel/standalone@7.22.5/babel.min.js"></script>
  <script src="https://cdn.tailwindcss.com"></script>
</head>


<body class="bg-gray-50 font-sans">
  <div id="root"></div>
  <script type="text/babel">
    const App = () => {
      const [category, setCategory] = React.useState('updates');
      const [updates, setUpdates] = React.useState([]);
      const [upcoming, setUpcoming] = React.useState([]);
      const [last, setLast] = React.useState([]);

      React.useEffect(() => {
        fetch('api.php?action=get_updates')
          .then(response => response.json())
          .then(data => {
            setUpdates(data.updates);
            setUpcoming(data.upcoming);
            setLast(data.last);
          });
      }, []);

      const displayedUpdates = category === 'updates' ? updates : category === 'upcoming' ? upcoming : last;

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
            style={{ backgroundImage: "url('https://images.unsplash.com/photo-1600585154340-be6161a56a0c?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80')" }}
          >
            <div className="absolute inset-0 bg-black opacity-50"></div>
            <div className="relative z-10">
              <h2 className="text-4xl font-bold mb-4">Welcome to Santé</h2>
              <p className="text-lg mb-6">Your trusted hub for health information, insurance options, and wellness tracking.</p>
              <select
                value={category}
                onChange={(e) => setCategory(e.target.value)}
                className="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition focus:outline-none"
              >
                <option value="updates">Today's Updates</option>
                <option value="upcoming">Upcoming Updates</option>
                <option value="last">Past Updates</option>
              </select>
            </div>
          </section>

          {/* Updates Section */}
          <section className="py-12 px-4 bg-white">
            <div className="max-w-7xl mx-auto">
              <h3 className="text-2xl font-semibold text-gray-800 mb-6">
                {category === 'updates' ? "Today's Updates" : category === 'upcoming' ? 'Upcoming Updates' : 'Past Updates'}
              </h3>
              <div className="grid grid-cols-1 md:grid-cols-3 gap-6">
                {displayedUpdates.map(update => (
                  <div key={update.id} className="bg-blue-50 p-4 rounded-lg shadow-md">
                    <h4 className="text-lg font-semibold text-blue-600">{update.title}</h4>
                    <p className="text-gray-600 mt-2">{update.content}</p>
                    <p className="text-sm text-gray-500 mt-2">{new Date(update.date).toLocaleString()}</p>
                  </div>
                ))}
              </div>
            </div>
          </section>

          {/* Quick Actions Section */}
          <section className="py-12 px-4 bg-white">
            <div className="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-6">
              
            </div>
          </section>


          {/* Health Tips Section */}
          <section className="py-12 px-4 bg-white">
            <div className="max-w-7xl mx-auto flex flex-col md:flex-row items-center gap-8">
              <div className="md:w-1/2">
                <img
                  src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80"
                  alt="Person reading health guide"
                  className="w-full h-64 object-cover rounded-lg shadow-md"
                />
              </div>
              <div className="md:w-1/2">
                <h3 className="text-2xl font-semibold text-blue-600 mb-4">Stay Healthy with Expert Tips</h3>
                <p className="text-gray-600 mb-4">Discover ways to maintain your wellness with our curated health guides.</p>
                <p className="text-blue-600 hover:underline"><a href="/health-topics">How to Manage Stress Effectively</a></p>
                <p className="text-blue-600 hover:underline"><a href="/health-topics">Top 5 Preventive Health Screenings</a></p>
              </div>
            </div>
          </section>

          {/* Doctor Finder Section */}
          <section className="py-12 px-4 bg-gray-100">
            <div className="max-w-7xl mx-auto flex flex-col md:flex-row-reverse items-center gap-8">
              <div className="md:w-1/2">
                <img
                  src="https://images.unsplash.com/photo-1584516150909-c43483ee7935?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80"
                  alt="Doctor checking patient's health"
                  className="w-full h-64 object-cover rounded-lg shadow-md"
                />
              </div>
              
            </div>
          </section>

          {/* Quick Info Section */}
          <section className="py-12 px-4 bg-white">
            <div className="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-6">
              <div className="bg-blue-50 p-6 rounded-lg shadow-md">
                <h4 className="text-lg font-semibold text-gray-800 mb-2">Check Your Eligibility</h4>
                <p className="text-gray-600">Find out if you can enroll or change plans today.</p>
              </div>
              <div className="bg-blue-50 p-6 rounded-lg shadow-md">
                <h4 className="text-lg font-semibold text-gray-800 mb-2">Understand Insurance Options</h4>
                <p className="text-gray-600">Get tips to choose the best plan for your needs.</p>
              </div>
              <div className="bg-blue-50 p-6 rounded-lg shadow-md">
                <h4 className="text-lg font-semibold text-gray-800 mb-2">Track Your Health Metrics</h4>
                <p className="text-gray-600">Log your health data and stay on top of your wellness.</p>
              </div>
            </div>
          </section>

          {/* Footer */}
          <footer className="bg-gray-800 text-white py-8 px-4">
            <div className="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">
              
              <div>
                <h4 className="text-lg font-semibold mb-4">Connect with Us</h4>
                <p>Questions? Call +250 729 598 007</p>
                <p><a href="/support" className="text-gray-300 hover:text-white transition">Find Local Help</a></p>
                <p><a href="/blog" className="text-gray-300 hover:text-white transition">Visit the Santé Blog</a></p>
                <div className="flex space-x-4 mt-4">
                  <a href="#" className="text-gray-300 hover:text-white transition">Facebook</a>
                  <a href="#" className="text-gray-300 hover:text-white transition">Twitter</a>
                  <a href="#" className="text-gray-300 hover:text-white transition">YouTube</a>
                </div>
              </div>
              <div>
                <h4 className="text-lg font-semibold mb-4">Languages</h4>
                <p><a href="#" className="text-gray-300 hover:text-white transition">English</a></p>
                <p><a href="#" className="text-gray-300 hover:text-white transition">Français</a></p>
                <p><a href="#" className="text-gray-300 hover:text-white transition">Español</a></p>
              </div>
            </div>
            <div className="mt-8 text-center text-sm text-gray-400">
              <p>© 2025 Santé. All rights reserved.</p>
              <p>
                <a href="/contact" className="hover:text-white transition">Contact Us</a> | 
                <a href="/privacy-policy" className="hover:text-white transition">Privacy Policy</a> | 
                <a href="/accessibility" className="hover:text-white transition">Accessibility</a>
                <a href="login.php" className=" text-white px-4 py-2 ">Log in</a>
              </p>
            </div>
          </footer>
        </div>
      );
    };

    ReactDOM.render(<App />, document.getElementById('root'));
  </script>
</body>
</html>