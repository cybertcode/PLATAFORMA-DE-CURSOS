<div>
    <form class=" flex relative" autocomplete="off">
        <input class="w-full rounded-l-lg p-3 border-t mr-0 border-b border-l text-gray-800 border-gray-200 bg-white"
            placeholder="Buscar" wire:model="search" />
        <button type="submit"
            class="px-8 rounded-r-lg bg-blue-500 font-bold p-3 uppercase  hover:bg-blue-400 text-white border-blue-500 border-t border-b border-r">Buscar
        </button>
        @if ($search)
            <ul class="absolute left-0 z-50 w-full bg-white mt-14 rounded-lg overflow-hidden ">
                @forelse ($this->results as $result)
                    <li class="leading-10 px-5 text-sm cursor-pointer hover:bg-gray-300">
                        <a href="{{ route('courses.show', $result) }}">{{ $result->title }}</a>
                    </li>
                @empty
                    <li class="leading-10 px-5 text-sm  hover:bg-gray-300">
                        No hay ninguna coincidencia
                    </li>
                @endforelse
            </ul>
        @endif
    </form>
</div>
