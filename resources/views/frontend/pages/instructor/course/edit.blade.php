<x-instructor-layout>
    {{-- Pasamos el slug a la vista --}}
    <x-slot name="course">
        {{ $course->slug }}
    </x-slot>
    <h1 class="text-2xl font-bold">INFORMACIÓN DEL CURSO</h1>
    <hr class="mt-2 mb-6">
    {!! Form::model($course, [
        'route' => ['instructor.courses.update', $course],
        'method' => 'PUT',
        'class' => '',
        'files' => true,
    ]) !!}
    @include('frontend.pages.instructor.course.partials.form')
    <div class="flex justify-end">
        {!! Form::submit('Actualizar curso', [
            'class' =>
                'px-4 py-2 text-sm text-white duration-150 bg-indigo-600 rounded-md hover:bg-indigo-700 active:shadow-lg cursor-pointer',
        ]) !!}
    </div>
    {!! Form::close() !!}
    <x-slot name="js">
        {{-- ckeditor cdn --}}
        <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
        <script src="{{ asset('frontend/js/instructor/course/form.js') }}"></script>
    </x-slot>
</x-instructor-layout>
