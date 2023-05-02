<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __(' Edit Student') }}
        </h2>
    </x-slot>


    <div class="flex flex-col mt-6">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="overflow-hidden border border-gray-200 md:rounded-lg">



    <x-splade-form :default="$student" action="{{ route('students.update', $student) }}" method="PUT" >
        <x-splade-input name="name"  class="py-4"/>
  
        <x-splade-input name="email" type="email" class="py-4" placeholder="Your Email Address" />

        <x-splade-input name="phone"  class="py-4"/>

        <x-splade-input name="age"  class="py-4" />

        <button type="submit">Send</button>
    </x-splade-form>
</div>
</div>
</div>
</div> 


    
</x-app-layout>