<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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

</body>
</html>