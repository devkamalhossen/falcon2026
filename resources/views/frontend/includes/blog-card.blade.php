 @foreach($blogs as $blog)
 <a href="{{route('single.blog', $blog->slug)}}" class="group bg-[#f8f0e7] cursor-pointer" data-aos="fade-up">
     <article
         style="translate: none; rotate: none; scale: none; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">
         <div class="relative">
             <div class="relative overflow-hidden z-[1] aspect-[507/285]">
                 <img loading="lazy" src="{{ asset($blog->image) }}" alt="{{$blog->title}}"
                     class="size-full group-hover:scale-105 duration-300 transition-all" />
                 <div
                     class="bg-[#3c3c3b4d] h-full left-0 top-0 w-full absolute group-hover:[transition:all_.3s_ease-in-out] group-hover:bg-[#3c3c3b66]">
                 </div>
             </div>
             <div class="flex items-end justify-between -mt-[60px] pt-5 w-full">
                 @php
                    $day = \Carbon\Carbon::parse($blog->created_at)->format('d');
                    $monthYear = \Carbon\Carbon::parse($blog->created_at)->format('M Y');
                @endphp
                 <div
                     class="text-transparent text-[101px] font-medium [-webkit-text-stroke:1px_#fff] inline-block leading-[95%] pl-2.5 absolute z-[4]">
                     {{ $day }}</div>
                 <div class="text-dark inline-block text-[101px] font-medium leading-[95%] pl-2.5 relative z-0">
                     {{ $day }}</div>
                 <div class="items-center text-dark flex justify-between pb-5 pr-5 w-full">
                     <p class="text">{{ $monthYear }}</p>
                     <div
                         class="border rounded-full border-dark text-sm text-dark font-medium leading-[100%] p-[3px_10px]">
                         {{ $blog?->category?->name }}</div>
                 </div>
             </div>
         </div>
         <h1 class="text-xl px-5 [margin-block:20px] font-medium text-dark">
            {{$blog->title}}
         </h1>
     </article>
 </a>
@endforeach