<div class="card" x-data="{ open: false }">
    <div class="card-body bg-gray-100">
        <header>
            <h1 x-on:click="open = !open"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400 cursor-pointer"><i
                    class="far fa-plus-square mr-2 "></i> Recursos del curso
                del curso</h1>
        </header>
        <div x-show="open">
            <hr class="my-2">
            @if ($lesson->resource)
                <div class="flex justify-between item-center">
                    <p><i wire:click="download"
                            class="fas fa-download text-gray-500 mr-2 cursor-pointer transition duration-200 hover:text-blue-700"></i>
                        {{ $lesson->resource->url }}
                    </p>
                    <i wire:click="destroy" class="fas fa-trash text-red-400 cursor-pointer hover:text-red-700"></i>
                </div>
            @else
                <form wire:submit.prevent='save'>
                    <div class="flex item-center">
                        <input wire:model='file' type="file"
                            class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none flex-1">
                        <button type="submit"
                            class="px-4 py-2 text-sm text-white duration-100 bg-blue-600 rounded-md shadow-md focus:shadow-none ring-offset-2 ring-blue-600 focus:ring-2 ml-4">Guardar</button>
                    </div>
                    {{-- wire:target="file" => para especificar en que input está cargando --}}
                    <div class="text-blue-500 font-bold" wire:loading wire:target='file'>
                        Cargando ...
                    </div>
                    <strong class="text-red-600 text-xs">{{ $errors->first('file') }}</strong>
                </form>
            @endif
        </div>
    </div>
</div>
