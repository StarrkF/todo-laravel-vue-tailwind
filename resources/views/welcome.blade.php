<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Todo App</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
       
    </head>
    <body class="bg-slate-300">
        <div class="shadow-teal-300 text-white shadow-xl p-16 my-72 mx-auto w-4/6 text-center justify-center  bg-slate-500 rounded-xl
                    hover:shadow-2xl hover:shadow-teal-500">
            <div class="text-3xl my-10 "> Welcome <span class="font-extrabold">Todo App</span></div>
            <div class="inline-block my-5">
                <label for="" class="p-2 text-lg"><i class="fas fa-envelope"></i></label>
                <input type="text" class="text-lg p-2 bg-transparent outline-none border-b-2 focus:shadow-xl focus:border-teal-300" name="" id="">
            </div>
            <div class="inline-block my-5">
                <label for="password" class="p-2 text-lg"><i class="fas fa-lock focus:text-teal-200"></i></label>
                <input type="password" class="text-lg p-2 bg-transparent outline-none border-b-2 focus:shadow-xl focus:border-teal-300" name="" id="password">
            </div>

        </div>

            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

      
    </body>
</html>
