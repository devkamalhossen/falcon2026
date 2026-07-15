@foreach ($blogs as $blog)
    <a href="{{ route('single.blog', $blog->slug) }}" class="group  cursor-pointer" data-aos="fade-up">
        <article
            style="translate: none; rotate: none; scale: none; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">
            <div class="relative">
                <div class="relative overflow-hidden z-[1] aspect-[507/285]">
                    <img loading="lazy" src="{{ asset($blog->image) }}" alt="{{ $blog->title }}"
                        class="size-full group-hover:scale-105 duration-300 transition-all" />
                    <div
                        class="bg-[#3c3c3b4d] h-full left-0 top-0 w-full absolute group-hover:[transition:all_.3s_ease-in-out] group-hover:bg-[#3c3c3b66]">
                    </div>
                </div>

            </div>
            <div
                class="bg-white text-primary border rounded-full border-dark text-sm font-medium leading-[100%] p-[5px_10px] inline-block mt-4">
                {{ $blog?->category?->name }}</div>
            <h1 class="text-xl [margin-block:15px] font-bold text-dark">
                {{ $blog->title }}
            </h1>
            @php
                $day = \Carbon\Carbon::parse($blog->created_at)->format('l');
                $date = \Carbon\Carbon::parse($blog->created_at)->format('Y-d-m');
            @endphp
            <p class="text">{{ $day }}, {{ $date }}</p>

        </article>
    </a>
@endforeach
