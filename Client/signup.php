<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JobNexa - Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-blue-50 min-h-screen flex items-center justify-center font-serif">
    <div class="w-full max-w-3xl p-8 bg-white my-5 shadow-lg rounded-lg">
        <h1 class="text-3xl font-bold text-center mb-8">JobNexa</h1>

        <h2 class="text-2xl font-semibold text-center mb-4">Sign Up</h2>
        <div class="mb-6">
            <label for="user-type" class="block text-gray-700">Sign Up As:</label>
            <select id="user-type" onchange="showSignupForm()"
                class="w-full mt-2 p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="user">User</option>
                <option value="employer">Employer</option>
            </select>
        </div>

        <div id="user-signup" class="signup-form">
            <h3 class="text-xl font-semibold mb-4">User Sign Up</h3>
            <form action="./user/user_signup.php" method="POST" class="space-y-4">
                <!-- <label for="user_id" class="block text-gray-700">User ID:</label>
                <input type="text" id="user_id" name="user_id" required
                    class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div> -->
                <div class="form-group">
                    <label for="user_name" class="block text-gray-700">Username:</label>
                    <input type="text" id="user_name" name="user_name" required
                        class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="form-group">
                    <label for="user_email" class="block text-gray-700">Email:</label>
                    <input type="email" id="user_email" name="user_email" required
                        class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="form-group">
                    <label for="user_password" class="block text-gray-700">Password:</label>
                    <input type="password" id="user_password" name="user_password" required
                        class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="form-group">
                    <label for="user_gender" class="block text-gray-700">Gender:</label>
                    <input type="text" id="user_gender" name="user_gender"
                        class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="form-group">
                    <label for="user_phonenumber" class="block text-gray-700">Phone Number:</label>
                    <input type="text" id="user_phonenumber" name="user_phonenumber"
                        class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="form-group">
                    <label for="user_address" class="block text-gray-700">Address:</label>
                    <input type="text" id="user_address" name="user_address"
                        class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="form-group">
                    <label for="user_state" class="block text-gray-700">State:</label>
                    <input type="text" id="user_state" name="user_state"
                        class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="form-group">
                    <label for="user_city" class="block text-gray-700">City:</label>
                    <input type="text" id="user_city" name="user_city"
                        class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <button type="submit"
                    class="w-full py-3 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 transition duration-300">Sign
                    Up</button>
            </form>
        </div>

        <div id="employer-signup" class="signup-form hidden">
            <h3 class="text-xl font-semibold mb-4">Employer Sign Up</h3>
            <form action="./employer/employer_signup.php" method="POST" class="space-y-4">
                <!-- <div class="form-group">
                    <label for="employer_id" class="block text-gray-700">Employer ID:</label>
                    <input type="text" id="employer_id" name="employer_id" required
                        class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div> -->
                <div class="form-group">
                    <label for="employer_name" class="block text-gray-700">Employer Name:</label>
                    <input type="text" id="employer_name" name="employer_name" required
                        class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="form-group">
                    <label for="employer_email" class="block text-gray-700">Email:</label>
                    <input type="email" id="employer_email" name="employer_email" required
                        class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="form-group">
                    <label for="employer_password" class="block text-gray-700">Password:</label>
                    <input type="password" id="employer_password" name="employer_password" required
                        class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="form-group">
                    <label for="employer_company" class="block text-gray-700">Company:</label>
                    <input type="text" id="employer_company" name="employer_company" required
                        class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="form-group">
                    <label for="industry_name" class="block text-gray-700">Industry Name:</label>
                    <input type="text" id="industry_name" name="industry_name" required
                        class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="form-group">
                    <label for="website" class="block text-gray-700">Website:</label>
                    <input type="text" id="website" name="website"
                        class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <button type="submit"
                    class="w-full py-3 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 transition duration-300">Sign
                    Up</button>
            </form>
        </div>
    </div>

    <script>
        function showSignupForm() {
            var userType = document.getElementById("user-type").value;
            if (userType === "user") {
                document.getElementById("user-signup").classList.remove("hidden");
                document.getElementById("employer-signup").classList.add("hidden");
            } else {
                document.getElementById("user-signup").classList.add("hidden");
                document.getElementById("employer-signup").classList.remove("hidden");
            }
        }
    </script>
</body>

</html>