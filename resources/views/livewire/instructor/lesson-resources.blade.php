<div>
    
    <article x-data="{open: false}" class="bg-gray-100 shadow overflow-hidden sm:rounded-lg">
        <div class="px-4 py-5 sm:px-6">
            <h3  x-on:click="open = !open" class="cursor-pointer text-lg leading-6 font-medium text-gray-900">
                Recursos de la lección
            </h3>

            <div x-show="open" class="border-t border-gray-200">
                <div class="px-4 py-5">
                    @if ($lesson->resource)
                        {{-- Lista de recursos de la lección --}}
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            <ul class="border border-gray-200 rounded-md divide-y overflow-hidden divide-gray-200">
                                <li class="bg-white pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                                    <div class="w-0 flex-1 flex items-center">
                                        <!-- Heroicon name: solid/paper-clip -->
                                        <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z" clip-rule="evenodd" />
                                        </svg>
                                        <span class="ml-2 flex-1 w-0 truncate">
                                            {{ $lesson->resource->url }}
                                        </span>
                                    </div>
                                    <div class="ml-4 flex-shrink-0">
                                        <a wire:click="destroy" class="cursor-pointer ml-4 text-sm text-gray-600 hover:text-gray-500">
                                            Eliminar
                                        </a>
                                        <a wire:click="download" class="cursor-pointer ml-4 text-sm font-bold text-blue-600 hover:text-blue-500">
                                            Descargar
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </dd>

                    @else
                        
                        <form wire:submit.prevent="save" class="px-4 py-5">
                            <div class="pt-2 flex items-center">
                                <input wire:model="file" type="file" class="flex-1 mt-1 form-input bg-white">
                                <button type="submit" class="ml-2 px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Guardar</button>
                            </div>

                            <div wire:loading wire:target="file" class="text-blue-500 font-bold mt-1">
                                CARGANDO ...
                            </div>

                            @error('file')
                                <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror
                        </form>
                    
                    @endif
                    
                </div>
            </div>
        </div>
    </article>

</div>
