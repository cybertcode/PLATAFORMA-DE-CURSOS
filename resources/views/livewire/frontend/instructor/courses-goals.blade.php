<section>
    <h1 class="text-2xl font-bold">METAS DEL CURSO</h1>
    <hr class="mt-2 mb-6">
    @forelse($course->goals as $item)
        <article class="card mb-4">
            <div class="card-body bg-gray-100">
                @if ($goal->id == $item->id)
                    <form wire:submit.prevent='update'>
                        <label for="goal.name" class="text-sm">Editando meta - <span class="italic"> al finalizar
                                presiona: <span class="font-bold">Enter</span></span></label>
                        <input wire:model="goal.name" type="text"
                            class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            id="goal.name" placeholder="Escriba una meta">
                    </form>
                    <strong class="text-red-600 text-xs">{{ $errors->first('goal.name') }}</strong>
                @else
                    <header class="flex justify-between">
                        <h1 class="cursor-pointer">{{ $item->name }}</h1>
                        <div>
                            <i wire:click='edit({{ $item }})'
                                class="fas fa-edit text-blue-500 cursor-pointer"></i>
                            <i wire:click="destroy({{ $item }})"
                                class="fas fa-trash text-red-500 cursor-pointer "></i>
                        </div>
                    </header>
                @endif
            </div>

        </article>
    @empty
        Sin metas
    @endforelse
    {{-- Para agregar nueva meta --}}
    <div x-data="{ open: false }">
        <a x-show="!open" x-on:click="open=true" class="flex items-center cursor-pointer">
            <i class="far fa-plus-square text-2xl text-red-500 mr-2"></i>
            Agregar nueva meta
        </a>
        <article class="card" x-show="open">
            <div class="card-body bg-gray-100">
                <h1 class="text-xl font-bold mb-4">Añadiendo nueva meta</h1>
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

</section>
