<?php
session_start();
require 'config.php';
require 'model/categorie.php';
require 'model/wiki.php';
require 'model/tag.php';



$obj = array();
$obj = tag::showtag();

$objcat = array();
$objcat = categorie::showcategory();

$objwiki = array();
$objwiki = wiki::showwiki();

$countWiki = wiki::CountWiki();
$countuser = user::CountUsers();
$countArchivedWiki = wiki::CountArchivedWiki();


$id_user = $_SESSION['id_user'];
$usr  = user::checkadmin($id_user);
if(!$usr){
   header('Location: login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <script src="https://cdn.tailwindcss.com"></script>
      <title>Dashboard</title>
   </head>
   <style>
      body{
         background-color: #24527a;
      }
   </style>
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
   
   <div>

      <button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
         <span class="sr-only">Open sidebar</span>
         <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
               <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
         </svg>
      </button>
   </div>
   
   <aside id="default-sidebar" class="fixed top-13 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
      <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
         <ul class="space-y-2 font-medium">
            <li>
               <a href="#dashboard-page" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                  <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                     <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                     <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
                  </svg>
                  <span class="ms-3">Dashboard</span>
               </a>
            </li>
            <li>
               <a href="#category-page" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                  <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                     <path d="m17.418 3.623-.018-.008a6.713 6.713 0 0 0-2.4-.569V2h1a1 1 0 1 0 0-2h-2a1 1 0 0 0-1 1v2H9.89A6.977 6.977 0 0 1 12 8v5h-2V8A5 5 0 1 0 0 8v6a1 1 0 0 0 1 1h8v4a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-4h6a1 1 0 0 0 1-1V8a5 5 0 0 0-2.582-4.377ZM6 12H4a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Z"/>
                  </svg>
                  <span class="flex-1 ms-3 whitespace-nowrap">Categorie</span>
               </a>
            </li>
            <li>
               <a href="#tags-page" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                  <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                     <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z"/>
                  </svg>
                  <span class="flex-1 ms-3 whitespace-nowrap">Tags</span>
               </a>
            </li>
            <li>
               <a href="#wiki-page" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                  <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                     <path d="M17 5.923A1 1 0 0 0 16 5h-3V4a4 4 0 1 0-8 0v1H2a1 1 0 0 0-1 .923L.086 17.846A2 2 0 0 0 2.08 20h13.84a2 2 0 0 0 1.994-2.153L17 5.923ZM7 9a1 1 0 0 1-2 0V7h2v2Zm0-5a2 2 0 1 1 4 0v1H7V4Zm6 5a1 1 0 1 1-2 0V7h2v2Z"/>
                  </svg>
                  <span class="flex-1 ms-3 whitespace-nowrap">Wikis</span>
               </a>
            </li>
         </ul>
      </div>
   </aside>
   <main class="mx-60 max-w-screen-2xl p-4 md:p-6 2xl:p-10">

   <section id="dashboard-page" class="w-full flex mb-10">

         <!-- Tile 1 -->
         <div class="flex items-center p-4 rounded">
               <div class="flex flex-shrink-0 items-center justify-center bg-green-200 h-16 w-16 rounded">
                  <svg class="w-6 h-6 fill-current text-green-700" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                     fill="currentColor">
                     <path fill-rule="evenodd"
                           d="M3.293 9.707a1 1 0 010-1.414l6-6a1 1 0 011.414 0l6 6a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L4.707 9.707a1 1 0 01-1.414 0z"
                           clip-rule="evenodd" />
                  </svg>
               </div>
               <div class="flex-grow flex flex-col ml-4">
                  <div class="flex items-center justify-between">
                     <span class="text-white">Number of wikis</span>
                  </div>
                  <span class="text-xl font-bold"><?php echo $countWiki[0] ?></span>
               </div>
         </div>

         <!-- Tile 2 -->
         <div class="flex items-center p-4 rounded">
               <div class="flex flex-shrink-0 items-center justify-center bg-red-200 h-16 w-16 rounded">
                  <svg class="w-6 h-6 fill-current text-red-700" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                     fill="currentColor">
                     <path fill-rule="evenodd"
                           d="M16.707 10.293a1 1 0 010 1.414l-6 6a1 1 0 01-1.414 0l-6-6a1 1 0 111.414-1.414L9 14.586V3a1 1 0 012 0v11.586l4.293-4.293a1 1 0 011.414 0z"
                           clip-rule="evenodd" />
                  </svg>
               </div>
               <div class="flex-grow flex flex-col ml-4">
                  <div class="flex items-center justify-between">
                     <span class="text-white">Number of autors</span>
                  </div>
                  <span class="text-xl font-bold"><?php echo $countuser[0] ?></span>
               </div>
         </div>

         <!-- Tile 3 -->
         <div class="flex items-center p-4 rounded">
               <div class="flex flex-shrink-0 items-center justify-center bg-green-200 h-16 w-16 rounded">
                  <svg class="w-6 h-6 fill-current text-green-700" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                     fill="currentColor">
                     <path fill-rule="evenodd"
                           d="M3.293 9.707a1 1 0 010-1.414l6-6a1 1 0 011.414 0l6 6a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L4.707 9.707a1 1 0 01-1.414 0z"
                           clip-rule="evenodd" />
                  </svg>
               </div>
               <div class="flex-grow flex flex-col ml-4">
                  <div class="flex items-center justify-between">
                     <span class="text-white">Archived wikis</span>
                  </div>
                  <span class="text-xl font-bold"><?php echo $countArchivedWiki[0] ?></span>
               </div>
         </div>

      </div>
      <!-- Component End  -->

   </div>
   </section>

   <!-- Tags part -->
 
      <section id="tags-page">
      <div class="w-1/5 mb-5 bg-gray-500">
               <p class="text-white">Gerer les Tags</p>
            </div>
         <div class=" rounded-sm">
            <form class="w-1/4 max-w-sm" action="controller/add-tag.php" method="post">
               <div class="flex items-center border-b border-teal-500 py-2">
                  <input class="appearance-none bg-transparent border-none text-white w-full mr-3 py-1 px-2" type="text" placeholder="Add tag name" aria-label="Full name" name="tag-name">
                  <input class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-2 rounded" type="submit" value="Add Tag" id="valider" name="valider">
               </div>
            </form>
         <div class="relative overflow-x-auto">
            <table class="w-1/2 text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
               <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                  <tr>
                        <th scope="col" class="px-6 py-3">
                           Nom de tags
                        </th>
                        <th scope="col" class="px-6 py-3">
                           Actions
                        </th>
                     </tr>
                  </thead>
               <tbody>
                     <?php
                        foreach($obj as $row){

                           ?>
                  <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                           <?php
                              echo $row->__get("name_tag");
                              ?>
                        </th>
                        <td class="px-6 py-4">
                           <a href="modifyTag.php?id=<?php echo $row->__get("id_tag") ?>" name="modifiedTagName">Modifier</a>
                           ||
                           <a href="controller/deleteTag.php?id=<?php echo $row->__get("id_tag") ?>">Supprimer</a>
                        </td>
                     </tr>
                        <?php
                        }
                        ?>
                  </tbody>
               </table>
            </div>
            
         </div>
      </section>

      <!-- Category Part -->

      <section class="pt-40" id="category-page">
         <div class="w-1/5 mb-5 bg-gray-500">
            <p class="text-white">Gerer  les categories</p>
         </div>
         <div class=" rounded-sm">
            <form class="w-2/4 max-w-sm" action="controller/categorie.php" method="post">
               <div class="flex items-center border-b border-teal-500 py-2">
              <input class="appearance-none bg-transparent border-none text-white w-full mr-3 py-1 px-2" type="text" placeholder="Add category name" aria-label="Full name" name="category-name">
              <input class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-2 rounded" type="submit" name="submit-categorie" value="Add Category">
            </div>
         </form>
         <div class="relative overflow-x-auto">
            <table class="w-1/2 text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
               <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                  <tr>
                        <th scope="col" class="px-6 py-3">
                           Nom de categories
                        </th>
                        <th scope="col" class="px-6 py-3">
                           Actions
                        </th>
                     </tr>
                  </thead>
               <tbody>
                  <?php
                     foreach ($objcat as $row){

                        
                        ?>
                  <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                     <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <?php echo $row->__get("name_category") ?>
                     </th>
                     <td class="px-6 py-4">
                        <a href="modifyCategory.php?id=<?php echo $row->__get('id_category') ?>">Modifier</a>
                        ||
                        <a href="controller/deleteCategorie.php?id=<?php echo $row->__get("id_category") ?>">Supprimer</a>
                     </td>
                  </tr>
                  <?php
               }
                  ?>
               </tbody>
               </table>
            </div>
            
         </div>
      </section>
      <section class="pt-40" id="wiki-page">
         <div class="relative overflow-x-auto">
            <div class="w-1/5 mb-5 bg-gray-500">
               <p class="text-white">Archiver les Wikis</p>
            </div>
            <table class="w-3/4 text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
               <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                  <tr>
                        <th scope="col" class="px-6 py-3">
                           Nom de Wiki
                        </th>
                        <th scope="col" class="px-6 py-3">
                           Categorie
                        </th>

                        <th scope="col" class="px-6 py-3">
                           Actions
                        </th>
                     </tr>
                  </thead>
               <tbody>
               <?php 
                     foreach($objwiki as $row){

                   ?>
                  <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                     <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                     <?php echo $row->__get("name_wiki") ?>
                     </th>
                     <td>
                     <?php echo $row->__get("category") ?>
                     </td>
                     <td>
                        <a href="controller/archive.php?id=<?php echo $row->__get('id_wiki') ?>">Archiver ce wiki</a>
                     </td>
                  </tr>
                  <?php
                     }
                  ?>
                  </tbody>
               </table>
            </div>
            
         </div>
      </section>
   </main>
   
   </body>
</html>