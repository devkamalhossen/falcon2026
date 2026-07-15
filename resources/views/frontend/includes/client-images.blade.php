@foreach ($clients as $client)
    <div data-aos="fade-up">
        <img  loading="lazy" src="{{ asset($client?->image) }}" class="mx-auto w-full h-auto" alt="{{ $client?->alt_name }}">
    </div>
@endforeach
