<x-instructor-layout>
    <x-slot name="course">
        {{ $course->slug }}
    </x-slot>
    {{-- Incluimos los tres componentes livewire --}}
    <div>
        @livewire('frontend.instructor.courses-goals', ['course' => $course], key('courses-goals' . $course->id))
    </div>
    <div class="my-8">
        @livewire('frontend.instructor.courses-requirements', ['course' => $course], key('courses-requirements' . $course->id))
    </div>
    <div>
        @livewire('frontend.instructor.courses-audiences', ['course' => $course], key('courses-audiences' . $course->id))
    </div>
</x-instructor-layout>
