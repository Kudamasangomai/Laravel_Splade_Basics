<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Books') }}
        </h2>
    </x-slot>


    <div class="flex flex-col mt-6">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="overflow-hidden border-gray-200 md:rounded-lg">
                    
                    <x-splade-table :for="$books" search-debounce="500" striped>

                        
<x-splade-cell Actions as="$book" >

    <Link modal href="/books/{{ $book->id }}">View</Link>
    <Link href="/books/{{ $book->id }}/edit" class="px-2"> Edit </Link>
<x-splade-form action="{{ route('books.destroy',$book) }}" method="delete" confirm>
    <x-splade-submit label="Delete" class="text-white bg-red-500" />
</x-splade-form>
</x-splade-cell>
                    </x-splade-table>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
