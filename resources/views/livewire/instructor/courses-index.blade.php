<div class="container py-8">

    <x-table-responsive>

        <div class="px-6 py-4 flex">
            <input wire:keydown="limpiar_page" wire:model="search" class="flex-1 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-outline focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Buscar por cursos">
            <a class="ml-2 px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-1 focus:ring-offset-1 focus:ring-blue-500" href="{{ route('instructor.courses.create') }}">Crear nuevo curso</a>
        </div>

        @if ($courses->count())
        
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Nombre
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Matriculados
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Calificación
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Status
                        </th>
                        <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($courses as $course)
                        
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        @isset($course->image)
                                            <img class="h-10 w-10 rounded-full object-cover object-center" src="{{ Storage::url($course->image->url) }}" alt="">
                                        @else
                                            <img class="h-10 w-10 rounded-full object-cover object-center" src="https://images.pexels.com/photos/5905710/pexels-photo-5905710.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">
                                        @endisset
                                    </div>
                                    <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">
                                        {{$course->title}}
                                    </div>
                                    <div class="text-sm text-gray-500">
                                        {{$course->category->name}}
                                    </div>
                                    </div>
                                </div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">
                                    {{ $course->students->count() }}
                                </div>
                                <div class="text-sm text-gray-500">Alumnos</div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900 flex items-center">
                                    
                                    {{ $course->rating }}

                                    {{-- Estrellas --}}
                                    <ul class="flex text-sm ml-2">
                                        <li class="mr-1">
                                            <i class="fas fa-star text-{{$course->rating >= 1 ? 'red' : 'gray'}}-400"></i>
                                        </li>
                                        <li class="mr-1">
                                            <i class="fas fa-star text-{{$course->rating >= 2 ? 'red' : 'gray'}}-400"></i>
                                        </li>
                                        <li class="mr-1">
                                            <i class="fas fa-star text-{{$course->rating >= 3 ? 'red' : 'gray'}}-400"></i>
                                        </li>
                                        <li class="mr-1">
                                            <i class="fas fa-star text-{{$course->rating >= 4 ? 'red' : 'gray'}}-400"></i>
                                        </li>
                                        <li class="mr-1">
                                            <i class="fas fa-star text-{{$course->rating == 5 ? 'red' : 'gray'}}-400"></i>
                                        </li>
                                    </ul>
                                </div>
                                <div class="text-sm text-gray-500">Valoración del curso</div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">

                                @switch($course->status)
                                    @case(1)
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                            Borrador
                                        </span>
                                        @break
                                    @case(2)
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                            Revisión
                                        </span>
                                        
                                        @break
                                    @case(3)
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            Publicado
                                        </span>

                                        @break
                                    @default
                                        
                                @endswitch

                            </td>
                            
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="{{ route('instructor.courses.edit', $course) }}" class="text-indigo-600 hover:text-indigo-900">Editar</a>
                            </td>
                        </tr>

                    @endforeach
                </tbody>
            </table>

            <div class="px-6 py-4">
                {{ $courses->links() }}
            </div>

        @else
            <div class="px-6 py-4 text-center text-gray-400 font-bold">
                No hay ningun curso con ese nombre.
            </div>
        @endif
        

    </x-table-responsive>

  
</div>
