<div>
    <x-slot name="course">
        {{ $course->slug }}
    </x-slot>

    <div class="bg-white overflow-hidden sm:rounded-lg">
        <div class="py-5">
            <h3 class="text-3xl leading-6 font-medium text-gray-500 uppercase">
            Lecciones del curso
            </h3>
        </div>
    </div>

    @foreach ($course->sections as $item)

        <article x-data="{open: false}" class="card mb-6 border border-gray-300 shadow-outline">

            <div class="card-body bg-gray-100">

                @if ($section->id == $item->id)
                    <form wire:submit.prevent="update">
                        <input wire:model="section.name" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-outline focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Nombre de la sección...">

                        @error('section.name')
                            <span class="text-xs text-red-500">{{ $message }}</span>
                        @enderror
                    </form>
                @else
                    <header class="flex items-center justify-between shadow-outline">

                        <h1 x-on:click="open = !open" class="cursor-pointer"><strong class="mr-1">Sección:</strong>{{ $item->name }}</h1>

                        <div class="flex">
                            <a wire:click="edit({{ $item }})" class="text-blue-500 cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </a>
                            <a wire:click="destroy({{ $item }})" class="text-red-500 cursor-pointer ml-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </a>
                        </div>
                    </header> 

                    <div x-show="open">
                        @livewire('instructor.courses-lesson', ['section' => $item], key($item->id))
                    </div>
                @endif
                

            </div>

        </article>
        
    @endforeach

    <div x-data="{open:false}">
        <a x-show="!open" x-on:click="open = true" class="flex items-center cursor-pointer text-blue-500">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            Agregar nueva sección
        </a>

        <article x-show="open" class="card bg-gray-100 border border-gray-300 rounded-md shadow-outline overflow-hidden">
            <div class="card-body bg-gray-100">
                <h1 class="text-xl font-bold mb-4">Agregar nueva sección</h1>

                <div class="mb-4">
                    <input wire:model="name" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-outline focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Nombre de la sección">
                    @error('name')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex justify-end">
                    <button class="px-4 py-2 border border-gray-300 rounded-md shadow-outline text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-1 focus:ring-offset-1 focus:ring-blue-500" x-on:click="open = false">Cancelar</button>
                    <button class="ml-2 px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-1 focus:ring-offset-1 focus:ring-blue-500" wire:click="store">Agregar</button>
                </div>
            </div>
        </article>
    </div>

</div>
