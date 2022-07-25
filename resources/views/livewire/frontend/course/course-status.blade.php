<div class="mt-8">
    <div class="container grid grid-cols-3 gap-8">
        <div class="col-span-2">
            {!! $current->iframe !!}
            {{ $current->name }}
            <p>INDICE: {{ $this->index }}</p>
            <p>PREVIOUS: @if ($this->previous)
                    {{ $this->previous->id }}
                @endif
            </p>
            <p>NEXT: @if ($this->next)
                    {{ $this->next->id }}
                @endif
            </p>
        </div>
        <div class="card">
            <div class="card-body">
                <h1>{{ $course->title }}</h1>
                <div class="flex items-center ">
                    <figure>
                        <img src="{{ $course->teacher->profile_photo_url }}" alt="">
                    </figure>
                    <div class="ml-2">
                        <p>{{ $course->teacher->name }}</p>
                        <a class="text-blue-500" href="">{{ '@' . Str::slug($course->teacher->name, '') }}</a>
                    </div>
                </div>
                <ul>
                    @foreach ($course->sections as $section)
                        <li>
                            <a class="font-bold">{{ $section->name }}</a>
                            <ul>
                                @foreach ($section->lessons as $lesson)
                                    <li>
                                        <a class="cursor-pointer"
                                            wire:click="changeLesson({{ $lesson }})">{{ $lesson->id }}
                                            @if ($lesson->completed)
                                                Completado
                                            @else
                                                en curso
                                            @endif
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
