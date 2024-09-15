<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>About</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.css" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="styles" href="style.css">
</head>

<body>
    <nav class="bg-white border-gray-200 px-2 sm:px-4 py-2.5 rounded dark:bg-gray-100 pb-10">
        <div class="container flex flex-wrap items-center justify-between mx-auto">
            <a href="index.php" class="flex items-center">
                <img src="img/logo.png" class="h-6 mr-3 sm:h-9"
                    alt="wflogo" />
                <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Warframe
                    Calculator</span>
            </a>
            <button data-collapse-toggle="navbar-default" type="button"
                class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul
                    class="flex flex-col p-4 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <a href="index.php"
                            class="block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white"
                            aria-current="page">Home</a>
                    </li>
                    <li>
                        <a href="factionpage.php"
                            class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Factions</a>
                    </li>
                    <li>
                        <a href="about.php"
                            class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">About</a>
                    </li>
                    <li>
                        <a href="login.php"
                            class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Login/Sign up</a>
                </ul>
            </div>
        </div>
    </nav>

    <div class="flex justify-center">
        <div class="container mx-auto max-width-960 px-4">
            <div class="flex justify-center">
                <img src="img/logo.png" class="h-6 mr-3 sm:h-9"
                    alt="wflogo" />
            </div>
            <div class="flex justify-center">
                <div class="w-full md:w-1/2">
                    <h1 class="text-4xl font-bold text-gray-900 dark:text-white"></h1>
                    <p class="mt-4 text-gray-600 dark:text-gray-400">Welcome to my loot calculator for Warframe project!
                        First of all, this project is not affiliated with Digital Extremes or Warframe in any way. I am
                        simply a fan of the game and wanted to create a tool that would help other players.
                        Second of all, this project was created as a school project for my "back-end-endproject"
                        (basically
                        a test)!
                    </p>
                    <p class="mt-4 text-gray-600 dark:text-gray-400">
                        As an avid gamer myself, I came up with the idea for this project as a way to simplify and
                        streamline the process of tracking loot drops for players.
                        I understand the importance of keeping track of loot drops and knowing the odds of receiving
                        rare
                        items.
                        My loot calculator project is designed to be user-friendly and efficient, keeping things simple
                        in
                        design (for now) and allowing users to quickly and easily calculate the minimum amount of loot
                        that
                        enemies drop in a table that generates everytime the button is pressed, making it easy to see
                        what
                        loot has been dropped.
                        The calculator is also designed to be easily expandable, allowing me to add more features and
                        content in the future.
                        For now the calculator is capable of calculating the minimum amounts of loot that enemies drop
                        in
                        the early few planets of Warframe, but I plan to expand the calculator to include more planets,
                        enemies, mods and even more resources in the future.
                        Alongside these features, I also plan to add the option to select the many buffs that Warframe
                        offers it's players, those being for example the Mod Drop Chance Booster, Resource Booster,
                        Resource
                        Drop Chance Booster and hopefully this would include Smeeta Kavat buff and the many loot
                        boosting
                        warframe abilities in the future.
                    </p>
                    <p class="mt-4 text-gray-600 dark:text-gray-400">
                        Overall, I am proud of the work I have put into this project.</p>
                </div>
            </div>
        </div>

        <footer class="bg-white rounded-lg shadow m-4 dark:bg-gray-800 fixed bottom-0 w-full">
            <div class="w-full mx-auto max-w-screen-xl p-4 md:flex md:items-center md:justify-between">
                <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2023 <a
                        href="https://flowbite.com/" class="hover:underline">Made with Flowbite™</a>.
                </span>
                <ul
                    class="flex flex-wrap items-center mt-3 text-sm font-medium text-gray-500 dark:text-gray-400 sm:mt-0">
                    <li>
                        <a href="#" class="mr-4 hover:underline md:mr-6 ">About</a>
                    </li>
                    <li>
                        <a href="#" class="mr-4 hover:underline md:mr-6">Privacy Policy</a>
                    </li>
                    <li>
                        <a href="#" class="mr-4 hover:underline md:mr-6">Licensing</a>
                    </li>
                    <li>
                        <a href="#" class="hover:underline">Contact</a>
                    </li>
                </ul>
            </div>
        </footer>
</body>

</html>
