<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <x-embed-styles />
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    My Youtube collection 🍕🍔🎬
                </div>
            </header>

            <!-- Page Content -->
            <main>

                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 m-5 px-4 py-3 relative rounded text-red-700">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="video-container" style="display: flex; flex-wrap: wrap;">
                    @foreach ($videos as $video)
                        <div style="width: 25%; padding: 0.5em">
                            <x-embed url="{{ $video->url }}" />
                        </div>
                    @endforeach
                </div>

                <form method="post" action="/">
                    {{ csrf_field() }}
                    <div class="relative text-gray-700 m-3">
                        <input class="w-full h-10 pl-3 pr-8 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" name="url" type="text" placeholder="Add another one"/>
                        <button class="absolute inset-y-0 right-0 flex items-center px-4 font-bold text-white bg-indigo-600 rounded-r-lg hover:bg-indigo-500 focus:bg-indigo-700">Add</button>
                    </div>
                </form>
            </main>
        </div>
    </body>
</html>
