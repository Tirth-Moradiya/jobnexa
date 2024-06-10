<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Login Page</title>
</head>

<body class="bg-blue-50 h-screen flex items-center justify-center font-serif">
    <div class="container flex justify-center items-center h-full">
        <div class="left-side flex-1 p-8 text-center">
            <h1 class="text-4xl font-bold text-blue-900 mb-4">Welcome to JobNexa</h1>
            <p class="text-xl text-gray-700">Admin Pannel</p>
        </div>
        <div class="right-side w-full lg:w-1/2 max-w-md p-8 bg-white rounded-lg shadow-lg mx-auto lg:mr-52">
            <h2 class="text-2xl font-bold text-white bg-blue-900 p-4 rounded-t-lg text-center mb-4">Login</h2>
            <form action="login.php" method="POST" class="space-y-4">
                <div class="form-group">
                    <input type="text" id="username" name="username" placeholder="Username" required
                        class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="form-group">
                    <input type="password" id="password" name="password" placeholder="Password" required
                        class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <button type="submit"
                    class="w-full py-3 bg-blue-900 text-white rounded-lg font-semibold hover:bg-gray-700 transition duration-300">Login</button>
            </form>
        </div>
    </div>
</body>

</html>