<section class="mt-4">
    <div class="card">
        <div class="card-body">
            <p class="text-gray-800 text-xl mb-4">{{ $course->reviews->count() }} Valoraciones</p>
            @can('enrolled', $course)
                <article>
                    {{-- Para verificar que el usuario ya hizo una valoración del curso --}}
                    @can('valued', $course)
                        <textarea wire:model="comment"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            rows="3" placeholder="Ingrese una reseña del curso"></textarea>
                        @error('comment')
                            <span class="text-red-500 font-bold text-sm">{{ $message }}</span>
                        @enderror
                        <div class="flex my-2 items-center justify-between">
                            <button wire:click="store"
                                class="px-4 py-2 text-sm text-white duration-100 bg-blue-600 rounded-md shadow-md focus:shadow-none ring-offset-2 ring-blue-600 focus:ring-2 ">Guardar</button>
                            <ul class="flex text-lg">
                                <li class="mr-1 cursor-pointer " wire:click="$set('rating',1)">
                                    <i
                                        class="fas fa-star hover:text-yellow-300 text-{{ $rating >= 1 ? 'yellow' : 'gray' }}-300"></i>
                                </li>
                                <li class="mr-1 cursor-pointer" wire:click="$set('rating',2)">
                                    <i
                                        class="fas fa-star hover:text-yellow-300 text-{{ $rating >= 2 ? 'yellow' : 'gray' }}-300"></i>
                                </li>
                                <li class="mr-1 cursor-pointer" wire:click="$set('rating',3)">
                                    <i
                                        class="fas fa-star hover:text-yellow-300 text-{{ $rating >= 3 ? 'yellow' : 'gray' }}-300"></i>
                                </li>
                                <li class="mr-1 cursor-pointer" wire:click="$set('rating',4)">
                                    <i
                                        class="fas fa-star hover:text-yellow-300 text-{{ $rating >= 4 ? 'yellow' : 'gray' }}-300"></i>
                                </li>
                                <li class="mr-1 cursor-pointer" wire:click="$set('rating',5)">
                                    <i
                                        class="fas fa-star hover:text-yellow-300 text-{{ $rating == 5 ? 'yellow' : 'gray' }}-300"></i>
                                </li>
                            </ul>
                        </div>
                    @else
                        <div class="p-4 mb-4 text-sm text-blue-700 bg-blue-100 rounded-lg dark:bg-blue-200 dark:text-blue-800"
                            role="alert">
                            <span class="font-medium">! Bien..!</span> Ud ya realizó una calificación del curso.
                        </div>
                    @endcan
                    <hr class="mt-2 mb-6">

                </article>
            @endcan

            @forelse ($course->reviews as $review)
                <article class="flex mb-4 text-gray-800">
                    <figure class="mr-5">
                        <img src="{{ $review->user->profile_photo_url }}" alt=""
                            class="h-12 w-12 object-cover rounded-full shadow-lg">
                    </figure>
                    <div class="card flex-1">
                        <div class="card-body bg-gray-100">
                            <p><b>{{ $review->user->name }}</b>
                                <i class="fas fa-star text-yellow-300"> </i>{{ $review->rating }}
                            </p>
                            <p class="text-sm">{{ $review->comment }}</p>
                        </div>
                    </div>
                </article>
            @empty
                Sin reviews
            @endforelse
        </div>
    </div>
</section>
