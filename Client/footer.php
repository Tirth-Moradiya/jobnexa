<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>

    </style>
</head>

<body>

    <footer class="bg-blue-900 text-white py-5 font-serif">
        <div class="container">
            <div class="row">
                <div class="col-md-4 footer-section">
                    <h3 class="text-xl font-semibold mb-4">About Us</h3>
                    <p class="text-gray-400">Connecting talent with opportunity.</p>
                    <div class="mt-4">
                        <span class="mr-2"><i class="fas fa-envelope"></i> contact@jobnexa.com</span><br>
                        <span class="mt-2"><i class="fas fa-phone"></i> +91 9988745632</span>
                    </div>
                    <div class="socials mt-4">
                        <a href="#" class="text-white"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="col-md-4 footer-section">
                    <h3 class="text-xl font-semibold mb-4">Quick Links</h3>
                    <ul>
                        <li><a href="#" class="text-gray-400 no-underline hover:text-white">Home</a></li>
                        <li><a href="#" class="text-gray-400 no-underline hover:text-white">Jobs</a></li>
                        <li><a href="#" class="text-gray-400 no-underline hover:text-white">About</a></li>
                        <li><a href="#" class="text-gray-400 no-underline hover:text-white">Contact</a></li>
                    </ul>
                </div>
                <div class="col-md-4 footer-section">
                    <h3 class="text-xl font-semibold mb-4">Feedback</h3>
                    <form action="./Client/feedback.php" method="POST">
                        <input type="text" name="name" class="form-control mb-3" placeholder="Your Name">
                        <input type="email" name="email" class="form-control mb-3" placeholder="Your Email Address">
                        <textarea name="message" class="form-control mb-3" rows="4"
                            placeholder="Your Message"></textarea>
                        <button type="submit" class="btn btn-danger btn-block">Send</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- <div class="footer-bottom text-center mt-4">
            <p>&copy; 2024 JobNexa. All rights reserved.</p>
        </div> -->
    </footer>

</body>

</html>