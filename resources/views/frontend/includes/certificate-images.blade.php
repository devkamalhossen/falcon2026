@foreach ($certifications as $item)
    <div data-aos="fade-up">
        <img  loading="lazy" src="{{ asset($item?->image) }}"
            class="mx-auto w-full h-auto transition-all duration-500 ease-in-out transform hover:scale-105 hover:shadow-xl hover:-translate-y-1"
            alt="Falcon Solution Limited">
    </div>
@endforeach
