<div>
    <article class="card" x-data="{ open: false }">
        <div class="card-body bg-gray-100">
            <header>
                <h1 x-on:click="open = !open"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400 cursor-pointer"><i
                        class="far fa-plus-square  mr-2"></i> Descripción
                    del curso</h1>
            </header>
            <div x-show="open">
                <hr class="my-2">
                @if ($lesson->description)
                    <form wire:submit.prevent='update'>
                        <textarea wire:model="description.name" cols="30" rows="2"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Breve descripción"></textarea>
                        <strong class="text-red-600 text-xs">{{ $errors->first('description.name') }}</strong>

                        <div class="flex justify-end my-2">
                            <button wire:click="destroy"
                                class="px-4 py-2 text-sm text-white duration-100 bg-red-600 rounded-md shadow-md focus:shadow-none ring-offset-2 ring-red-600 focus:ring-2 ml-2">Eliminar</button>
                            <button
                                class="px-4 py-2 text-sm text-white duration-100 bg-blue-600 rounded-md shadow-md focus:shadow-none ring-offset-2 ring-blue-600 focus:ring-2 ml-2" ">Actualizar</button>
                        </div>
                    </form>
@else
<div>
                        <textarea wire:model="name" cols="30" rows="2"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Breve descripción"></textarea>
                        <strong class="text-red-600 text-xs">{{ $errors->first('name') }}</strong>

                        <div class="flex justify-end my-2">
                            {{-- <button wire:click="cancel"
                                class="px-4 py-2 text-sm text-white duration-100 bg-red-600 rounded-md shadow-md focus:shadow-none ring-offset-2 ring-red-600 focus:ring-2 ml-2">Cancelar</button> --}}
                            <button wire:click="store"
                                class="px-4 py-2 text-sm text-white duration-100 bg-blue-600 rounded-md shadow-md focus:shadow-none ring-offset-2 ring-blue-600 focus:ring-2 ml-2"
                                ">Guardar</button>
                        </div>
            </div>
            @endif
        </div>
</div>
</article>
</div>
