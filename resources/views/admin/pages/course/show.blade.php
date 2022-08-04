<x-app-layout>
    <section class="bg-gray-700 py-12  mb-12 ">
        <div class="cantainer grid grid-cols-1 lg:grid-cols-2 gap-6 mx-7">
            <figure>
                @if ($course->image)
                    <img class="h-60 w-full object-cover object-center" src="{{ Storage::url($course->image->url) }}"
                        alt="">
                @else
                    <img class="h-60 w-full object-cover object-center"
                        src="https://images.pexels.com/photos/4498362/pexels-photo-4498362.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                        alt="">
                @endif
            </figure>
            <div class="text-white">
                <h1 class="text-4xl">{{ $course->title }}</h1>
                <h2 class="text-xl mb-3">{{ $course->subtitle }}</h2>
                <p class="mb-2"><i class="fas fa-chart-line"></i> Nivel: {{ $course->level->name }}</p>
                <p class="mb-2"><i class="fas fa-users"></i> Categoría: {{ $course->category->name }}</p>
                <p class="mb-2"><i class="fas fa-users"></i> Matriculado: {{ $course->students_count }}</p>
                <p class="mb-2"><i class="fas fa-star"></i> Calificación: {{ $course->rating }}</p>
            </div>
        </div>
    </section>
    <div class="cantainer grid grid-cols-1 lg:grid-cols-3 mx-7 gap-6">
        @if (session('info'))
            <div class="lg:col-span-3" x-data="{ open: true }" x-show="open">
                <div id="alert-2" class="flex p-4 mb-4 bg-red-100 rounded-lg dark:bg-red-200" role="alert">
                    <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5 text-red-700 dark:text-red-800"
                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Info</span>
                    <div class="ml-3 text-sm font-medium text-red-700 dark:text-red-800">
                        <span class="font-semibold hover:text-red-800 dark:hover:text-red-900">Error </span>
                        {{ session('info') }}

                        {{-- {{ session('info') }} <a href="{{ route('instructor.courses.edit', $course) }}"
                            class="font-semibold underline hover:text-red-800 dark:hover:text-red-900">solicitar completar el
                            curso</a>.! --}}

                    </div>
                    <button type="button"
                        class="ml-auto -mx-1.5 -my-1.5 bg-red-100 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8 dark:bg-red-200 dark:text-red-600 dark:hover:bg-red-300"
                        data-dismiss-target="#alert-2" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg x-on:click="open=false" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
            </div>
        @endif
        <div class="order-2 lg:col-span-2 lg:order-1">
            {{-- METAS --}}
            <section class="card mb-12">
                <div class="card-body">
                    <h1 class="font-bold text-2xl mb-2">Lo que aprenderás</h1>
                    <ul class="grid grid-cols-1 md:grid-cols-2  gap-x-6 gap-y-2">
                        @forelse ($course->goals as $goal)
                            <li class="text-gray-700 text-base">
                                <i class="fas fa-check text-gray-600 mr-2"></i>{{ $goal->name }}
                            </li>
                        @empty
                            <li class="text-gray-700 text-base">
                                <i class="far fa-times-circle  text-red-400 mr-2"></i> Este curso no tiene asignado
                                metas
                            </li>
                        @endforelse
                    </ul>
                </div>
            </section>
            {{-- Sección de Temario --}}
            <section>
                <h1 class="font-fold text-3xl mb-2">Temario</h1>
                @forelse ($course->sections as $section)
                    <article class="mb-4 shadow"
                        @if ($loop->first) x-data="{ open: true }"
                        @else
                        x-data="{ open: false }" @endif>
                        <header class="border border-gray-200 px-4 py-2 cursor-pointer bg-gray-200"
                            x-on:click="open=!open">
                            <h1 class="font-bold text-lg text-gray-600">{{ $section->name }}</h1>
                        </header>
                        <div class="bg-white py-2 px-4" x-show="open">
                            <ul class="grid grid-cols-1 gap-2">
                                @foreach ($section->lessons as $lesson)
                                    <li class="text-gray-700 text-base"><i
                                            class="fas fa-play-circle mr-2 text-gray-600"></i>{{ $lesson->name }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </article>
                @empty
                    <div class="card">
                        <div class="card-body">
                            <i class="far fa-times-circle  text-red-400 mr-2"></i> Este curso no tiene una sección
                            asignado
                        </div>
                    </div>
                @endforelse
            </section>
            {{-- Requisitos del curso --}}
            <section class="mb-8">
                <h1 class="font-bold text-3xl">Requisitos</h1>
                <ul class="list-disc list-inside">
                    @forelse ($course->requirements as $requirement)
                        <li class="text-gray-700 text-base">{{ $requirement->name }}</li>
                    @empty
                        <div class="card">
                            <div class="card-body">
                                <i class="far fa-times-circle  text-red-400 mr-2"></i> Este curso no tiene ningún
                                requerimiento
                            </div>
                        </div>
                    @endforelse
                </ul>
            </section>
            <section>
                <h1 class="font-bold text-3xl">Description</h1>
                <div class="text-gray-700 text">{!! $course->description !!}</div>
            </section>

        </div>
        <div class="order-1 lg:order-2">
            <section class="card mb-4">
                <div class="card-body">
                    <div class="flex items-center">
                        <img class="h-12 w-12 object-cover rounded-full shadow-lg"
                            src="{{ $course->teacher->profile_photo_url }}" alt="{{ $course->teacher->name }}">
                        <div class="ml-4">
                            <h1 class="font-bold text-gray-500 text-lg">Prof. {{ $course->teacher->name }}</h1>
                            <a class="text-blue-400 text-sm font-bold"
                                href="">{{ '@' . Str::slug($course->teacher->name), '' }}</a>
                        </div>
                    </div>
                    {{-- Aprobar curso --}}
                    <form action="{{ route('admin.courses.approved', $course) }}" method="post">
                        {{-- @method('post') --}}
                        @csrf
                        <button class="w-full mt-4  px-24 py-2 btn btn-primary" type="submit">Aprobar curso</button>
                    </form>
                    <a href="{{ route('admin.courses.observation',$course) }}" class="btn btn-danger px-24 w-full block text-center mt-4 py-2">Observar curso</a>

                </div>
            </section>
        </div>
    </div>

</x-app-layout>
