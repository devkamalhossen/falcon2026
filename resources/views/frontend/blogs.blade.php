@extends('frontend.master')
@section('page_title', 'Our Blogs')
@section('meta_data')
    <meta name="title" content="Blog - Falcon Solution Blog" />
    <meta name="description"
        content="Read expert articles, industry insights, technical guides, and updates from Falcon Solution Limited on industrial flooring, epoxy coatings, waterproofing systems, and construction chemical solutions." />
    <meta name="keywords"
        content="Falcon Solution blog, construction chemicals blog, industrial flooring articles, epoxy flooring guide, waterproofing tips, concrete repair, protective coatings, construction industry news" />
@endsection
@section('main')

    {{-- blog top section --}}
    <div class="lg:py-15 py-10 bg-primary/5">
        <div class="container">
            <div class="mb-10">
                <h1 class="lg:text-[60px] text-[48px] font-bold leading-[150%]">Blog</h1>
                <p class="text-2xl font-semibold">Latest articles and insights</p>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                @foreach ($data['blogs']->take(3) as $blog)
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
                            <h2 class="text-xl [margin-block:15px] font-bold text-dark">
                                {{ $blog->title }}
                            </h2>
                            @php
                                $day = \Carbon\Carbon::parse($blog->created_at)->format('l');
                                $date = \Carbon\Carbon::parse($blog->created_at)->format('Y-M-d');
                            @endphp
                            <p class="text">{{ $day }}, {{ $date }}</p>

                        </article>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
    {{-- Blog Middle --}}
    <div class="lg:py-15 py-10 bg-white">
        <div class="container">
            <div class="grid grid-cols-1 lg:grid-cols-6 gap-8">
                <div class="lg:col-span-4">
                    @foreach ($data['blogs'] as $blog)
                        <a href="{{ route('single.blog', $blog->slug) }}" class="group cursor-pointer" data-aos="fade-up">
                            <article class="flex flex-col lg:flex-row items-start gap-6 mb-8">
                                <div class="w-full lg:w-1/5">
                                    <div class="relative overflow-hidden aspect-[507/290]">
                                        <img loading="lazy" src="{{ asset($blog->image) }}" alt="{{ $blog->title }}"
                                            class="w-full h-full object-cover transition-all duration-300 group-hover:scale-105" />
                                        <div
                                            class="bg-[#3c3c3b4d] absolute inset-0 group-hover:bg-[#3c3c3b66] transition-all duration-300">
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full lg:w-4/5">
                                    <h2 class="text-xl mb-2 font-bold text-dark">
                                        {{ $blog->title }}
                                    </h2>

                                    <div class="flex items-center gap-2 flex-wrap">
                                        <div
                                            class="bg-white text-primary border rounded-full border-dark text-sm font-medium p-[3px_10px] inline-block">
                                            {{ $blog?->category?->name }}
                                        </div>
                                        @php
                                            $day = \Carbon\Carbon::parse($blog->created_at)->format('l');
                                            $date = \Carbon\Carbon::parse($blog->created_at)->format('d m Y');
                                        @endphp

                                        <p>{{ $day }}, {{ $date }}</p>
                                    </div>
                                    <div class="py-3">
                                        <p class="font-normal text-base text-black text-justify">
                                            {{ \Illuminate\Support\Str::limit($blog->blog_excerpt, 200) }}
                                        </p>
                                    </div>

                                </div>

                            </article>
                        </a>
                    @endforeach
                </div>

                <div class="lg:col-span-2">
                    <h3 class="mb-5 text-2xl font-semibold">Most Popular </h3>

                    @foreach ($data['mostPopulars'] as $index => $blog)
                        <a href="{{ route('single.blog', $blog->slug) }}" class="group  cursor-pointer" data-aos="fade-up">
                            <article class="border-b border-gray-200 py-4"
                                style="translate: none; rotate: none; scale: none; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">
                                @if ($index == 0)
                                    <div class="relative">
                                        <div class="relative overflow-hidden z-[1] aspect-[507/285]">
                                            <img loading="lazy" src="{{ asset($blog->image) }}" alt="{{ $blog->title }}"
                                                class="size-full group-hover:scale-105 duration-300 transition-all" />
                                            <div
                                                class="bg-[#3c3c3b4d] h-full left-0 top-0 w-full absolute group-hover:[transition:all_.3s_ease-in-out] group-hover:bg-[#3c3c3b66]">
                                            </div>
                                        </div>

                                    </div>
                                @endif
                                <div
                                    class="bg-white text-primary border rounded-full border-dark text-sm font-medium leading-[100%] p-[5px_10px] inline-block mt-4">
                                    {{ $blog?->category?->name }}</div>
                                <h2 class="text-xl [margin-block:10px] font-bold text-dark">
                                    {{ $blog->title }}
                                </h2>
                                @php
                                    $day = \Carbon\Carbon::parse($blog->created_at)->format('l');
                                    $date = \Carbon\Carbon::parse($blog->created_at)->format('Y-d-M');
                                @endphp
                                <p class="text">{{ $day }}, {{ $date }}</p>

                            </article>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    {{-- Blog Bottom --}}
    <div class="lg:py-15 py-10 bg-gray-100">
        <div class="container">
            @foreach ($data['categoryWiseBlogs'] as $category)
                @if ($category?->blogs->count() > 0)
                    <div class="mb-12">
                        <div class="flex items-center justify-between mb-5">
                            <h3 class="text-2xl font-semibold">{{ $category->name }} </h3>
                            <a href="{{ route('category.blog', $category->slug) }}"
                                class="text-primary text-lg font-semibold">View All</a>
                        </div>
                        <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
                            @foreach ($category?->blogs as $blog)
                                <a href="{{ route('single.blog', $blog->slug) }}" class="group  cursor-pointer"
                                    data-aos="fade-up">
                                    <article
                                        style="translate: none; rotate: none; scale: none; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">
                                        <div class="relative">
                                            <div class="relative overflow-hidden z-[1] aspect-[507/285]">
                                                <img loading="lazy" src="{{ asset($blog->image) }}"
                                                    alt="{{ $blog->title }}"
                                                    class="size-full group-hover:scale-105 duration-300 transition-all" />
                                                <div
                                                    class="bg-[#3c3c3b4d] h-full left-0 top-0 w-full absolute group-hover:[transition:all_.3s_ease-in-out] group-hover:bg-[#3c3c3b66]">
                                                </div>
                                            </div>

                                        </div>
                                        <div
                                            class="bg-white text-primary border rounded-full border-dark text-sm font-medium leading-[100%] p-[5px_10px] inline-block mt-4">
                                            {{ $blog?->category?->name }}</div>
                                        <h2 class="text-xl [margin-block:15px] font-bold text-dark">
                                            {{ $blog->title }}
                                        </h2>
                                        @php
                                            $day = \Carbon\Carbon::parse($blog->created_at)->format('l');
                                            $date = \Carbon\Carbon::parse($blog->created_at)->format('Y-d-M');
                                        @endphp
                                        <p class="text">{{ $day }}, {{ $date }}</p>

                                    </article>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection
