<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">

        <style>
            body {
                font-family: 'Nunito';
            }
        </style>
    </head>
    <body class="antialiased">
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 items-center ">
        <button onclick="location.href='/att/in/{{ $id }}'" class="h-12 bg-blue-500 hover:bg-blue-700 text-white font-bold mx-6 py-2 px-4 border border-blue-700 rounded">
            출근
        </button>

        <button onclick="location.href='/att/out/{{ $id }}'" class="h-12 bg-blue-500 hover:bg-blue-700 text-white font-bold mx-6 py-2 px-4 border border-blue-700 rounded">
            퇴근
        </button>

    </div>
    </body>
</html>
