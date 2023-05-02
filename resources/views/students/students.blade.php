<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Students') }}
        </h2>
    </x-slot>


     <div class="flex flex-col mt-6">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="overflow-hidden border border-gray-200 md:rounded-lg">

                    
                        <Link href="{{ route('students.create') }}" class="px-2 py-2 bg-red-500 rounded-sm">
                        Create </Link>
                        <br/>
                      
           
<x-splade-table :for="$students" search-debounce="500" striped class="mt-10">

    

<x-splade-cell actions as="$user" >
    <Link href="/students/{{ $user->id }}" class="bg-blue-600"> View </Link>
    <Link href="/students/{{ $user->id }}/edit" class="px-2"> Edit </Link>
<x-splade-form action="{{ route('students.destroy',$user) }}" method="delete" confirm>
    <x-splade-submit label="Delete" class="text-white bg-red-500" />
</x-splade-form>
</x-splade-cell>
</x-splade-table>
                </div>
            </div>
        </div>
    </div> 

 

</x-app-layout>
