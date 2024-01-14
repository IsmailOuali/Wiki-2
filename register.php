<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="js/reg.js"></script>

    <title>Registrer a Wiki</title>
</head>
<style>
    .first-color { 
	    background: #5dacbd; 
	    /* background: #1f768a;  */
    }
        
    .second-color { 
        background: #24527a; 
    }

    .third-color { 
        background: #a7bcb9; 
    }

    .fourth-color { 
        background: #e0ebeb; 
    }

    *{
        margin: 0;
        padding: 0;
    }

    body{
        background-color: #5dacbd;

    }

    /* .form-container{
        /* background: #24527a;  */
        /* background: #072036;
      }  */

</style>
<body>
    <section class="">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <div class="bg-gradient-to-r from-cyan-500 to-blue-500 w-full rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-white md:text-2xl dark:text-white">
                        Creer un compte
                    </h1>
                    <form class="space-y-4 md:space-y-6" action="controller/registration.php" method="post">
                        <div>
                            <label for="name" class="block mb-2 text-sm font-medium text-white">Votre name</label>
                            <input type="name" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Adil Taarabt" required="">
                        </div>
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-white">Votre email</label>
                            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com" required="">
                            <small id="emailHelp" class="text-sm text-gray-500">Format d'email non valide.</small>

                        </div>

                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-white">Mot de passe</label>
                            <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                        </div>

                        <input value="Create an account" name="register" type="submit" class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                        <p class="text-sm text-white">
                            Vous possedez deja d'un compte? <a href="login.php" class="font-medium text-primary-600 hover:underline dark:text-primary-500">S'identifier ici</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
      </section>
      <script>

        document.addEventListener('DOMContentLoaded', function () {
            const emailInput = document.getElementById('email');

            emailInput.addEventListener('input', function () {
                validateEmail();
            });

            function validateEmail() {
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                const isEmailValid = emailRegex.test(emailInput.value);

                const emailHelp = document.getElementById('emailHelp');
                if (isEmailValid) {
                    emailHelp.style.display = 'none';
                } else {
                    emailHelp.style.display = 'block';
                }
            }
        });
    </script>
      </script>

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
</body>
</html>