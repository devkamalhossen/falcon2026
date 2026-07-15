@extends('frontend.master')
@section('page_title', 'Our Gallery')
@section('meta_data')
    <meta name="title" content="Gallery - Falcon Solution Limited " />
    <meta name="description" content="Explore the Falcon Solution Limited gallery showcasing premium flooring solutions, construction chemical applications, completed projects, industrial coatings, epoxy flooring" />
@endsection
@section('main')
    <section class="py-12 md:py-20 lg:py-24">
        <div class="container relative space-y-20">
            <h1
                class="mb-0 text-4xl md:text-5xl lg:text-6xl xl:text-[96px] text-dark font-medium uppercase leading-[150%] animate__animated animate__fadeInUp">
                Our Gallery
            </h1>
            <h2 class="text-xl font-normal">Explore the Falcon Solution Limited gallery showcasing premium flooring solutions, construction chemical applications, completed projects, industrial coatings, epoxy flooring</h2>
            <div id="gallery-grid">
                @include('frontend.includes.gallery-card', ['galleryCategories' => $galleryCategories])
            </div>
            <div id="loading" class="text-center my-10 hidden">
                <span class="text-gray-500">Loading more...</span>
            </div>
        </div>
    </section>


    @push('scripts')
        <script>
            let nextPageUrl = "{{ $galleryCategories->nextPageUrl() }}";
            let loading = false;

            window.addEventListener('scroll', () => {
                if (!loading && nextPageUrl && window.innerHeight + window.scrollY >= document.body.offsetHeight -
                    200) {
                    loadMoreGallery();
                }
            });

            function loadMoreGallery() {
                loading = true;
                document.getElementById('loading').classList.remove('hidden');

                fetch(nextPageUrl, {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        console.log(data.html);

                        document.getElementById('gallery-grid').insertAdjacentHTML('beforeend', data.html);
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
        <script src="{{ asset('frontend/assets/plugins/lightbox.js') }}"></script>
    @endpush
@endsection
