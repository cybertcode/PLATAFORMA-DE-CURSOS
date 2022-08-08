<x-app-layout>
    <div class="container py-8">
        <div class="card">
            <div class="card-body">
                <h1 class="text-2xl font-bold">CREAR NUEVO CURSO</h1>
                <hr class="mt-2 mb-6">
                {!! Form::open([
                    'method' => 'POST',
                    'route' => 'instructor.courses.store',
                    'class' => '',
                    'files' => true,
                    'autocomplete' => 'off',
                ]) !!}
                {!! Form::hidden('user_id', auth()->user()->id) !!}
                @include('frontend.pages.instructor.course.partials.form')
                <div class="flex justify-end">
                    {!! Form::submit('Guardar curso', [
                        'class' =>
                            'px-4 py-2 text-sm text-white duration-150 bg-indigo-600 rounded-md hover:bg-indigo-700 active:shadow-lg cursor-pointer',
                    ]) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    {{-- Para scripts --}}
    <x-slot name="js">
        {{-- ckeditor cdn --}}
        <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
        <script src="{{ asset('frontend/js/instructor/course/form.js') }}"></script>
    </x-slot>
</x-app-layout>
