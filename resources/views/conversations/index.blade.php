<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
{{--    <link href="{{ mix('css/app.css') }}" rel="stylesheet">--}}
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">

    <livewire:styles>

        @stack('styles')
        </head>
<body class="bg-gray-100 h-screen antialiased leading-none">
<div id="app" class="flex flex-col md:flex-row">
    <div class="flex flex-col sm:justify-around">
        <div class="w-64 h-screen bg-gray-800 mt-8 sm:mt-0">
            <div class="flex items-center justify-center mt-10">
                {{--                    <img class="h-6" src="https://premium-tailwindcomponents.netlify.app/assets/svg/tailwindcomponent-light.svg">--}}
                <h1 class="h-6 text-white">Nemdic Pro</h1>
            </div>

            <nav class="mt-10">

            </nav>

            <div class="absolute bottom-0 my-10">
                <a class="flex items-center py-2 px-8 text-gray-600 hover:text-gray-500" href="#">
                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M18 10C18 14.4183 14.4183 18 10 18C5.58172 18 2 14.4183 2 10C2 5.58172 5.58172 2 10 2C14.4183 2 18 5.58172 18 10ZM10 7C9.63113 7 9.3076 7.19922 9.13318 7.50073C8.85664 7.97879 8.24491 8.14215 7.76685 7.86561C7.28879 7.58906 7.12543 6.97733 7.40197 6.49927C7.91918 5.60518 8.88833 5 10 5C11.6569 5 13 6.34315 13 8C13 9.30622 12.1652 10.4175 11 10.8293V11C11 11.5523 10.5523 12 10 12C9.44773 12 9.00001 11.5523 9.00001 11V10C9.00001 9.44772 9.44773 9 10 9C10.5523 9 11 8.55228 11 8C11 7.44772 10.5523 7 10 7ZM10 15C10.5523 15 11 14.5523 11 14C11 13.4477 10.5523 13 10 13C9.44772 13 9 13.4477 9 14C9 14.5523 9.44772 15 10 15Z"
                              fill="currentColor"/>
                    </svg>


                    <span class="mx-4 font-medium">Support</span>
                </a>
            </div>
        </div>
    </div>

    <div class="main-content w-full">
        <div>
            <h1>Your Conversations</h1>

            <livewire:converse::conversations.conversation-list :conversations="$conversations" />
        </div>
    </div>
</div>
<livewire:scripts>
@stack('scripts')
</body>
</html>

