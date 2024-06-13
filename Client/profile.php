<?php
// Start the session
session_start();

// Include database configuration
include "../Connection/db_conn.php";

// Check if the user is logged in
if (!isset($_SESSION['uid']) && !isset($_SESSION['eid'])) {
    header('Location: login.php');
    exit();
}

// Determine user type and fetch user data from the database
$user_id = isset($_SESSION['uid']) ? $_SESSION['uid'] : $_SESSION['eid'];
$user_type = $_SESSION['user_type']; // 'user' or 'employer'

if ($user_type === 'user') {
    $query = "SELECT * FROM user WHERE uid = ?";
} else if ($user_type === 'employer') {
    $query = "SELECT * FROM employer WHERE eid = ?";
}

$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$userData = $result->fetch_assoc();

// Handle form submission to update profile
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($user_type === 'user') {
        $updateQuery = "UPDATE user SET uname=?, uemail=?, upassword=?, ugender=?, uphonenumber=?, uaddress=?, ustate=?, ucity=? WHERE uid=?";
        $stmt = $conn->prepare($updateQuery);
        $stmt->bind_param("ssssssssi", $_POST['username'], $_POST['email'], $_POST['password'], $_POST['gender'], $_POST['phone_number'], $_POST['address'], $_POST['state'], $_POST['city'], $user_id);
    } else {
        $updateQuery = "UPDATE employer SET ename=?, eemail=?,epassword=?, ecompany=?, industryname=?, website=? WHERE eid=?";
        $stmt = $conn->prepare($updateQuery);
        $stmt->bind_param("ssssssi", $_POST['employer_name'], $_POST['email'], $_POST['password'], $_POST['company'], $_POST['industry_name'], $_POST['website'], $user_id);
    }

    if ($stmt->execute()) {
        echo "Profile updated successfully!";
        header("Location: ../index.php");
        exit();
    } else {
        echo "Error updating profile: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JobNexa - Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>


<body>
    <?php include "./header.php"; ?>
    <div class="bg-blue-50 min-h-screen flex items-center justify-center font-serif">
        <div class="w-full max-w-lg p-8 bg-white my-5 shadow-lg rounded-lg mt-10">
            <h1 class="text-3xl font-bold text-center mb-8">Profile</h1>
            <form action="profile.php" method="POST" class="space-y-4">
                <?php if ($user_type === 'user'): ?>
                    <div class="form-group">
                        <label for="username" class="block text-gray-700">Username:</label>
                        <input type="text" id="username" name="username"
                            value="<?php echo htmlspecialchars($userData['uname']); ?>" required
                            class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div class="form-group">
                        <label for="email" class="block text-gray-700">Email:</label>
                        <input type="email" id="email" name="email"
                            value="<?php echo htmlspecialchars($userData['uemail']); ?>" required
                            class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div class="form-group">
                        <label for="password" class="block text-gray-700">Password:</label>
                        <input type="text" id="password" name="password"
                            value="<?php echo htmlspecialchars($userData['upassword']); ?>" required
                            class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div class="form-group">
                        <label for="gender" class="block text-gray-700">Gender:</label>
                        <input type="text" id="gender" name="gender"
                            value="<?php echo htmlspecialchars($userData['ugender']); ?>"
                            class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div class="form-group">
                        <label for="phone_number" class="block text-gray-700">Phone Number:</label>
                        <input type="text" id="phone_number" name="phone_number"
                            value="<?php echo htmlspecialchars($userData['uphonenumber']); ?>"
                            class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div class="form-group">
                        <label for="address" class="block text-gray-700">Address:</label>
                        <input type="text" id="address" name="address"
                            value="<?php echo htmlspecialchars($userData['uaddress']); ?>"
                            class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div class="form-group">
                        <label for="state" class="block text-gray-700">State:</label>
                        <input type="text" id="state" name="state"
                            value="<?php echo htmlspecialchars($userData['ustate']); ?>"
                            class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div class="form-group">
                        <label for="city" class="block text-gray-700">City:</label>
                        <input type="text" id="city" name="city" value="<?php echo htmlspecialchars($userData['ucity']); ?>"
                            class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                <?php else: ?>
                    <div class="form-group">
                        <label for="employer_name" class="block text-gray-700">Employer Name:</label>
                        <input type="text" id="employer_name" name="employer_name"
                            value="<?php echo htmlspecialchars($userData['ename']); ?>" required
                            class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div class="form-group">
                        <label for="email" class="block text-gray-700">Email:</label>
                        <input type="email" id="email" name="email"
                            value="<?php echo htmlspecialchars($userData['eemail']); ?>" required
                            class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div class="form-group">
                        <label for="password" class="block text-gray-700">Email:</label>
                        <input type="text" id="password" name="password"
                            value="<?php echo htmlspecialchars($userData['epassword']); ?>" required
                            class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div class="form-group">
                        <label for="company" class="block text-gray-700">Company:</label>
                        <input type="text" id="company" name="company"
                            value="<?php echo htmlspecialchars($userData['ecompany']); ?>" required
                            class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div class="form-group">
                        <label for="industry_name" class="block text-gray-700">Industry Name:</label>
                        <input type="text" id="industry_name" name="industry_name"
                            value="<?php echo htmlspecialchars($userData['industryname']); ?>" required
                            class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div class="form-group">
                        <label for="website" class="block text-gray-700">Website:</label>
                        <input type="text" id="website" name="website"
                            value="<?php echo htmlspecialchars($userData['website']); ?>"
                            class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                <?php endif; ?>
                <button type="submit"
                    class="w-full py-3 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 transition duration-300">Update
                    Profile</button>
            </form>
        </div>
    </div>
</body>

</html>