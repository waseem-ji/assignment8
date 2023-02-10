<?php if ($posts) :
    // dd($posts);
    foreach ($posts as $post) : ?>
        <div class="bg-white m-3 border-2">
            <div class="w-full flex flex-row flex-wrap mt-3">
                <div class="bg-white flex flex-col  p-5 text-xl text-gray-700 font-semibold w-4/6">
                    <div class="text-5xl font-black"><?= $post['title'] ?> </div>
                    <?php $postId = $post['id']; ?>
                    <div class="text-sm">
                        Posted on
                        <?php $date = date("d-m-y", strtotime($post['date']));
                        echo $date;  ?>
                    </div>
                </div>
                <div class="w-1/6">
                    <!-- <div class="w-1/3"> </div> -->
                    <button type="submit" class="inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                        <?php
                        $tag = getTag($post['tag']);

                        echo $tag; ?>
                    </button>
                </div>
                <div class="w-1/6"> <!-- Button menu !-->
                    <button id="dropdownMenuIconHorizontalButton" data-dropdown-toggle="dropdownDotsHorizontal_<?= $postId ?>" class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600" type="button">
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"></path>
                        </svg>

                    </button>

                    <!-- Dropdown menu -->
                    <div id="dropdownDotsHorizontal_<?= $postId ?>" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">

                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownMenuIconHorizontalButton">
                            <li>
                                <!-- <button class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"><a href="/update-post">UPDATE </a></button> -->
                                <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal_<?= $postId ?>" class="block px-4 py-2 text-sm text-white-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white" type="button">
                                    Update
                                </button>
                            </li>
                        </ul>
                        <div class="py-2">
                            <button class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"><a href="/delete?id=<?= $postId ?> ">DELETE</a></button>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Form Edit modal -->
            <div id="authentication-modal_<?= $postId ?>" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                <div class="relative w-full h-full max-w-md md:h-auto">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="authentication-modal">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="px-6 py-6 lg:px-8">
                            <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Edit Your post</h3>
                            <form class="space-y-6" action="/forms?id=<?= $post['id'] ?>" method="post" enctype="multipart/form-data">
                                <div>
                                    <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                                    <input type="text" name="title" id="title" value="<?= $post['title'] ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write title for your post here" required>
                                </div>

                                <div>
                                    <textarea name="description" class="bg-gray-200 w-full rounded-lg shadow border p-2" rows="5" placeholder="Speak your mind"><?= $post['description'] ?></textarea>
                                </div>
                                <div class="flex justify-between">
                                    <div class="flex items-start">
                                        <div class="flex items-center h-5">
                                            <input type="file" name="image" id="image" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        </div>
                                        <input type="text" id="tag" name="tag" value="<?php
                                                                                        $tag = getTag($post['tag']);

                                                                                        echo $tag; ?>" class="ml-3 mr-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="tag" required>
                                    </div>

                                </div>
                                <input type="hidden" name='_method' value="UPDATE">
                                <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Post to mySocial</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>



            <div class="bg-white  bg-gray-300 border-double shadow p-5 text-xl text-gray-700 content-center font-semibold flex flex-row flex-wrap">
                <div class="w-full">
                    <?= $post['description'] ?>
                </div>
            </div>
            <?php if($post['image'] !==""):  ?>
            <img class='border shadow-lg p-2' src="../uploads/<?=$post['image']?>">
            <?php endif ?>

        </div>


<?php
    endforeach;

else :
    echo "sdfsdfsd";
//Should print No-Posts.php Here .
// return "No-Posts.php";

endif; ?>