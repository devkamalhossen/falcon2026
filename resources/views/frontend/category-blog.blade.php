
 @extends('frontend.master')
 @section('page_title', $category->name)
 @section('meta_data')
    <meta name="title" content="{{ $category->name }} - Falcon Solution Limited" />
    <meta name="description" content="Explore articles, guides, industry insights, and expert updates about {{ $category->name }} from Falcon Solution Limited, covering construction chemicals, industrial flooring solutions, waterproofing, coatings, and more."
 />
@endsection
 @section('main')
     <section class="py-16 lg:py-24">
         <div class="container">
             <div class="text-center mb-12 space-y-2.5" data-aos="fade-up">
                 <h2 class="text-2xl md:text-3xl lg:text-4xl font-medium uppercase">
                     {{ $category->name }}
                 </h2>

             </div>

             <div id="client-grid"
                 class="grid grid-cols-2 lg:grid-cols-4 gap-10 lg:gap-12 mt-20">
                 @include('frontend.includes.category-blog-card', ['blogs' => $blogs])
             </div>

             <div id="loading" class="text-center my-10 hidden">
                 <span class="text-gray-500">Loading more...</span>
             </div>
         </div>
     </section>
 @endsection
 @section('footer_scripts')
     <script>
         let nextPageUrl = "{{ $blogs->nextPageUrl() }}";
         let loading = false;

         window.addEventListener('scroll', () => {
             if (!loading && nextPageUrl && window.innerHeight + window.scrollY >= document.body.offsetHeight -
                 200) {
                 loadMoreBlog();
             }
         });

         function loadMoreBlog() {
             loading = true;
             document.getElementById('loading').classList.remove('hidden');

             fetch(nextPageUrl, {
                     headers: {
                         'X-Requested-With': 'XMLHttpRequest'
                     }
                 })
                 .then(res => res.json())
                 .then(data => {
                     document.getElementById('client-grid').insertAdjacentHTML('beforeend', data.html);
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
