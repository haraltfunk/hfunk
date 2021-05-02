<section>
    <div class="bg-white overflow-hidden sm:rounded-lg">
        <div class="py-5">
            <h3 class="text-3xl leading-6 font-medium text-gray-500 uppercase">
            Audiencia
            </h3>
        </div>
    </div>

    @foreach ($course->audiences as $item)
        
        <article class="card mb-6 border border-gray-300 shadow-outline">

            <div class="card-body bg-gray-100 overflow-hidden rounded-md ">

                @if ($audience->id == $item->id)

                    <form wire:submit.prevent="update">
                        <input wire:model="audience.name" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-outline focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Nombre de la meta">
                        
                        @error('audience.name')
                            <span class="text-xs text-red-500">{{ $message }}</span>
                        @enderror
                    </form>
               

                @else
                    <header class="flex justify-between ">

                        <h1 class="block text-sm font-medium text-gray-500">{{ $item->name }}</h1>

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
                @endif

            </div>

        </article>

    @endforeach

    <div x-data="{open:false}">
        <a x-show="!open" x-on:click="open = true" class="flex items-center cursor-pointer text-blue-500">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6  w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            Nueva audiencia
        </a>

        <article x-show="open" class="card bg-gray-100 border border-gray-300 rounded-md shadow-outline overflow-hidden">
            <div class="card-body bg-gray-100">
                <h1 class="text-xl font-bold mb-4">Agregar nueva audiencia</h1>

                <div class="mb-4">
                    <input wire:model="name" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-outline focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Nombre de la audiencia...">
                    @error('name')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex justify-end">
                    <button x-on:click="open = false" class="px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Cancelar</button>
                    <button wire:click="store" class="ml-2 px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Agregar</button>
                </div>
            </div>
        </article>
    </div>
    
</section>
