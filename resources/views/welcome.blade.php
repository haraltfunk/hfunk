<x-app-layout>
{{-- PORTADA --}}
    <section class="bg-cover" style="background-image: url({{asset('img/home/portada1920.jpg')}})">
    
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-36">

            <div class="w-full md:w-3/4 lg:w-1/2">

                <h1 class="text-white font-bold text-4xl">Domina la tecnología web con Haralt Funk</h1>
                <p class="text-white text-lg mt-2 mb-4">Aqui encontrarás cursos, manuales y artículos que te ayudarán a convertirte en un profesional del area que tu deses</p>

                @livewire('search')

            </div>

        </div>

    </section>

    <section class="mt-24">
        
        <h1 class="text-gray-600 text-center text-3xl mb-6">CONTENIDO</h1>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
            
            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{asset('img/home/developer-3461405_640.png')}}" alt="">
                </figure>

                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">Cursos y proyectos</h1>
                </header>

                <p class="text-sm text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos eius atque</p>
            
            </article>

            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{asset('img/home/technology-1283624_640.jpg')}}" alt="">
                </figure>

                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">Manual de Laravel</h1>
                </header>

                <p class="text-sm text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos eius atque</p>
            
            </article>

            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{asset('img/home/social-media-1989152_640.jpg')}}" alt="">
                </figure>

                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">Blog</h1>
                </header>

                <p class="text-sm text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos eius atque</p>
            
            </article>

            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{asset('img/home/interface-3614766_640.png')}}" alt="">
                </figure>

                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">Desarrollo web</h1>
                </header>

                <p class="text-sm text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos eius atque</p>
            
            </article>

        </div>

    </section>

    <section class="mt-24 bg-gray-700 py-12">

        <h1 class="text-center text-white text-3xl">¿No sabes quien es Haralt?</h1>
        <p class="text-center text-white">Dirígete al catalogo de cusros y filtralos por categoría o nivel para que veas que puedo hacer por ti</p>

        <div class="flex justify-center mt-4">
            
            <a href="{{route('courses.index')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Buscar cursos
            </a>

        </div>

    </section>

    <section class="my-24">
        <h1 class="text-center text-3xl text-gray-600">ÚLTIMOS CURSOS</h1>
        <p class="text-center text-gray-500 text-sm mb-6">Recibo solicitudes de cursos para seguir creciendo</p>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-y-8 gap-x-6">

            @foreach ($courses as $course)
                <x-course-card :course="$course"/>
            @endforeach

        </div>
    </section>


</x-app-layout>
