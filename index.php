<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" initial-scale="1.0">
    <link href="output.css" rel="stylesheet">

    <title>Document</title>
</head>

<body>
    <?php include "./Client/header.php"; ?>
    <?php include "./Client/hero.php"; ?>
    <?php include "./Client/search_job.php"; ?>

    <section class="trusted-companies-section p-20 bg-blue-900 text-blue-50 font-serif">
        <div class="container mx-auto pb-10">
            <h2 class="text-3xl font-semibold text-center mb-8">Trusted Companies</h2>
            <div class="flex justify-between items-center pt-5">
                <!-- Company 1 -->
                <div class="company-card text-center">
                    <img src="company1-logo.png" alt="Company 1 Logo" class="mx-auto mb-4">
                    <h3 class="text-lg font-semibold">Company 1</h3>
                </div>

                <!-- Company 2 -->
                <div class="company-card text-center">
                    <img src="company2-logo.png" alt="Company 2 Logo" class="mx-auto mb-4">
                    <h3 class="text-lg font-semibold">Company 2</h3>
                </div>

                <!-- Company 3 -->
                <div class="company-card text-center">
                    <img src="company3-logo.png" alt="Company 3 Logo" class="mx-auto mb-4">
                    <h3 class="text-lg font-semibold">Company 3</h3>
                </div>

                <!-- Company 4 -->
                <div class="company-card text-center">
                    <img src="company4-logo.png" alt="Company 4 Logo" class="mx-auto mb-4">
                    <h3 class="text-lg font-semibold">Company 4</h3>
                </div>

                <!-- Company 5 -->
                <div class="company-card text-center">
                    <img src="company5-logo.png" alt="Company 5 Logo" class="mx-auto mb-4">
                    <h3 class="text-lg font-semibold">Company 5</h3>
                </div>

                <!-- Company 6 -->
                <div class="company-card text-center">
                    <img src="company6-logo.png" alt="Company 6 Logo" class="mx-auto mb-4">
                    <h3 class="text-lg font-semibold">Company 6</h3>
                </div>
            </div>
        </div>
    </section>

    <?php include "./Client/category.php"; ?>


    <!-- <?php include "./Client/hero2.php"; ?> -->
    <section class="why-choose-us-section font-serif text-blue-900 py-20 bg-gradient-to-r from-blue-50 to-indigo-100">
        <div class="mx-28">
            <h2 class="text-3xl font-semibold text-center mb-8">Why Choose JobNexa</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-20 ">
                <!-- Reason 1 -->
                <div
                    class="reason-card bg-white text-center  border rounded p-2 shadow transform transition duration-500 hover:scale-105">
                    <div class="icon mt-3">
                        <i class="fas fa-users text-4xl text-blue-500"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-4">Wide Range of Opportunities</h3>
                    <hr />
                    <p class="text-gray-700">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed quis est
                        ultrices, ullamcorper justo ut, convallis ex.</p>
                </div>

                <!-- Reason 2 -->
                <div
                    class="reason-card text-center bg-white  border rounded p-2 shadow transform transition duration-500 hover:scale-105">
                    <div class="icon mt-3">
                        <i class="fas fa-handshake text-4xl text-blue-500"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-4">Trusted Partnerships</h3>
                    <hr />
                    <p class="text-gray-700">Vestibulum ac vehicula quam. Fusce pharetra, nisi nec eleifend interdum,
                        eros turpis convallis purus.</p>
                </div>

                <!-- Reason 3 -->
                <div
                    class="reason-card text-center bg-white  border rounded p-2 shadow transform transition duration-500 hover:scale-105">
                    <div class="icon mt-3">
                        <i class="fas fa-clock text-4xl text-blue-500"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-4">Time-Saving Solutions</h3>
                    <hr />
                    <p class="text-gray-700">Pellentesque habitant morbi tristique senectus et netus et malesuada fames
                        ac turpis egestas.</p>
                </div>

            </div>
        </div>
    </section>

    <?php include "./Client/listed-job.php"; ?>
    <?php include "./Client/footer.php"; ?>
</body>

</html>