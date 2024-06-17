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
    <?php include "./Client/hero_section.php"; ?>
    <?php include "./Client/search_job.php"; ?>
    <?php include "./Client/company_banner.php"; ?>
    <?php include "./Client/latest-job.php"; ?>
    <?php include "./Client/how_it_work.php"; ?>

    <?php include "./Client/why_jobnexa.php"; ?>
    <?php include "./Client/client_review.php"; ?>

    <section class="bg-blue-50 py-28 font-serif text-blue-900">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-9xl font-extrabold sm:text-5xl  text-center mb-3">Stay Updated on the Latest</h2>
            <h2 class="text-9xl font-extrabold sm:text-5xl  text-center mb-6">
                JobNexa
                for Job
                Opportunities</h2>
            <p class="text-lg text-blue-700 text-center mb-8">Stay up-to-date with our latest job, updates, and special
                offers.</p>

            <!-- Subscription Form -->
            <form class="mx-auto flex justify-center items-center w-3/4">
                <input type="email" class="bg-white border mt-4 border-gray-300 py-3 px-4 mb-4  w-full "
                    placeholder="Enter your email address">
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-600 p-3 text-white font-semibold  transition duration-300">Subscribe</button>
            </form>
        </div>
    </section>

    <?php include "./Client/footer.php"; ?>
</body>

</html>