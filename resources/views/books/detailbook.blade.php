
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Detailed book') }}
        </h2>
    </x-slot>


<x-splade-modal >
    <div class="bg-red-400">
    <h1>{{ $book->title }}</h1>
    <br/>
    <h1>{{ $book->Author }}</h1>
    </div>
</x-splade-modal>

</x-app-layout>