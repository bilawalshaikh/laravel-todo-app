<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body class="bg-gradient-to-r from-purple-400 via-pink-500 to-red-500 p-4">

    <div class="container mx-auto p-6 bg-white rounded-xl shadow-lg">
        <h1 class=" bg-gradient-to-r from-purple-400 text-2xl font-bold text-center text-gray-800 mb-8">TODO Application</h1>
        <x-flash-message  />

        <div class="mb-6 ">
            <form class="flex flex-col space-y-4" method="POST" action="/">
                @csrf
                <input class="border border-gray-300 rounded-md py-2 px-4 focus:outline-none focus:ring-2 focus:ring-purple-600" type="text" name="title" placeholder="The todo title">
                <textarea class="border border-gray-300 rounded-md py-2 px-4 focus:outline-none focus:ring-2 focus:ring-purple-600" name="description" placeholder="the todo description" cols="30" rows="5"></textarea>
                <button class="w-20 py-2 px-4 bg-purple-600 text-white rounded-md hover:bg-purple-700 transition duration-300">Add</button>
            </form>
        </div>
        <hr class="border-t border-gray-300">
        <div class="mt-4 space-y-4 ">
            @foreach ($todos as $todo)
            <div class="flex items-center justify-between border-b border-gray-300 @if($todo->isDone) line-through @endif">
                <div class="flex-1 pr-8">
                    <h3 class="text-lg font-semibold text-gray-800">{{$todo->title}}</h3>
                    <p class="text-gray-600">{{$todo->description}}</p>
                </div>
                <div class="flex space-x-3">
                    <form method="POST" action="/{{$todo->id}}">
                        @csrf  
                        @method('PATCH')
                        <button class="py-2 px-2 bg-green-500 text-white rounded-md hover:bg-green-600 transition duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                            </svg>
                        </button>
                    </form>
                    <form method="POST" action="/{{$todo->id}}">
                        @csrf  
                        @method('DELETE')
                        <button class="py-2 px-2 bg-red-500 text-white rounded-md hover:bg-red-600 transition duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</body>
</html>
