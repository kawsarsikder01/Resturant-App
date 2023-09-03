<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <script src="https://cdn.tailwindcss.com"></script>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-end m-2 p-2">
                    <a href="{{route('admin.tables.create')}}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white"> New Table</a>
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Guest Number
                </th>
                <th scope="col" class="px-6 py-3">
                    Status
                </th>
                <th scope="col" class="px-6 py-3">
                    Location
                </th>
                <th scope="col" class="px-6 py-3">
                    Edit
                </th>
                <th scope="col" class="px-6 py-3">
                    Delete
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tables as $table)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$table->name}}
                </th>
                <td class="px-6 py-4">
                    {{$table->guest_number}}
                </td>
                <td class="px-6 py-4">
                    {{$table->status}}
                </td>
                <td class="px-6 py-4">
                    {{$table->location}}
                </td>
                <td class="px-6 py-4">
                    <a href="{{route('admin.tables.edit',$table->id)}}" class="px-4 py-2 bg-green-500 hover:bg-green-800 rounded-lg text-white"> Edit</a>
                </td>
                <td class="px-6 py-4">
                    <form action="{{route('admin.tables.destroy',$table->id)}}" onsubmit="return confirm('Are you sure')" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="category_id" value="{{$table->id}}">
                        <button type="submit"   class="px-4 py-2 bg-red-500 hover:bg-red-800 rounded-lg text-white">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
            
        </tbody>
    </table>
</div>

                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
