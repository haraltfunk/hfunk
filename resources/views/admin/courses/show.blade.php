<x-app-layout>
    <section class="bg-gray-700 py-12 mb-12">
        <div class="container grid grid-cols-1 lg:grid-cols-2 gap-6">
            <figure>
                @if ($course->image)
                    <img class="h-60 w-full object-cover" src="{{ Storage::url($course->image->url) }}" alt="">
                @else
                    <img class="h-60 w-full object-cover" src="https://images.pexels.com/photos/5905710/pexels-photo-5905710.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">
                @endif
            </figure>

            <div class="text-white">
                <h1 class="text-4xl">{{ $course->title }}</h1>
                <h2 class="text-xl mb-3">{{ $course->subtitle }}</h2>
                <p class="mb-2"><i class="fas fa-chart-line"></i> Nivel: {{ $course->level->name }}</p>
                <p class="mb-2"><i class=""></i> Categoria: {{ $course->category->name }}</p>
                <p class="mb-2"><i class="fas fa-users"></i> Matriculados: {{ $course->students_count }}</p>
                <p><i class="far fa-star"></i> Calificación {{ $course->rating }}</p>
            </div>
        </div>
    </section>

    <div class="container grid grid-cols-1 lg:grid-cols-3 gap-6">
        {{-- Alerta de curso incompleto --}}

        @if (session('info'))
            <div class="lg:col-span-3" x-data="{open: true}" x-show="open">
                <div class="px-4 py-3 leading-normal text-red-700 border border-red-500 rounded-md relative" role="alert">
                    <strong class="font-bold">¡Ocurrio un error!</strong>
                    <span>{{ session('info') }}</span>
                    <span class="absolute inset-y-0 right-0 flex items-center mr-4">
                        
                        <svg x-on:click="open=false" role="button" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9" />
                        </svg>
                        
                    </span>
                </div>
            </div>
        @endif

        <div class="order-2 lg:order-1 lg:col-span-2">

            {{-- Metas --}}
            <section class="card mb-8">
                <div class="card-body">
                    <h1 class="font-bold text-2xl mb-2">Lo que aprenderas</h1>
                    <ul class="grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-2">
                        
                        @forelse ($course->goals as $goal)
                            <li class="text-gray-700 text-base"><i class="fas fa-check text-gray-600 mr-2"></i>{{ $goal->name }}</li>
                        @empty
                            <li class="text-gray-700 text-base">Este curso no tiene asignado ninguna meta</li>
                        @endforelse

                    </ul>
                </div>
            </section>

            {{-- Temario --}}
            <section class="mb-12">
                <h1 class="font-bold text-3xl mb-4">Temario</h1>

                @forelse ($course->sections as $section)
                
                    <article class="mb-4 shadow-lg" 
                        @if ($loop->first)
                            x-data="{ open: true }"
                        @else
                            x-data="{ open: false }"
                        @endif>
                        <header class="border border-gray-200 px-2 py-2 cursor-pointer bg-gray-200" x-on:click="open = !open">
                            <h1 class="font-bold text-lg text-gray-600">{{ $section->name }}</h1>
                        </header>

                        <div class="bg-white py-2 px-4" x-show="open">
                            <ul class="grid grid-cols-1 gap-2">
                                @foreach ($section->lessons as $lesson)
                                    <li class="text-gray-700 text-base"><i class="fas fa-play-circle mr-2 text-gray-600"></i>{{ $lesson->name }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </article>

                @empty

                    <article class="card">
                        <div class="card-body">
                            Este curso no tiene ninguna seccion asignada
                        </div>
                    </article>

                @endforelse

            </section>

            {{-- Requisitos --}}
            <section class="mb-12">
                <h1 class="text-bold text-3xl mb-2">Requisitos</h1>
                
                <ul class="list-disc list-inside">
                    @forelse ($course->requirements as $requirement)
                        <li class="text-gray-700 text-base">{{ $requirement->name }}</li>
                    @empty
                    <li class="text-gray-700 text-base">Este curso no tiene ningún requerimiento </li>

                    @endforelse
                </ul>
            </section>

            {{-- Descripcion --}}
            <section class="mb-12">
                <h1 class="text-bold text-3xl mb-2">Descripción</h1>

                <div class="text-gray-700 text-base">{!! $course->description !!}</div>
                
            </section>
        </div>

        <div class="order-1 lg:order-2">
            <section class="card mb-6">
                <div class="card-body">
                    <div class="flex items-center mb-4">
                        <img class="h-20 w-20 object-cover rounded-full shadow-lg" src="{{ $course->teacher->profile_photo_url }}" alt="Foto de {{ $course->teacher->name }}">
                        <div class="ml-4">
                            <h1 class="text-bold text-gray-500 text-xl">Prof. {{ $course->teacher->name }}</h1>
                            <a class="text-red-500 text-sm font-bold" href="">{{ '@'. Str::slug($course->teacher->name) }}</a>
                        </div>
                    </div>

                    <form action="{{ route('admin.courses.approved', $course) }}" method="POST">
                        @csrf

                        <button type="submit" class="px-4 py-2 w-full border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-1 focus:ring-offset-1 focus:ring-blue-500">
                            Aprobar curso
                        </button>
                    </form>
                    
                    <a href="{{ route('admin.courses.observation', $course) }}" class="block mt-3 text-center px-4 py-2 w-full border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-red-500 hover:bg-red-600 focus:outline-none focus:ring-1 focus:ring-offset-1 focus:ring-red-500">
                        Observaciones
                    </a>


                </div>
            </section>
        </div>

    </div>
</x-app-layout>