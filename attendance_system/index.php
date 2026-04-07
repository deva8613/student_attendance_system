<!DOCTYPE html>
<html>
<head>
    <title>Attendance System</title>
    <link rel="stylesheet" href="assets/css/style.css">

    <style>
    /* Contact Section */
    .contact-section {
        margin: 100px 50px;
        display: flex;
        flex-wrap: wrap;
        gap: 30px;
    }

    .contact-info {
        flex: 1;
        min-width: 250px;
        color: white;
    }

    .contact-info h2 {
        margin-bottom: 20px;
    }

    .info-box {
        background: rgba(255,255,255,0.2);
        padding: 15px;
        border-radius: 15px;
        margin-bottom: 15px;
        backdrop-filter: blur(10px);
    }

    .contact-form {
        flex: 1;
        min-width: 250px;
        background: rgba(255,255,255,0.2);
        padding: 25px;
        border-radius: 20px;
        backdrop-filter: blur(15px);
    }

    .contact-form input,
    .contact-form textarea {
        width: 100%;
        padding: 10px;
        margin: 10px 0;
        border: none;
        border-radius: 10px;
    }

    .contact-form button {
        padding: 10px 20px;
        border: none;
        background: #ff7eb3;
        color: white;
        border-radius: 10px;
        cursor: pointer;
        transition: 0.3s;
    }

    .contact-form button:hover {
        transform: scale(1.05);
    }
    </style>
</head>

<body>

<!-- Navbar -->
<header class="navbar">
    <h2>🎓 Attendance</h2>
    <div>
        <a href="#">Home</a>
        <a href="pages/register.html">Register</a>
        <a href="pages/login.html">Login</a>
        <a href="#contact">Contact</a>
    </div>
</header>

<!-- Hero Section -->
<section class="hero">
    <h1>Smart Attendance System</h1>
    <p>Track, Manage & Analyze Student Attendance Easily</p>
    <a href="pages/login.html">
        <button>Start Now</button>
    </a>
</section>

<!-- Contact Section -->
<section class="contact-section" id="contact">

    <!-- Contact Info -->
    <div class="contact-info">
        <h2>📞 Contact Us</h2>

        <div class="info-box">
            📧 Email: admin@gmail.com
        </div>

        <div class="info-box">
            📱 Phone: +91 9876543210
        </div>

        <div class="info-box">
            📍 Location: Tamil Nadu, India
        </div>
    </div>

</section>

</body>
</html>