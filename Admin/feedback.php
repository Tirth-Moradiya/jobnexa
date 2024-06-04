<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../css/feedback.css">

</head>

<body>
  <?php include "sidebar.php"; ?>
  <div class="content">


    <div id="feedback-list">
      <?php
      // Sample feedback data (replace with dynamic data from your database)
      $feedbacks = [
        ["id" => 1, "user" => "User 1", "email" => "user1@example.com", "message" => "Feedback message 1"],
        ["id" => 2, "user" => "User 2", "email" => "user2@example.com", "message" => "Feedback message 2"],
        ["id" => 3, "user" => "User 3", "email" => "user3@example.com", "message" => "Feedback message 3"]
      ];

      foreach ($feedbacks as $feedback) {
        echo "<div class='feedback-item'>";
        echo "<div><strong>User:</strong> " . $feedback["user"] . "</div>";
        echo "<div><strong>Email:</strong> " . $feedback["email"] . "</div>";
        echo "<div><strong>Message:</strong> " . $feedback["message"] . "</div>";
        echo "</div>";
      }
      ?>
    </div>
  </div>

</body>

</html>