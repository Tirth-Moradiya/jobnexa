<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JobNexa - Sign Up</title>
    <link rel="stylesheet" href="../css/ex.css">
</head>

<body>
    <h1>JobNexa</h1>
    <div class="container">

        <h2>Sign Up</h2>
        <div class="form-group">
            <label for="user-type">Sign Up As:</label>
            <select id="user-type" onchange="showSignupForm()">
                <option value="user">User</option>
                <option value="employer">Employer</option>
            </select>
        </div>
        <div id="user-signup" class="signup-form">
            <h3>User Sign Up</h3>
            <form action="user_signup_process.php" method="POST">
                <div class="form-group">
                    <label for="user_id">User ID:</label>
                    <input type="text" id="user_id" name="user_id" required>
                </div>
                <div class="form-group">
                    <label for="user_name">Username:</label>
                    <input type="text" id="user_name" name="user_name" required>
                </div>
                <div class="form-group">
                    <label for="user_email">Email:</label>
                    <input type="email" id="user_email" name="user_email" required>
                </div>
                <div class="form-group">
                    <label for="user_password">Password:</label>
                    <input type="password" id="user_password" name="user_password" required>
                </div>
                <div class="form-group">
                    <label for="user_gender">Gender:</label>
                    <input type="text" id="user_gender" name="user_gender">
                </div>
                <div class="form-group">
                    <label for="user_phonenumber">Phone Number:</label>
                    <input type="text" id="user_phonenumber" name="user_phonenumber">
                </div>
                <div class="form-group">
                    <label for="user_address">Address:</label>
                    <input type="text" id="user_address" name="user_address">
                </div>
                <div class="form-group">
                    <label for="user_state">State:</label>
                    <input type="text" id="user_state" name="user_state">
                </div>
                <div class="form-group">
                    <label for="user_city">City:</label>
                    <input type="text" id="user_city" name="user_city">
                </div>
                <button type="submit">Sign Up</button>
            </form>
        </div>
        <div id="employer-signup" class="signup-form" style="display: none;">
            <h3>Employer Sign Up</h3>
            <form action="employer_signup_process.php" method="POST">
                <div class="form-group">
                    <label for="employer_id">Employer ID:</label>
                    <input type="text" id="employer_id" name="employer_id" required>
                </div>
                <div class="form-group">
                    <label for="employer_name">Employer Name:</label>
                    <input type="text" id="employer_name" name="employer_name" required>
                </div>
                <div class="form-group">
                    <label for="employer_email">Email:</label>
                    <input type="email" id="employer_email" name="employer_email" required>
                </div>
                <div class="form-group">
                    <label for="employer_password">Password:</label>
                    <input type="password" id="employer_password" name="employer_password" required>
                </div>
                <div class="form-group">
                    <label for="employer_company">Company:</label>
                    <input type="text" id="employer_company" name="employer_company" required>
                </div>
                <div class="form-group">
                    <label for="industry_name">Industry Name:</label>
                    <input type="text" id="industry_name" name="industry_name" required>
                </div>
                <div class="form-group">
                    <label for="website">Website:</label>
                    <input type="text" id="website" name="website">
                </div>
                <button type="submit">Sign Up</button>
            </form>
        </div>
    </div>

    <script>
        function showSignupForm() {
            var userType = document.getElementById("user-type").value;
            if (userType === "user") {
                document.getElementById("user-signup").style.display = "block";
                document.getElementById("employer-signup").style.display = "none";
            } else {
                document.getElementById("user-signup").style.display = "none";
                document.getElementById("employer-signup").style.display = "block";
            }
        }
    </script>
</body>

</html>

</body>

</html>