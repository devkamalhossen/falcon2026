@php
    $address = get_option('address');
    $hotline = get_option('hotline');
    $phone = get_option('phone');
    $email = get_option('email');
@endphp



<footer class="bg-[#6a994e] py-8 text-white">
    <div class="container">
        
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            <!-- Contact Info -->
            <div class="space-y-1.5">
                @if ($hotline)
                    <a href="tel:{{ $hotline }}" class="group text-xl flex gap-1.5">
                        <span class="group-hover:underline">
                            Hotline: {{ $hotline }}
                        </span>
                        <span class="invisible group-hover:visible">
                            {!! config('icon.upRight') !!}
                        </span>
                    </a>
                @endif

                @if ($phone)
                    <a href="tel:{{ $phone }}" class="group text-xl flex gap-1.5">
                        <span class="group-hover:underline">
                            Phone: {{ $phone }}
                        </span>
                        <span class="invisible group-hover:visible">
                            {!! config('icon.upRight') !!}
                        </span>
                    </a>
                @endif

                @if ($email)
                    <a href="mailto:{{ $email }}" class="group text-xl flex gap-1.5">
                        <span class="group-hover:underline">
                            Email: {{ $email }}
                        </span>
                        <span class="invisible group-hover:visible">
                            {!! config('icon.upRight') !!}
                        </span>
                    </a>
                @endif
            </div>

            <!-- Logo & Copyright -->
            <div class="text-center space-y-3">
                <div>
                    <img  loading="lazy" src="{{ asset(get_option('site_logo')) }}" class="mx-auto max-h-20 mb-8" alt="Falcon Solution Limited">
                    {{--@if ($socials->count() > 0)
                        <div class="flex gap-2.5 justify-center items-center mb-3">
                            @foreach ($socials as $social)
                                <a href="{{ $social->link }}"
                                    class="size-12 rounded-full border flex items-center justify-center transition-colors duration-300 hover:bg-gray-100 hover:text-black">
                                    {!! config('icon.' . $social->name) !!}
                                </a>
                            @endforeach
                        </div>
                    @endif--}}
                    


                    @php
                        $socialColors = [
                            'facebook'  => '#1877F2',
                            'instagram' => '#E4405F',
                            'twitter'   => '#1DA1F2',
                            'youtube'   => '#FF0000',
                            'linkedin'  => '#0A66C2',
                            'pinterest' => '#E60023',
                        ];
                    @endphp
                    
                    @if ($socials->count() > 0)
                        <div class="flex gap-4 justify-center items-center mb-3">
                            @foreach ($socials as $social)
                                <a href="{{ $social->link }}"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="size-12 rounded-full flex items-center justify-center transition-transform duration-300 hover:scale-110 text-white"
                                    style="background-color: {{ $socialColors[$social->name] ?? '#6B7280' }};">
                                    <span class="text-2xl">
                                        {!! config('icon.' . $social->name) !!}
                                    </span>
                                </a>
                            @endforeach
                        </div>
                    @endif



                </div>
                <p class="text-[12px] mt-2 ">
                    © {{ date('Y') }}, {{ get_option('site_name') }} |
                    {{ get_option('copyright_text') }} |
                    developed by
                    <a href="https://www.linkedin.com/in/webdevifti/" class="underline">
                        webdevifti
                    </a>
                </p>
            </div>

            <!-- Address + Social -->
            <div class="space-y-4 lg:text-right">
                @if ($address)
                    <div>
                        <h4 class="font-medium">Address</h4>
                        <p class="text-xl leading-relaxed">
                            {{ $address }}
                        </p>
                    </div>
                @endif
            </div>

        </div>
    </div>
</footer>
