<!-- Enter thoughts options -->
<div class="bg-white w-full shadow rounded-lg p-5">
    <form action="/forms" method="post">
        <div class="mb-6">
            <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
            <input type="text" name="title" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write title for your post here" required>
        </div>
        <textarea name="description" class="bg-gray-200 w-full rounded-lg shadow border p-2" rows="5" placeholder="Speak your mind"></textarea>

        <div class="w-full flex flex-row flex-wrap mt-3">
            <div class="mb-6 w-1/3">
                <input type="file" name="image" id="image" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="john.doe@company.com">
            </div>
            <div class="w-1/3">
            <input type="text" id="tag" name="tag" class="ml-3 mr-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="tag" required>
            </div>
            <div class="w-1/3  ">
                <button type="submit" class="float-right flex items-end bg-blue-700 hover:bg-indigo-300 text-white p-2 rounded-lg ">Post to mySocial</button>
            </div>
        </div>
    </form>
</div>



