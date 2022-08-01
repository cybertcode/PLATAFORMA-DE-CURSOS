<div class="w-full sm:px-6">
    <div class="px-4 md:px-10 py-2 md:py-7 bg-gray-100 dark:bg-gray-700 rounded-tl-lg rounded-tr-lg">
        <div class="sm:flex items-center justify-between">
            <p tabindex="0"
                class="focus:outline-none text-base sm:text-lg md:text-xl lg:text-2xl font-bold leading-normal text-gray-800 dark:text-white ">
                Cursos</p>
            <div class="flex justify-start items-center py-2 relative">
                <input wire:model='search'
                    class="text-sm leading-none text-left text-gray-600 px-4 py-3 w-full border rounded border-gray-300 outline-none h-9"
                    type="text" placeholder="Buscar curso" />
                <button
                    class="focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600 w-full inline-flex sm:ml-3 mt-4 sm:mt-0 items-start justify-start px-6 py-3 bg-indigo-700 hover:bg-indigo-600 focus:outline-none rounded h-9">
                    <a href="{{ route('instructor.courses.create') }}"
                        class="text-sm font-medium leading-none text-white">Nuevo curso</a>
                </button>
            </div>
        </div>
    </div>
    <div class="bg-white dark:bg-gray-800  shadow px-4 md:px-10 pt-4 md:pt-7 pb-5 overflow-y-auto ">
        {{ $slot }}
    </div>
</div>
