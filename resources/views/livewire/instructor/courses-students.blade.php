<div>

    <div class="bg-white overflow-hidden sm:rounded-lg">
        <div class="py-5">
            <h3 class="text-3xl leading-6 font-medium text-gray-500 uppercase">
            Estudiantes inscritos
            </h3>
        </div>
        
    </div>

    <x-table-responsive>

        <div class="px-6 py-4">
            <input wire:model="search" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-outline focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Buscar por cursos">
        </div>

        @if ($students->count())
        
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Nombre
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Email
                        </th>
                        <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($students as $student)
                        
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                    
                                        <img class="h-10 w-10 rounded-full object-cover object-center" src="{{ $student->profile_photo_url }}" alt="">
                                    
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ $student->name }}
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">
                                    {{ $student->email }}
                                </div>
                            </td>
                            
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="" class="text-indigo-600 hover:text-indigo-900">Ver</a>
                            </td>
                        </tr>

                    @endforeach
                </tbody>
            </table>

            <div class="px-6 py-4">
                {{ $students->links() }}
            </div>

        @else
            <div class="px-6 py-4 text-center text-gray-400 font-bold">
                No hay alumnos
            </div>
        @endif
        

    </x-table-responsive>

</div>
