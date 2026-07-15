 @foreach ($projects as $project)
     <a href="{{ route('project-details', $project->slug) }}" class="group cursor-pointer relative project-box" data-aos="fade-up">
         <div class="relative overflow-hidden aspect-square">
             <img  loading="lazy" src="{{ asset($project->image) }}" alt="{{ $project->name }}"
                 class="size-full group-hover:scale-105 duration-300" />
         </div>
         <p class="text-xl pt-5 font-medium text-dark">
             {{ $project->name }}
         </p>
         <a href="{{ route('project-details', $project->slug) }}"
             class="detail-btn absolute opacity-0 invisible size-24 bg-primary/50 backdrop-blur-xs text-white flex items-center justify-center rounded-full text-sm">
             View Details
         </a>
     </a>
 @endforeach
