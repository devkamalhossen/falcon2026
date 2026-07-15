@if ($galleryCategories->count() > 0)
    @foreach ($galleryCategories as $category)
        @if ($category->galleries->count() > 0)
            <div class="gallery-category-block">
                <span class="rounded-xl p-3 font-semibold bg-primary text-white">
                    {{ $category->name }}
                </span>
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-10 md:gap-12 lg:gap-14 mt-10 mb-10">
                    @foreach ($category->galleries as $row)
                        <a data-fslightbox="gallery"
                            href="{{ $row->type == 1 ? asset($row->image) : 'https://www.youtube.com/watch?v=' . $row->video_id }}"
                            class="gallery-item relative block overflow-hidden aspect-video">

                            <img loading="lazy" src="{{ $row->type == 1 ? asset($row->image) : 'https://img.youtube.com/vi/' . $row->video_id . '/hqdefault.jpg' }}"
                                alt="Falcon Solution Limited"
                                class="size-full object-cover hover:scale-105 duration-300 rounded-xl" />

                            @if ($row->type == 2)
                                <div
                                    class="absolute pointer-events-none top-1/2 left-1/2 
                                                -translate-x-1/2 -translate-y-1/2 w-12 h-9 
                                                flex items-center justify-center text-2xl 
                                                bg-red-500 text-white rounded-t-lg rounded-b-lg">
                                    {!! config('icon.play') !!}
                                </div>
                            @endif
                        </a>
                    @endforeach
                </div>
            </div>
        @endif
    @endforeach
@endif
