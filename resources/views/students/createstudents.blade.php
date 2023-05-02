<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Students Create') }}
        </h2>
    </x-slot>
    <div class="flex flex-col mt-6">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="overflow-hidden border border-gray-200 md:rounded-lg">


                    {{-- <x-splade-form :for="$form" /> --}}


                    <x-splade-form action="{{ route('students.store') }}" method="POST">
                        <x-splade-input name="email" label="Email address" />
                     
                        <x-splade-input name="name" :label="__('Username')" />

                        <x-splade-input name="phone" :label="__('phone')" />

                        <x-splade-input type="number" min="0" max="65" name="age" :label="__('Age')" />
                     
                        <x-splade-submit  class="mt-4"/>
                    </x-splade-form>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
