<div class="mt-8">
    <div class="container grid grid-cols-1 lg:grid-cols-3 gap-8">
        {{-- Columna principal --}}
        <div class="lg:col-span-2">
            {{-- Mostrar codigo HTML almacenado --}}
            <div class="embed-responsive">
                {!!$current->iframe!!}
            </div>

            <h1 class="text-3xl text-gray-600 font-bold mt-4">{{ $current->name }}</h1>

            @if ($current->description)
                <div class="text-gray-600">
                    {{ $current->description->name }}
                </div>
            @endif

            <div wire:click="completed" class="flex items-center mt-4 cursor-pointer">
                @if ($current->completed)
                    <i class="fas fa-toggle-on text-2xl text-red-600"></i>
                @else
                    <i class="fas fa-toggle-off text-2xl text-gray-600"></i>
                @endif
                <p class="text-sm ml-2">Marcar esta lección como completada</p>
            </div>

            <div class="card mt-4">
                <div class="card-body flex font-bold text-gray-500">
                    @if ($this->previus)
                        <a wire:click="changeLesson({{$this->previus}})" class="cursor-pointer">Lección anterior</a>
                    @endif
                    
                    @if ($this->next)
                        <a wire:click="changeLesson({{$this->next}})" class="ml-auto cursor-pointer">Siguiente lección</a>
                    @endif
                    
                </div>

            </div>        

        </div>

        {{-- Lista avance curso --}}
        <div class="card">

            <div class="card-body">
                <h1 class="text-2xl leading-8 text-center mb-4">{{ $course->title }}</h1>

                {{-- Datos del profesor --}}
                <div class="flex items-center">
                    <figure>
                        <img class="h-12 w-12 object-cover rounded-full shadow-lg mr-4" src="{{ $course->teacher->profile_photo_url }}" alt="{{ $course->teacher->name }}">
                    </figure>

                    <div class="">
                        <p>{{ $course->teacher->name }}</p>
                        <a class="text-red-500 text-sm" href="">{{ '@' . Str::slug($course->teacher->name, '') }}</a>
                    </div>

                </div>

                {{-- Barra de progreso --}}
                <p class="text-gray-600 text-sm mt-2">{{ $this->advance . '%'}} completado</p>

                <div class="relative pt-1">
                    <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-gray-200">
                      <div style="width:{{ $this->advance . '%'}}" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-red-500 transition-all dura"></div>
                    </div>
                </div>

                {{-- Lista de secciones --}}
                <ul>
                    @foreach ($course->sections as $section)
                        <li class="text-gray-600 mb-4">
                            <a class="font-bold text-base inline-block mb-2">{{ $section->name }}</a>
                            {{-- Lista de lecciones de la seccion --}}
                            <ul>
                                @foreach ($section->lessons as $lesson)
                                    <li class="flex mb-1">
                                        <div>
                                            @if ($lesson->completed)
                                                @if ($current->id == $lesson->id)
                                                    <span class="inline-block w-4 h-4 border-2 border-yellow-300 rounded-full mr-2 mt-1"></span>
                                                @else
                                                    <span class="inline-block w-4 h-4 bg-yellow-300 rounded-full mr-2 mt-1"></span>
                                                @endif
                                                
                                            @else
                                                @if ($current->id == $lesson->id)
                                                    <span class="inline-block w-4 h-4 border-gray-500 border-2 rounded-full mr-2 mt-1"></span>
                                                @else
                                                    <span class="inline-block w-4 h-4 bg-gray-500 rounded-full mr-2 mt-1"></span>
                                                @endif
                                            @endif
                                        </div>
                                        <a class="cursor-pointer" wire:click="changeLesson({{ $lesson }})" >{{ $lesson->name }}  </a> 
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        
                    @endforeach
                </ul>
            </div>

        </div>

    </div>
</div>
