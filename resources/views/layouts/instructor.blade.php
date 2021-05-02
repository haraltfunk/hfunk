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
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Content -->
            <div class="container py-8 grid grid-cols-5">

                <aside>
                    <h1 class="font-bold text-2xl mb-6 text-gray-500">Ajustes del curso</h1>

                    <ul class="p-2 space-y-2 flex-1 overflow-auto text-gray-500">
                        <li>
                            <a href="{{ route('instructor.courses.edit', $course) }}" class="flex space-x-2 items-center p-2 rounded-md @routeIs('instructor.courses.edit', $course) bg-gray-300 text-blue-500 @else hover:bg-gray-300 hover:text-blue-500 @endif ">
                                {{-- <i class="far fa-list-alt w-7"></i> --}}
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>Información del curso</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('instructor.courses.curriculum', $course) }}" class="flex space-x-2 items-center p-2 rounded-md @routeIs('instructor.courses.curriculum', $course) bg-gray-300 text-blue-500 @else hover:bg-gray-300 hover:text-blue-500 @endif ">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                </svg>
                                <span>Lecciones del curso</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('instructor.courses.goals', $course) }}" class="flex space-x-2 items-center p-2 rounded-md @routeIs('instructor.courses.goals', $course) bg-gray-300 text-blue-500 @else hover:bg-gray-300 hover:text-blue-500 @endif ">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                                </svg>
                                <span> Metas del curso</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex space-x-2 items-center p-2 rounded-md hover:bg-gray-300 hover:text-blue-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                <span>Estudiantes</span>
                            </a>
                        </li>
                    </ul>
                    
                </aside>
        
                <div class="col-span-4 card">
        
                    <main class="card-body text-gray-600">
        
                        {{ $slot }}
        
                    </main>
        
                </div>
        
            </div>
        </div>

        @stack('modals')

        @livewireScripts

        @isset($js)
        
            {{ $js }}

        @endisset
    </body>
</html>
