<div>
    <div class="bg-gray-200 py-4 mb-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex">
            <button class="bg-white shadow h-12 px-4 rounded-lg text-gray-700 mr-4 focus:outline-none"
                wire:click="resetFilters">
                <i class="fas fa-home"></i> Todos los cursos
            </button>
            <!-- component categorías -->
            {{-- Trabajamos con alpinejs --}}
            <div class="flex justify-center" x-data="{ open: false }">
                <div class="relative inline-block ">
                    <!-- Dropdown toggle button -->
                    <button
                        class="relative z-10 h-12 flex items-center p-2 text-sm text-gray-600 bg-white border border-transparent rounded-md focus:border-blue-500 focus:ring-opacity-40 dark:focus:ring-opacity-40 focus:ring-blue-300 dark:focus:ring-blue-400 focus:ring dark:text-white dark:bg-gray-800 focus:outline-none"
                        x-on:click="open=!open">
                        <i class="fas fa-tags"></i>
                        <span class="mx-1">Categorías</span>
                        <svg class="w-5 h-5 mx-1" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12 15.713L18.01 9.70299L16.597 8.28799L12 12.888L7.40399 8.28799L5.98999 9.70199L12 15.713Z"
                                fill="currentColor"></path>
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div class="absolute right-0 z-20 w-56 py-2 mt-2 overflow-hidden bg-white rounded-md shadow-xl dark:bg-gray-800"
                        x-show="open" x-on:click.away="open=false">
                        @foreach ($categories as $category)
                            {{-- el primero variable del componente será remplazada por el id de la categoría --}}
                            <a class="block px-4 py-3 text-sm text-gray-600 capitalize transition-colors duration-200 transform dark:text-gray-300 hover:bg-blue-400 dark:hover:bg-gray-700 dark:hover:text-white cursor-pointer"
                                wire:click="$set('category_id',{{ $category->id }})" x-on:click="open = false">
                                {{ $category->name }}
                            </a>
                            <hr class="border-gray-200 dark:border-gray-700 ">
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- component niveles -->
            {{-- Trabajamos con alpinejs --}}
            <div class="flex justify-center ml-4" x-data="{ open: false }">
                <div class="relative inline-block ">
                    <!-- Dropdown toggle button -->
                    <button
                        class="relative z-10 h-12 flex items-center p-2 text-sm text-gray-600 bg-white border border-transparent rounded-md focus:border-blue-500 focus:ring-opacity-40 dark:focus:ring-opacity-40 focus:ring-blue-300 dark:focus:ring-blue-400 focus:ring dark:text-white dark:bg-gray-800 focus:outline-none"
                        x-on:click="open=!open">
                        <i class="fas fa-layer-group"></i>
                        <span class="mx-1">Niveles</span>
                        <svg class="w-5 h-5 mx-1" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12 15.713L18.01 9.70299L16.597 8.28799L12 12.888L7.40399 8.28799L5.98999 9.70199L12 15.713Z"
                                fill="currentColor"></path>
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div class="absolute right-0 z-20 w-56 py-2 mt-2 overflow-hidden bg-white rounded-md shadow-xl dark:bg-gray-800"
                        x-show="open" x-on:click.away="open=false">
                        @foreach ($levels as $level)
                            <a class="block px-4 py-3 text-sm text-gray-600 capitalize transition-colors duration-200 transform dark:text-gray-300 hover:bg-blue-400 dark:hover:bg-gray-700 dark:hover:text-white cursor-pointer"
                                wire:click="$set('level_id',{{ $level->id }})" x-on:click="open = false">
                                {{ $level->name }}
                            </a>
                            <hr class="border-gray-200 dark:border-gray-700 ">
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- CURSOS --}}
    <div
        class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-y-6 gap-x-8 ">
        @foreach ($courses as $course)
            <x-frontend.course-card :course="$course" />
        @endforeach
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 my-2">
        {{ $courses->links() }}
    </div>
</div>
