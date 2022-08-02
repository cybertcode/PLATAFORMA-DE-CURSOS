<div>
    @forelse($section->lessons as $item)
        <article class="card mt-4">
            <div class="card-body">
                @if ($lesson->id == $item->id)
                    {{-- Es importante que abajo sea form porque div no renderiza bien livewire --}}
                    <form wire:submit.prevent="update">
                        <div class="flex items-center">
                            <label class="w-32" for="lesson.name">Nombre: </label>
                            <input type="text" wire:model="lesson.name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 w-full"
                                placeholder="Escriba nombre de sección" id="lesson.name">
                        </div>
                        <strong class="text-red-600 text-xs">{{ $errors->first('lesson.name') }}</strong>
                        <div class="flex items-center mt-2">
                            <label for="lesson.platform_id" class="w-32">Plataform: </label>
                            <select wire:model="lesson.platform_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 w-full">
                                @foreach ($platforms as $platform)
                                    <option value="{{ $platform->id }}">{{ $platform->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <strong class="text-red-600 text-xs">{{ $errors->first('lesson.platform_id') }}</strong>
                        <div class="flex items-center mt-2">
                            <label class="w-32" for="lesson.url">URL: </label>
                            <input type="text" wire:model="lesson.url"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 w-full"
                                placeholder="Escriba nombre de sección" id="lesson.url">
                        </div>
                        <strong class="text-red-600 text-xs">{{ $errors->first('lesson.url') }}</strong>
                        <div class="mt-2 flex justify-end">
                            <button wire:click="cancel" type="button"
                                class="px-4 py-2 text-sm text-white duration-100 bg-red-600 rounded-md shadow-md focus:shadow-none ring-offset-2 ring-red-600 focus:ring-2 ml-2">Cancelar</button>
                            <button type="submit"
                                class="px-4 py-2 text-sm text-white duration-100 bg-blue-600 rounded-md shadow-md focus:shadow-none ring-offset-2 ring-blue-600 focus:ring-2 ml-2">Actualizar</button>
                        </div>
                    </form>
                @else
                    <header>
                        <h1 class="far fa-play-circle text-blue-500 mr-1"> Lección: {{ $item->name }}</h1>
                    </header>
                    <div>
                        <hr class="my-2">
                        <p class="text-sm">Plataforma: {{ $item->platform->name }}</p>
                        <p class="text-sm">Enlace: <a href="{{ $item->url }}" class="text-blue-600"
                                target="_blank">{{ $item->url }}</a></p>
                        <div class="mt-2">
                            <button
                                class="px-4 py-2 text-sm text-white duration-100 bg-blue-600 rounded-md shadow-md focus:shadow-none ring-offset-2 ring-blue-600 focus:ring-2"
                                wire:click="edit({{ $item }})">Editar</button>
                            <button wire:click="destroy({{ $item }})"
                                class="px-4 py-2 text-sm text-white duration-100 bg-red-600 rounded-md shadow-md focus:shadow-none ring-offset-2 ring-red-600 focus:ring-2 ml-2">Eliminar</button>
                        </div>
                    </div>
                @endif
            </div>
        </article>
    @empty
        sin lecciones
    @endforelse
    <div x-data="{ open: false }" class="mt-2">
        <a x-show="!open" x-on:click="open=true" class="flex items-center cursor-pointer">
            <i class="far fa-plus-square text-2xl text-red-500 mr-2"></i>
            Agregar nueva lección
        </a>
        <article class="card" x-show="open">
            <div class="card-body ">
                <h1 class="text-xl font-bold mb-4">Añadiendo nueva lección</h1>
                <div class="mb-4">
                    <div class="flex items-center">
                        <label class="w-32" for="name">Nombre: </label>
                        <input type="text" wire:model="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 w-full"
                            placeholder="Escriba nombre de sección" id="name">
                    </div>
                    <strong class="text-red-600 text-xs">{{ $errors->first('name') }}</strong>
                    <div class="flex items-center mt-2">
                        <label for="platform_id" class="w-32">Plataform: </label>
                        <select wire:model="platform_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 w-full">
                            @foreach ($platforms as $platform)
                                <option value="{{ $platform->id }}">{{ $platform->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    {{ $platform_id }}
                    <strong class="text-red-600 text-xs">{{ $errors->first('platform_id') }}</strong>
                    <div class="flex items-center mt-2">
                        <label class="w-32" for="url">URL: </label>
                        <input type="text" wire:model="url"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 w-full"
                            placeholder="Escriba nombre de sección" id="url">
                    </div>
                    <strong class="text-red-600 text-xs">{{ $errors->first('url') }}</strong>
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
