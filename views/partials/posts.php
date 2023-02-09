<?php foreach ($posts as $post) : ?>
    <div class="bg-white mt-3">
        <div class="w-full flex flex-row flex-wrap mt-3">
            <div class="bg-white flex flex-col  p-5 text-xl text-gray-700 font-semibold w-4/6">
                <div class="text-5xl font-black"><?= $post['title'] ?></div>
                <div class="text-sm">
                    Posted on
                    <?php $date = date("d-m-y", strtotime($post['date']));
                    echo $date;  ?>
                </div>
            </div>
            <div class="w-1/6">
                <!-- <div class="w-1/3"> </div> -->
                <button type="submit" class="inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                    <?= $post['tag'] ?>
                </button>
            </div>
            <div class="w-1/6"> <!-- Button menu !-->
                <button id="dropdownMenuIconHorizontalButton" data-dropdown-toggle="dropdownDotsHorizontal" class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600" type="button">
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"></path>
                    </svg>
                </button>

                <!-- Dropdown menu -->
                <div id="dropdownDotsHorizontal" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownMenuIconHorizontalButton">
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
                        </li>
                    </ul>
                    <div class="py-2">
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Separated link</a>
                    </div>
                </div>
            </div>
        </div>



        <div class="bg-white border-4 bg-gray-300 border-double shadow p-5 text-xl text-gray-700 content-center font-semibold flex flex-row flex-wrap">
            <div class="w-full">
                <div class="w-full text-left text-xl text-gray-600">
                    @Some Person - UserName should come here
                </div>
                <?= $post['description'] ?>
            </div>
        </div>
        <img class="border shadow-lg p-2" src="https://images.unsplash.com/photo-1572817519612-d8fadd929b00?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1950&q=80">
    </div>

<?php endforeach ?>