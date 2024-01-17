<?php
session_start();
require 'config.php';
include 'model/tag.php';
require 'model/categorie.php';
require 'model/wiki.php';
// require 'model/user.php';

if(!$_SESSION['id_user']){
    header('Location: login.php');
}
$id_wiki = $_GET['id'];
$_POST['wiki-id'] = $id_wiki;

$obj = array();
$obj = tag::showtag();

$objcat = array();
$objcat = categorie::showcategory();

$id_user = $_SESSION['id_user'];
$objwiki = array();
$objwiki = wiki::showwikiid($id_wiki);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.tailwindcss.com"></script>

        <title>Modify wiki</title>
    </head>
    <body class="">

    <nav class="bg-gradient-to-r from-gray-700 via-gray-900 to-black border-gray-200 dark:bg-gray-900">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="index.php" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Wiki</span>
            </a>
            <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0  dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <a href="index.php" class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white md:dark:text-blue-500">Acceuil</a>
                    </li>
                    <li>
                        <a href="Wiki-panel.php" class="block py-2 px-3 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent" aria-current="page">Gerer vos Wikis</a>
                    </li>
                    <li>
                        <?php
                            if(@$_SESSION['id_user']){

                                ?>
                        <a href="controller/log-out.php" class="text-sm  text-blue-600 dark:text-blue-500 hover:underline">Se Deconnecter</a>
                        <?php
                            }else{
                                ?>  
                                <a href="controller/log-in.php" class="text-sm  text-blue-600 dark:text-blue-500 hover:underline">Se Connecter</a>
                            <?php    
                            }
                            ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="">
    <form method="post" action="controller/modifywiki.php?id-wiki=<?php echo $id_wiki ?>" enctype="multipart/form-data">
                    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Wiki Name</label>
                        <input type="text" value="<?php echo $objwiki[0]->__get('name_wiki') ?>" name="wiki-name" id="name" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name" required="">
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
                    <div class="mt-2">
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
                        <textarea id="description" value="" name="description-wiki" class=" bg-gray-100 py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" rows="3"><?php echo $objwiki[0]->__get('description_wiki') ?></textarea>
                    </div>
                </div>
                <div class="h-3/5 w-full mt-4">
                    <input value="Add Wiki" name="submit-wiki" type="submit" class="w-1/3 h-1/3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-blue-600 text-blue-600 hover:border-blue-500 hover:text-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                </div>
            </form>

    </section>
        
    </body>
</html>