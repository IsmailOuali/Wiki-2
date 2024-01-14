<?php
require 'config.php';
include 'model/tag.php';
require 'model/categorie.php';
require 'model/wiki.php';
require 'model/user.php';

$obj = array();
$obj = tag::showtag();

$objcat = array();
$objcat = categorie::showcategory();

$objwiki = array();
$objwiki = wiki::showwiki();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Document</title>
</head>
<style>
    body{
         background-image: linear-gradient(to right, #8360c3, #2ebf91);

    }
</style>
<body class="">
    
    <section class="mt-10 flex">
        <div class="bg-gradient-to-r from-rose-100 to-teal-100 rounded-3xl border-8 mb-5 border-red-900 py-8 px-4 mx-auto max-w-2xl lg:py-16">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Add a new Wiki</h2>
                <form method="post" action="controller/wiki.php" enctype="multipart/form-data">
                    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Wiki Name</label>
                        <input type="text" name="wiki-name" id="name" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name" required="">
                    </div>
                    <div class="sm:col-span-2">
                    <label for="file-input" class="sr-only">Choose file</label>
                        <input type="file" name="file" id="file-input" class="bg-gray-100 block w-full border border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600
                            file:bg-gray-50 file:border-0
                            file:bg-gray-100 file:me-4
                            file:py-3 file:px-4
                            dark:file:bg-gray-700 dark:file:text-gray-400">
                    </div>
                    <div class="w-full flex flex-wrap">
                        <div class="w-full"><p>Tags</p></div>
                        <?php
                        foreach($obj as $row){

                                    
                        ?>
                        <div class="flex items-center me-4">
                            <input id="inline-checkbox" type="checkbox" name="tag[]" value="<?php echo $row->__get('name_tag') ?>" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label name="tag[]" for="inline-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $row->__get('name_tag') ?></label>
                        </div>
                        <?php
                            }
                        ?>
                    <div>
                        <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                        <select name="category" id="category" class="py-3 px-4 pe-9 block w-full bg-gray-100 border-transparent rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-700 dark:border-transparent dark:text-gray-400 dark:focus:ring-gray-600">
                            <?php
                            foreach($objcat as $row){

                                ?>                                   
                            <option><?php echo $row->__get("name_category") ?></option>
                        <?php
                            }
                        ?>
                        </select>
                    <div class="sm:col-span-2">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                        <textarea id="description" name="description-wiki" class=" bg-gray-100 py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" rows="3"></textarea>
                    </div>
                </div>
                <input value="Add Wiki" name="submit-wiki" type="submit" class="w-1/3 h-1/3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-blue-600 text-blue-600 hover:border-blue-500 hover:text-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
            </form>
        </div>
    </section>
    <section class="p-3 sm:p-5 antialiased ">
        <div class="bg-gradient-to-r from-rose-100 to-teal-100 rounded-3xl mx-auto max-w-screen-xl px-4 lg:px-12">
                <!-- Start coding here -->
                <div class="bg-white relative shadow-md sm:rounded-lg overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-4 py-4">Wiki name</th>
                                    <th scope="col" class="px-4 py-3">Category</th>
                                    <th scope="col" class="px-4 py-3">Description</th>
                                    <th scope="col" class="px-4 py-3"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    foreach($objwiki as $row){

                                        ?>
                                <tr class="border-b dark:border-gray-700">
                                    <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?php echo $row->__get("name_wiki") ?></th>
                                    <td class="px-4 py-3"><?php echo $row->__get('category') ?></td>
                                    <td class="px-4 py-3 max-w-[12rem] truncate"><?php echo $row->__get("description_wiki") ?></td>
                                    <td class="px-4 py-3 flex justify-end">
                                        <a class="text-black" href="controller/deletewiki.php?id=<?php echo $row->__get("id_wiki") ?>">Delete </a>
                                        ||
                                        <a class="text-black" href="">Modify</a>
                                    </td>
                                </tr>
                            <?php
                        }
                        ?>
                            
                            </div>
                  
        </section>

</body>
<script>
    tailwind.config = {
        darkMode: 'class',
        theme: {
            extend: {
            colors: {
                primary: {"50":"#eff6ff","100":"#dbeafe","200":"#bfdbfe","300":"#93c5fd","400":"#60a5fa","500":"#3b82f6","600":"#2563eb","700":"#1d4ed8","800":"#1e40af","900":"#1e3a8a","950":"#172554"}
            }
            },
            fontFamily: {
            'body': [
            'Inter', 
            'ui-sans-serif', 
            'system-ui', 
            '-apple-system', 
            'system-ui', 
            'Segoe UI', 
            'Roboto', 
            'Helvetica Neue', 
            'Arial', 
            'Noto Sans', 
            'sans-serif', 
            'Apple Color Emoji', 
            'Segoe UI Emoji', 
            'Segoe UI Symbol', 
            'Noto Color Emoji'
        ],
            'sans': [
            'Inter', 
            'ui-sans-serif', 
            'system-ui', 
            '-apple-system', 
            'system-ui', 
            'Segoe UI', 
            'Roboto', 
            'Helvetica Neue', 
            'Arial', 
            'Noto Sans', 
            'sans-serif', 
            'Apple Color Emoji', 
            'Segoe UI Emoji', 
            'Segoe UI Symbol', 
            'Noto Color Emoji'
        ]
            }
        }
        }
</script>
</html>