@extends('frontend.master')
@section('page_title', 'Our Projects')
@section('meta_data')
    <meta name="title" content="Our Projects - Falcon Solution Limited" />
    @if (request()->status == 'upcoming')
        <meta name="description"
            content="Explore upcoming projects by Falcon Solution Limited featuring innovative industrial flooring, epoxy coating, waterproofing, and advanced construction chemical solutions planned for various industries." />
    @elseif(request()->status == 'ongoing')
        <meta name="description"
            content="Discover ongoing projects of Falcon Solution Limited including industrial flooring, epoxy coatings, waterproofing systems, and high-performance construction chemical applications in progress." />
    @elseif(request()->status == 'completed')
        <meta name="description"
            content="Discover the completed projects of Falcon Solution Limited featuring industrial flooring, epoxy coating, waterproofing, construction chemical solutions, and successful engineering implementations across multiple industries." />
    @else
        <meta name="description"
            content="Discover the completed projects of Falcon Solution Limited featuring industrial flooring, epoxy coating, waterproofing, construction chemical solutions and more." />
    @endif
    @if (request()->status == 'upcoming')
        <meta name="keywords"
            content="upcoming projects, future construction projects, industrial flooring plans, epoxy flooring upcoming work, waterproofing projects pipeline, Falcon Solution upcoming works, construction chemical projects planning" />
    @elseif(request()->status == 'ongoing')
        <meta name="keywords"
            content="ongoing projects, running construction projects, industrial flooring installation, epoxy coating ongoing work, waterproofing active projects, construction chemical application in progress, Falcon Solution live projects" />
    @elseif(request()->status == 'completed')
        <meta name="keywords"
            content="completed projects, finished construction works, industrial flooring completed, epoxy flooring projects, waterproofing completed works, construction chemical success projects, Falcon Solution project portfolio" />
    @else
        <meta name="keywords"
            content="completed projects, finished construction works, industrial flooring completed, epoxy flooring projects, waterproofing completed works, construction chemical success projects, Falcon Solution project portfolio" />
    @endif
@endsection
@section('main')
    <section class="py-12 md:py-20 lg:py-24">
        <div class="container relative space-y-20">
            <h1 class="mb-0 text-4xl md:text-5xl lg:text-6xl xl:text-[96px] text-dark font-medium uppercase"
                data-aos="fade-up">
                Our Projects
            </h1>
            @if(request()->status == 'upcoming')
                <h2 class="text-lg">
                    Explore upcoming projects by Falcon Solution Limited featuring innovative industrial flooring, epoxy
                    coating, waterproofing, and advanced construction chemical solutions planned for various industries.
                </h2>
            @elseif(request()->status == 'ongoing')
                <h2 class="text-lg">
                    Discover ongoing projects of Falcon Solution Limited including industrial flooring, epoxy coatings,
                    waterproofing systems, and high-performance construction chemical applications in progress.
                </h2>
            @elseif(request()->status == 'completed')
                <h2 class="text-lg">
                    Discover the completed projects of Falcon Solution Limited featuring industrial flooring, epoxy coating,
                    waterproofing, construction chemical solutions, and successful engineering implementations across
                    multiple industries.
                </h2>
            @else
                <h2 class="text-lg">
                    Discover the completed projects of Falcon Solution Limited featuring industrial flooring, epoxy coating,
                    waterproofing, construction chemical solutions and more.
                </h2>
            @endif

            <div id="project-grid" class="grid md:grid-cols-2 lg:grid-cols-3 gap-12 md:gap-16 lg:gap-20">
                @include('frontend.includes.project-card', ['projects' => $data['projects']])
            </div>

            <div id="loading" class="text-center my-10 hidden">
                <span class="text-gray-500">Loading more...</span>
            </div>

        </div>
    </section>

@endsection


@section('footer_scripts')

    <script>
        let nextPageUrl = "{{ $data['projects']->nextPageUrl() }}";
        let loading = false;

        window.addEventListener('scroll', () => {
            if (!loading && nextPageUrl && window.innerHeight + window.scrollY >= document.body.offsetHeight -
                200) {
                loadProjects();
            }
        });

        function loadProjects() {
            loading = true;
            document.getElementById('loading').classList.remove('hidden');

            fetch(nextPageUrl, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(res => res.json())
                .then(data => {
                    document.getElementById('project-grid').insertAdjacentHTML('beforeend', data.html);
                    nextPageUrl = data.next_page_url;
                    loading = false;
                    document.getElementById('loading').classList.add('hidden');
                })
                .catch(() => {
                    loading = false;
                    document.getElementById('loading').classList.add('hidden');
                });
        }
    </script>
@endsection
