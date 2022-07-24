<div>
    {{-- Especificamos el atributo de componente que se pasa al componente --}}
    @props(['course'])
    <article class="bg-white shadow-lg rounded overflow-hidden ">
        <img class="h-36 w-full object-cover" src="{{ Storage::url($course->image->url) }}" alt="">
        <div class="px-6 py-4">
            <h1 class="text-xl text-gray-700 mb-2 leading-6">{{ Str::limit($course->title, 40) }}</h1>
            <p class="text-gray-500 text-sm mb-2">Prof: {{ $course->teacher->name }}</p>
            <div class="flex">
                <ul class="flex text-sm">
                    <li class="mr-1">
                        <i class="fas fa-star text-{{ $course->rating >= 1 ? 'yellow' : 'gray' }}-400"></i>
                    </li>
                    <li class="mr-1">
                        <i class="fas fa-star text-{{ $course->rating >= 2 ? 'yellow' : 'gray' }}-400"></i>
                    </li>
                    <li class="mr-1">
                        <i class="fas fa-star text-{{ $course->rating >= 3 ? 'yellow' : 'gray' }}-400"></i>
                    </li>
                    <li class="mr-1">
                        <i class="fas fa-star text-{{ $course->rating >= 4 ? 'yellow' : 'gray' }}-400"></i>
                    </li>
                    <li class="mr-1">
                        <i class="fas fa-star text-{{ $course->rating == 5 ? 'yellow' : 'gray' }}-400"></i>
                    </li>
                </ul>
                <p class="text-sm text-gray-500 ml-auto">
                    <i class="fas fa-users"></i>
                    ({{ $course->students_count }})
                </p>
            </div>
            <a href="{{ route('courses.show', $course) }}"
                class=" text-center w-full mt-4 bg-blue-400 px-8 py-2 font-semibold  hover:bg-blue-500 text-white inline-flex items-center space-x-2 rounded">
                <i class="fas fa-info-circle w-5 h-5 fill-current"></i>
                <span>Mas information</span>
            </a>
        </div>
    </article>

</div>
