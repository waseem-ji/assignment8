<?php foreach ($posts as $post) : ?>
    <div class="bg-white mt-3">
        <div class="w-full flex flex-row flex-wrap mt-3">
            <div class="bg-white flex flex-col  p-5 text-xl text-gray-700 font-semibold w-2/3">
                <div class="text-5xl font-black"><?= $post['title'] ?></div>
                <div class="text-sm">
                    Posted on
                    <?php $date = date("d-m-y", strtotime($post['date']));
                    echo $date;  ?>
                </div>
            </div>
            <div>
                <!-- <div class="w-1/3"> </div> -->
                <button type="submit" class="inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                    <?= $post['tag'] ?>
                </button>
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