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
        <div class="container py-8 grid grid-cols-5">
            <aside>
                <h1 class="font-bold text-lg mb-4">Edición del curso</h1>
                <ul>
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
                        class="leading-7 mb-1 border-l-4 @routeIs('instructor.courses.edit', $course) border-indigo-400
@else
border-transparent @endif pl-2">
                        <a href="">Metas del curso</a>
                    </li>
                    <li
                        class="leading-7 mb-1 border-l-4 @routeIs('instructor.courses.edit', $course) border-indigo-400
@else
border-transparent @endif pl-2">
                        <a href="">Estudiantes</a>
                    </li>
                </ul>
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
