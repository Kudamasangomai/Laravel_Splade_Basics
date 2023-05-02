<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __(' Detailed View For Student') }}
        </h2>
    </x-slot>


    <div class="flex flex-col mt-6 ">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="overflow-hidden border border-gray-200 md:rounded-lg">


                    <ul class="px-10">
                        <li> {{ $student->name }} </li>
                        <li> {{ $student->email }} </li>
                        <li> {{ $student->phone }} </li>
                        <li> {{ $student->age }} </li>
                    </ul>
                       
                    <Link href="{{ route('students.edit',$student) }}">Edit</Link>
                        

                        <a href="">Delete</a>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
