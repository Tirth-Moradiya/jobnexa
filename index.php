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

    <section class="trusted-companies-section font-bold p-20 bg-slate-50 text-blue-900 font-serif">
        <div class="    mx-auto pb-10">
            <h2 class="text-2xl tracking-wide text-center mb-8">Trusted by 100+ world's best companies</h2>
            <div class="flex justify-between mx-auto items-center mt-32 gap-20">
                <!-- Company 1 -->
                <div class="company-card text-center transform transition duration-500 hover:scale-105">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2f/Google_2015_logo.svg/512px-Google_2015_logo.svg.png"
                        alt="Google Logo" class="mx-auto mb-4 h-16 w-fit">
                </div>

                <!-- Company 2 -->
                <div class="company-card text-center transform transition duration-500 hover:scale-105">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a9/Amazon_logo.svg/2560px-Amazon_logo.svg.png"
                        alt="Amazon Logo" class="mx-auto mb-4 h-16">
                </div>

                <!-- Company 3 -->
                <div class="company-card text-center transform transition duration-500 hover:scale-105">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/44/Microsoft_logo.svg/512px-Microsoft_logo.svg.png"
                        alt="Microsoft Logo" class="mx-auto mb-4 h-16">
                </div>

                <!-- Company 4 -->
                <div class="company-card text-center transform transition duration-500 hover:scale-105">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/fa/Apple_logo_black.svg/647px-Apple_logo_black.svg.png"
                        alt="Apple Logo" class="mx-auto mb-4 h-16">
                </div>

                <!-- Company 5 -->
                <div class="company-card text-center transform transition duration-500 hover:scale-105">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/89/Facebook_Logo_(2019).svg/512px-Facebook_Logo_(2019).svg.png"
                        alt="Facebook Logo" class="mx-auto mb-4 h-16">
                </div>

                <!-- Company 6 -->
                <div class="company-card text-center transform transition duration-500 hover:scale-105">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/08/Netflix_2015_logo.svg/512px-Netflix_2015_logo.svg.png"
                        alt="Netflix Logo" class="mx-auto mb-4 h-16">
                </div>
            </div>
        </div>
    </section>



    <section class="py-20 font-serif bg-gradient-to-r from-blue-50 to-indigo-100 text-blue-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-extrabold sm:text-4xl">How It Works?</h2>
            <p class="mt-4 text-lg ">Only with few click, you can search and apply for job you want and
                various categories are available.<br /> Not to mention out team always responds quickly 24 hours.
            </p>

            <div class="mt-10 grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Create Profile -->
                <div class="p-6 rounded-lg transform transition-transform hover:scale-105">
                    <div class="flex justify-center mb-4">
                        <i class="fas fa-users text-6xl text-blue-500"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Create Profile</h3>
                    <p class="text-gray-500">Sign up and create your professional profile to start applying for jobs.
                    </p>
                </div>

                <!-- Search Job -->
                <div class=" p-6 rounded-lg  transform transition-transform hover:scale-105">
                    <div class="flex justify-center mb-4">
                        <i class="fas fa-search text-6xl text-blue-500"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Search Job</h3>
                    <p class="text-gray-500">Use our search tool to find the perfect job that matches your skills.</p>
                </div>

                <!-- Apply Job -->
                <div class=" p-6 rounded-lg transform transition-transform hover:scale-105">
                    <div class="flex justify-center mb-4">
                        <i class="fas fa-check text-6xl text-blue-500"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Apply Job</h3>
                    <p class="text-gray-500">Submit your application and get ready to land your dream job.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- <?php include "./Client/category.php"; ?> -->
    <?php include "./Client/listed-job.php"; ?>


    <!-- <?php include "./Client/hero2.php"; ?> -->
    <section class="why-choose-us-section font-serif text-blue-900 py-20 bg-gradient-to-r from-blue-50 to-indigo-100">
        <div class="mx-36">
            <h2 class="text-3xl font-semibold text-center mb-8">Why Choose JobNexa</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mx-auto mt-20 w-3/4 ">
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


    <section class="py-24 font-serif">
        <div class="max-w-full mx-auto px-5 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-extrabold text-blue-900 sm:text-4xl text-center mb-6">What Our Clients Say</h2>
            <p class="mt-4 text-lg text-blue-800 text-center mb-10">Hear from some of our satisfied clients.</p>

            <!-- Testimonial Slider -->
            <div class="testimonial-slider relative overflow-hidden rounded-lg">
                <!-- Testimonials Container -->
                <div class="flex gap-5">
                    <!-- Testimonial 1 -->
                    <div
                        class="testimonial-slide bg-blue-50 p-6 rounded-lg shadow-md transform transition duration-300 flex-shrink-0">
                        <p class="text-gray-700 mb-4">"Amazing experience! The platform is user-friendly and efficient."
                        </p>
                        <h3 class="text-xl font-semibold text-blue-500">John Doe</h3>
                        <p class="text-gray-500">Software Engineer</p>
                    </div>

                    <!-- Testimonial 2 -->
                    <div
                        class="testimonial-slide bg-blue-50 p-6 rounded-lg shadow-md transform transition duration-300 flex-shrink-0">
                        <p class="text-gray-700 mb-4">"Amazing experience! The platform is user-friendly and efficient."
                        </p>
                        <h3 class="text-xl font-semibold text-blue-500">Jane Smith</h3>
                        <p class="text-gray-500">Graphic Designer</p>
                    </div>

                    <!-- Testimonial 3 -->
                    <div
                        class="testimonial-slide bg-blue-50 p-6 rounded-lg shadow-md transform transition duration-300 flex-shrink-0">
                        <p class="text-gray-700 mb-4">"I've landed my dream job thanks to this service. Fantastic!"</p>
                        <h3 class="text-xl font-semibold text-blue-500">Robert Johnson</h3>
                        <p class="text-gray-500">Product Manager</p>
                    </div>


                    <!-- Testimonial 6 -->
                    <div
                        class="testimonial-slide bg-blue-50 p-6 rounded-lg shadow-md transform transition duration-300 flex-shrink-0">
                        <p class="text-gray-700 mb-4">"Highly effective and user-friendly. I found my job quickly!"</p>
                        <h3 class="text-xl font-semibold text-blue-500">Laura Wilson</h3>
                        <p class="text-gray-500">Data Scientist</p>
                    </div>

                    <div
                        class="testimonial-slide bg-blue-50 p-6 rounded-lg shadow-md transform transition duration-300 flex-shrink-0">
                        <p class="text-gray-700 mb-4">"Highly effective and user-friendly. I found my job quickly!"</p>
                        <h3 class="text-xl font-semibold text-blue-500">Laura Wilson</h3>
                        <p class="text-gray-500">Data Scientist</p>
                    </div>

                    <div
                        class="testimonial-slide bg-blue-50 p-6 rounded-lg shadow-md transform transition duration-300 flex-shrink-0">
                        <p class="text-gray-700 mb-4">"Highly effective and user-friendly. I found my job quickly!"</p>
                        <h3 class="text-xl font-semibold text-blue-500">Laura Wilson</h3>
                        <p class="text-gray-500">Data Scientist</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Script for Testimonial Slider -->
        <!-- Script for Testimonial Slider -->
        <script>
            let currentIndex = 0;
            const slides = document.querySelectorAll('.testimonial-slider .flex > .testimonial-slide');
            const slideCount = slides.length;
            const autoSlideInterval = 5000; // Interval in milliseconds (5 seconds)

            function moveSlide(direction) {
                currentIndex += direction;
                if (currentIndex < 0) currentIndex = slideCount - 1;
                if (currentIndex >= slideCount) currentIndex = 0;

                const translateXValue = `-${currentIndex * 100}%`;
                slides.forEach(slide => {
                    slide.style.transform = `translateX(${translateXValue})`;
                });
            }

            // Auto slide functionality
            setInterval(() => {
                moveSlide(1);
            }, autoSlideInterval);
        </script>

    </section>


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