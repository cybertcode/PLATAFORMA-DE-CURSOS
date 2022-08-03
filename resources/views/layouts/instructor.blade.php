<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    {{-- awesome-fonts --}}
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">


    <!-- Styles -->
    @livewireStyles

    <!-- Scripts -->
    {{-- Aquí incluye los archivos compilados con vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <x-jet-banner />

    <div class="min-h-screen bg-gray-100">
        @livewire('navigation-menu')

        <!-- Page Content -->
        {{-- Incluimos de course edit --}}
        <div class="container py-8 grid grid-cols-5 gap-6">
            <aside>
                <h1 class="font-bold text-lg mb-4">Edición del curso</h1>
                <ul class="text-sm text-gray-600 mb-4">
                    <li
                        class="leading-7 mb-1 border-l-4 @routeIs('instructor.courses.edit', $course) border-indigo-400
@else
border-transparent @endif pl-2">
                        <a href="{{ route('instructor.courses.edit', $course) }}">Información del
                            curso</a>
                    </li>
                    <li
                        class="leading-7 mb-1 border-l-4 @routeIs('instructor.courses.curriculum', $course) border-indigo-400
@else
border-transparent @endif pl-2">
                        <a href="{{ route('instructor.courses.curriculum', $course) }}">Lecciones del
                            curso</a>
                    </li>
                    <li
                        class="leading-7 mb-1 border-l-4 @routeIs('instructor.courses.goals', $course) border-indigo-400
@else
border-transparent @endif pl-2">
                        <a href="{{ route('instructor.courses.goals', $course) }}">Metas del curso</a>
                    </li>
                    <li
                        class="leading-7 mb-1 border-l-4 @routeIs('instructor.courses.students', $course) border-indigo-400
@else
border-transparent @endif pl-2">
                        <a href="{{ route('instructor.courses.students', $course) }}">Estudiantes</a>
                    </li>
                </ul>
                {{-- Para boton de verificación --}}
                @switch($course->status)
                    @case(1)
                        <form action="{{ route('instructor.courses.status', $course) }}" method="post">
                            @csrf
                            {!! Form::submit('Solicitar revisión', [
                                'class' =>
                                    'px-4 py-2 text-sm text-white duration-100 bg-red-600 rounded-md shadow-md focus:shadow-none ring-offset-2 ring-red-600 focus:ring-2 ml-2 hover:bg-red-700',
                            ]) !!}
                        </form>
                    @break

                    @case(2)
                        <div class="card">
                            <div class="card-body">
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Curso
                                    en revisión</span>
                            </div>
                        </div>
                    @break

                    @case(3)
                        <div class="card">
                            <div class="card-body">
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Curso
                                    aprobado</span>
                            </div>
                        </div>
                    @break

                    @default
                @endswitch

            </aside>
            <div class="col-span-4 card">
                <main class="card-body text-gray-600">
                    {{-- agregamos del edit --}}
                    {{ $slot }}
                </main>
            </div>
        </div>
    </div>

    @stack('modals')

    @livewireScripts
    {{-- Componente con nombre de la vista edit --}}
    {{-- verificamos si existe la variable $js --}}
    @isset($js)
        {{ $js }}
    @endisset
</body>

</html>
