<?php
session_start();
require 'config.php';
require 'model/wiki.php';

$name_cat = $_GET['name'];

$obj = wiki::showwikicat($name_cat);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Document</title>
</head>
<body>
<nav class="bg-gradient-to-r from-gray-700 via-gray-900 to-black border-gray-200 dark:bg-gray-900">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
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
                <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <a href="index.php" class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white md:dark:text-blue-500" aria-current="page">Acceuil</a>
                    </li>
                    <li>
                        <a href="Wiki-panel.php" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Gerer vos Wikis</a>
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
    <section class="w-full flex flex-wrap">
        <?php
        foreach($obj as $row){
            
            ?>
            <div class="m-10 bg-white rounded-lg overflow-hidden shadow-lg ring-4 ring-red-500 ring-opacity-40 max-w-sm">
                <div class="relative">
                    <img class="w-full" src="wiki-logo.jpg" alt="Product Image"> 
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-medium mb-2"><?php echo $row->__get('name_wiki') ?></h3>
                    <p class="text-gray-600 text-sm mb-4"><?php echo $row->__get('description_wiki') ?></p>
                    <div class="flex items-center justify-between">
                        <span class="font-bold text-lg"><?php echo $row->__get('category') ?></span>
                        <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                            <a href="wiki-info.php?id=<?php echo $row->__get('id_wiki') ?>">Go to Wiki</a>
                        </button>
                    </div>
                </div>
            </div>
                <?php
            }
            ?>
</section>
<footer class="w-full border-t bg-white pb-12">
        <div class="w-full container mx-auto flex flex-col items-center">
            <div class="flex flex-col md:flex-row text-center md:text-left md:justify-between py-6">
                <a href="index.php" class="uppercase px-3"> Home</a>
                <a href="wiki-panel.php" class="uppercase px-3">Gerer mes Wikis</a>
                <a href="#" class="uppercase px-3">Terms & Conditions</a>
            </div>
            <div class="uppercase pb-6">&copy; Wiki.com</div>
            <i>By Ouali Ismail</i>

        </div>
    </footer>

</body>
</html>