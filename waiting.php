<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>nalum - Waiting Room</title>
   <link rel="stylesheet" href="assets/css/waiting.css">
</head>
<body>
    <nav class="navbar">
        <a href="#" class="logo">Nalum</a>
        <div class="menu-toggle">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <ul class="navbar-links">
            <li><a href="index.php">Home</a></li>
            <li><a href="login.php">Login</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
    </nav>

    <div class="main-content">
        <div class="container">
            <div class="verification-icon">✓</div>
            <div class="message">
                <h2>Signup Information Received</h2>
            <h2>Waiting code : <?php if(isset($_GET['waitingid']) && $_GET['waitingid'] !=''){echo $_GET['waitingid'] ;}else{header('location:notfound.php');} ?></h2>

                               <p>Our team will carefully verify the details you submitted. Once verified, we will:</p>
                <ul>
                    <li>Create your user profile</li>
                    <li>Provide you access to your account</li>
                </ul>
                <p>Please check your email in the next 24-48 hours.</p>
            </div>
        </div>
    </div>

    <script>
        // Mobile menu toggle
        const menuToggle = document.querySelector('.menu-toggle');
        const navbarLinks = document.querySelector('.navbar-links');

        menuToggle.addEventListener('click', () => {
            navbarLinks.classList.toggle('active');
        });
    </script>
</body>
</html>