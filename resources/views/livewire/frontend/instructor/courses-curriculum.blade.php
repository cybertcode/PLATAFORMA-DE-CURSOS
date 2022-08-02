<div>
    {{-- Pasamos el slug a la vista --}}
    <x-slot name="course">
        {{ $course->slug }}
    </x-slot>
    <h1 class="text-2xl font-bold">LECCIONES DEL CURSO</h1>
    <hr class="mt-2 mb-6">
    {{-- {{ $section }} --}}
    @foreach ($course->sections as $item)
        <article class="card mb-6">
            <div class="card-body bg-gray-100">
                @if ($section->id == $item->id)
                    <form wire:submit.prevent='update'>
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="text-sm">Editando section - <span class="italic"> al finalizar
                                    presiona: <span class="font-bold">Enter</span></span></label>
                            <input type="text" id="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                wire:model="section.name">
                            <strong class="text-red-600 text-xs">{{ $errors->first('section.name') }}</strong>
                        </div>
                    </form>
                @else
                    <header class="flex justify-between item-center">
                        <h1 class="cursor-pointer"><strong>Sección: {{ $item->name }}</strong></h1>
                        <div>
                            <i class="fas fa-edit cursor-pointer text-blue-500"
                                wire:click="edit({{ $item }})"></i>
                            <i class="fas fa-eraser cursor-pointer text-red-500"
                                wire:click="destroy({{ $item }})"></i>
                        </div>
                    </header>
                @endif
            </div>
        </article>
    @endforeach
    {{-- Para agregar nueva sección --}}
    <div x-data="{ open: false }">
        <a x-show="!open" x-on:click="open=true" class="flex items-center cursor-pointer">
            <i class="far fa-plus-square text-2xl text-red-500 mr-2"></i>
            Agregar nueva sección
        </a>
        <article class="card" x-show="open">
            <div class="card-body bg-gray-100">
                <h1 class="text-xl font-bold mb-4">Añadiendo nueva sección</h1>
                <div class="mb-4">
                    <input type="text" wire:model="name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 w-full"
                        placeholder="Escriba nombre de sección">
                    <strong class="text-red-600 text-xs">{{ $errors->first('name') }}</strong>
                </div>
                <div class="flex justify-end">
                    <button
                        class="px-4 py-2 text-sm text-white duration-100 bg-red-600 rounded-md shadow-md focus:shadow-none ring-offset-2 ring-red-600 focus:ring-2"
                        x-on:click="open=false">Cancelar</button>
                    <button wire:click="store"
                        class="px-4 py-2 text-sm text-white duration-100 bg-indigo-600 rounded-md shadow-md focus:shadow-none ring-offset-2 ring-indigo-600 focus:ring-2 ml-2">Guardar</button>
                </div>
            </div>
        </article>

    </div>
</div>
