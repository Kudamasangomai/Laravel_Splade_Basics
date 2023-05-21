<div class="flex flex-col items-center min-h-screen pt-6 bg-gray-100 sm:justify-center sm:pt-0">
    <div>
        @isset($logo)
            {{ $logo }}
        @else
            <Link href="/">
                <x-application-logo class="w-20 h-20 text-gray-500 fill-current" />
            </Link>
        @endisset
    </div>

    <div class="w-full px-6 py-4 mt-6 overflow-hidden bg-gray-400 sm:max-w-md sm:rounded-lg">
        {{ $slot }}
    </div>
</div>
