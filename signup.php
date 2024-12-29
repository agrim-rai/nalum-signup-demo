<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>nalum - Signup </title>
    <link rel="stylesheet" href="assets/css/signup.css">
    <link rel="shortcut icon" href="assets/img/logo_new.jpg" type="image/x-icon">

</head>

<body>
    <!-- Navigation Bar -->
    <nav class="navbar">
        <div class="navbar-brand">nalum</div>
        <div class="navbar-links">
            <a href="index.php">Home</a>
            <a href="login.php">Login</a>
            <a href="contact.php">Contact</a>
        </div>
    </nav>

    <!-- Signup Container -->
    <div class="signup-container">
        <h2 class="signup-title">Request a Sign Up</h2>
        <form class="signup-form" method="post" action="backend/new_signup.php" method="POST" enctype="multipart/form-data" onsubmit="return validatePasswords()">

            <!-- Name Input -->
            <div class="form-group">
                <label for="name">E-mail</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    class="form-control"
                    placeholder="Enter email for confirmation"
                    required>
            </div>


            <!-- Password Input -->
            <div class="form-group">
                <label for="password">Password</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    class="form-control"
                    placeholder="Enter password"
                    required>
            </div>

            <!-- Confirm Password Input -->
            <div class="form-group">
                <label for="confirm-password">Confirm Password</label>
                <input
                    type="password"
                    id="confirm-password"
                    name="confirm_password"
                    class="form-control"
                    placeholder="Confirm your password"
                    required>
            </div>

            <!-- College ID Upload -->
            <div class="form-group">
                <label for="college-id">College ID</label>
                <div class="file-input1">
                    <input
                        type="file"
                        id="file"
                        name="file"
                        class="form-control"
                        accept="image/*"
                        required>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="form-group">
                <button type="submit" class="submit-btn">
                    Submit Signup
                </button>
            </div>
        </form>

        <script>
            function validatePasswords() {
                // Get the password and confirm password values
                const password = document.getElementById('password').value;
                const confirmPassword = document.getElementById('confirm-password').value;

                // Check if the passwords match
                if (password !== confirmPassword) {
                    alert('Passwords do not match. Please re-enter.');
                    return false; // Prevent form submission
                }
                return true; // Allow form submission
            }
        </script>

    </div>
</body>

</html>