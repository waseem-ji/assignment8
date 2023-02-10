<?php
require "partials/head.php";
require "partials/nav.php"
?>
<div class="bg-indigo-100">
    <div class="w-full flex flex-row flex-wrap justify-center ">
        <div class="container mx-auto my-5 p-5">
            <div class="md:flex no-wrap md:-mx-2 ">
                <!-- Left Side -->
                <div class="w-full md:w-3/12 md:mx-2">
                    <!-- Profile Card -->
                    <div class="bg-white p-3 border-t-4 border-green-400">
                        <div class="image overflow-hidden">
                            <img class="h-auto w-full mx-auto" src="https://lavinephotography.com.au/wp-content/uploads/2017/01/PROFILE-Photography-112.jpg" alt="">
                        </div>
                        <!-- Include tags here -->
                        <div><?php require "../controllers/tags.php" ?></div>
                    </div>
                    <!-- End of profile card -->
                    <div class="my-4"></div>

                </div>
                <!-- Right Side -->
                <div class="w-full md:w-9/12 mx-2 h-64">
                    <!-- Profile tab -->

                    <!-- Post entry Section -->
                    <div class="bg-white p-3 shadow-sm rounded-sm">


                        <?php require "partials/forms.php" ?>




                    </div>
                    <!--END of  Post entry Section -->

                    <div class="my-4"></div>

                    <!-- Experience and education -->
                    <div class="bg-white p-3 shadow-sm rounded-sm">

                        <div id="posts" class="mt-3  flex flex-col p-5">

                            <?php require "partials/posts.php" ?>

                        </div>
                    </div>
                    <!-- End of profile tab -->
                </div>
            </div>
        </div>
    </div>

</div>

<?php require "partials/footer.php"
?>