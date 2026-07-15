 @php
     $logo = get_option('site_logo');
 @endphp
 <header id="header" class="py-6 animate__animated animate__fadeInDown">
     <div class="container">
         <div class="flex items-center justify-between ">
             <a href="{{ route('home') }}">
                 <img  loading="lazy" src="{{ asset($logo) }}" alt="{{ $site_name }}" class="h-10 sm:h-14 w-auto" />
             </a>
             <div class="sm:block hidden">
                 <form action="{{ route('services') }}" method="GET" id="searchForm"
                     class="flex overflow-hidden w-[350px] ">
                     <!-- Search Input -->
                     <input name="search" type="text"
                         class="flex-1 bg-transparent focus:bg-transparent focus:ring-0 px-4 rounded-s-lg py-2 border border-gray-300 text-sm text-gray-700 placeholder-gray-400 focus:outline-none"
                         placeholder="Search Service...">

                     <!-- Search Button -->
                     <button type="submit"
                         class="flex items-center justify-center rounded-e-lg bg-primary text-white px-4 py-2 hover:bg-primary/90 transition cursor-pointer">
                         <span class="text-xl">{!! config('icon.search') !!}</span>
                     </button>
                 </form>

             </div>
             <button class="flex items-center gap-2 cursor-pointer" type="button" data-drawer-target="drawer-menu"
                 data-drawer-show="drawer-menu" data-drawer-placement="right" aria-controls="drawer-menu">
                 <span class="text-xl font-medium tracking-wider uppercase">Menu</span>
                 <span class="text-4xl text-primary"> {!! config('icon.gripLines') !!}</span>
             </button>

         </div>
     </div>

     <!-- drawer component -->

 </header>

 <div id="drawer-menu"
     class="fixed top-0 right-0 h-screen overflow-y-auto transition-transform text-white translate-x-full bg-[#15171b] w-96 flex flex-col z-[9999]"
     tabindex="-1" aria-labelledby="drawer-right-label">
     <button type="button" data-drawer-hide="drawer-menu" aria-controls="drawer-menu"
         class="text-white bg-transparent absolute right-10 top-10 z-[10] rounded-lg text-sm cursor-pointer flex ml-auto items-center gap-2.5">
         <span class="uppercase tracking-wider">Close</span>
         {!! config('icon.close') !!}
     </button>

     <!-- Level 1 -->
     <div id="menu-level-1" class="absolute inset-0 px-10 pt-20 transition-all flex flex-col items-start gap-4">
         <div class="sm:hidden block">
             <form action="{{ route('services') }}" method="GET" id="searchForm" class="flex overflow-hidden w-full ">
                 <!-- Search Input -->
                 <input name="search" type="text"
                     class="flex-1 bg-transparent focus:bg-transparent focus:ring-0 px-4 rounded-s-lg py-2 border border-gray-300 text-sm text-gray-700 placeholder-gray-400 focus:outline-none"
                     placeholder="Search Service...">

                 <!-- Search Button -->
                 <button type="submit"
                     class="flex items-center justify-center rounded-e-lg bg-primary text-white px-4 py-2 hover:bg-primary/90 transition cursor-pointer">
                     <span class="text-xl">{!! config('icon.search') !!}</span>
                 </button>
             </form>

         </div>
         <a href="{{ route('home') }}" class="menu-item">Home</a>
         <button onclick="openMenu('about-level')" class="menu-item flex items-center gap-2 cursor-pointer">
             About {!! config('icon.chevronRight') !!}
         </button>


         <button onclick="openMenu('service-level')" class="menu-item flex items-center gap-2 cursor-pointer">
             Services {!! config('icon.chevronRight') !!}
         </button>
         <a href="{{ route('service.area') }}" class="menu-item">Service Area</a>
         <button onclick="openMenu('project-level')" class="menu-item flex items-center gap-2 cursor-pointer">
             Projects {!! config('icon.chevronRight') !!}
         </button>
         <a href="{{ route('product-list') }}" class="menu-item">Product List</a>
         <a href="{{ route('gallery') }}" class="menu-item">Gallery</a>
         <a href="{{ route('blogs') }}" class="menu-item">Blog</a>
         <a href="{{ route('certificates') }}" class="menu-item">Certificates</a>
         <a href="{{ route('contact') }}" class="menu-item">Contact</a>

         @php
             $pages = get_active_custom_pages();

         @endphp
         @foreach ($pages as $page)
             <a href="{{ route('page', $page->slug) }}" class="menu-item">{{ $page->name }}</a>
         @endforeach

     </div>

     <!-- Level 2: Services Submenu -->
     <div id="project-level"
         class="absolute inset-0 px-10 pt-10 hidden transition-all bg-[#15171b] flex-col items-start gap-4">
         <button onclick="openMenu('menu-level-1')"
             class="mb-10 text-sm cursor-pointer flex items-center gap-2.5 uppercase tracking-wider">
             {!! config('icon.chevronLeft') !!} Back
         </button>

         <a href="{{ route('projects') }}?status=upcoming" class="menu-item">Upcoming</a>
         <a href="{{ route('projects') }}?status=ongoing" class="menu-item">Ongoing</a>
         <a href="{{ route('projects') }}?status=completed" class="menu-item">Completed</a>
     </div>

     <!-- Level 2: Services Submenu -->
     <div id="about-level"
         class="absolute inset-0 px-10 pt-10 hidden transition-all bg-[#15171b] flex-col items-start gap-4">
         <button onclick="openMenu('menu-level-1')"
             class="mb-10 text-sm cursor-pointer flex items-center gap-2.5 uppercase tracking-wider">
             {!! config('icon.chevronLeft') !!} Back
         </button>

         <a href="{{ route('our-story') }}" class="menu-item">Our Story</a>
         <a href="{{ route('why-us') }}" class="menu-item">Why Falcon?</a>
         <a href="{{ route('our-business') }}" class="menu-item">Our Business</a>
         <a href="{{ route('our-clients') }}" class="menu-item">Our Clients</a>
         <a href="{{ route('our-team') }}" class="menu-item">Our Team</a>
     </div>

     <div id="service-level"
         class="absolute inset-0 px-10 pt-10 hidden transition-all bg-[#15171b] flex-col items-start gap-4">
         <button onclick="openMenu('menu-level-1')"
             class="mb-10 text-sm cursor-pointer flex items-center gap-2.5 uppercase tracking-wider">
             {!! config('icon.chevronLeft') !!} Back
         </button>
         <a href="{{ route('services') }}" class="menu-item">All Services</a>
         @php
             $services = get_active_services();
         @endphp
         @foreach ($services as $service)
             <a href="{{ route('service.detail', $service->slug) }}" class="menu-item">{{ $service->title }}</a>
         @endforeach

     </div>


     @if ($socials->count() > 0)
         <div class="space-y-2.5 absolute bottom-10 right-10 left-10 z-10">
             <p class="text-lg">Follow Us</p>
             <div class="flex space-x-2.5 lg:order-2">
                 @foreach ($socials as $social)
                     <a href="{{ $social->link }}"
                         class="size-9 rounded-full border border-primary/40 hover:bg-primary/40 flex items-center justify-center transition-colors duration-300">
                         {!! config('icon.' . $social->name) !!}
                     </a>
                 @endforeach
             </div>
         </div>
     @endif
 </div>

 <style>
     [drawer-backdrop] {
         background-color: transparent;
         z-index: -1;
     }
 </style>

 <script>
     function openMenu(id) {
         // hide all menu layers
         document.querySelectorAll("#drawer-menu > div").forEach(el => {
             el.style.display = 'none';
         });
         // show the selected menu
         document.getElementById(id).style.display = 'flex';
     }
 </script>
 <script>
     const drawer = document.getElementById('drawer-menu');

     const observer = new MutationObserver(() => {
         if (!drawer.classList.contains('translate-x-full')) {
             console.log('Drawer opened');
             animateMenuItems();
         } else {
             console.log('Drawer closed');
         }
     });

     observer.observe(drawer, {
         attributes: true,
         attributeFilter: ['class']
     });

     function animateMenuItems() {
         const items = drawer.querySelectorAll('#menu-level-1 .menu-item');
         items.forEach((item, index) => {
             item.style.opacity = 0;
             item.style.transform = 'translateX(100px)';
             setTimeout(() => {
                 item.style.transition = 'all 0.8s ease';
                 item.style.opacity = 1;
                 item.style.transform = 'translateX(0)';
             }, index * 100); // stagger animation
         });
     }
 </script>
