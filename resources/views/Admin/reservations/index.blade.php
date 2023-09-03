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
                    <a href="{{route('admin.reservation.create')}}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white"> New Reservation</a>
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
<div class="relative overflow-x-auto">
    <table class="min-w-full">
        <thead class="bg-gray-50 dark:bg-gray-700">
            <tr>
                <th scope="col"
                    class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                    Name
                </th>
                <th scope="col"
                    class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                    Email
                </th>
                <th scope="col"
                    class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                    Date
                </th>
                <th scope="col"
                    class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                    Table
                </th>
                <th scope="col"
                    class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                    Guests
                </th>
                <th scope="col" class="relative py-3 px-6">
                    <span class="sr-only">Edit</span>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reservations as $reservation)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td
                        class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $reservation->first_name }} {{ $reservation->last_name }}
                    </td>
                    <td
                        class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                        {{ $reservation->email }}
                    </td>
                    <td
                        class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                        {{ $reservation->res_date }}
                    </td>
                    <td
                        class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                        {{ $reservation->table->name }}
                    </td>
                    <td
                        class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                        {{ $reservation->guest_number }}
                    </td>
                    <td class="py-4 px-6 text-sm font-medium text-right whitespace-nowrap">
                        <div class="flex space-x-2">
                            <a href="{{ route('admin.reservation.edit', $reservation->id) }}"
                                class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-lg  text-white">Edit</a>
                            <form
                                class="px-4 py-2 bg-red-500 hover:bg-red-700 rounded-lg text-white"
                                method="POST"
                                action="{{ route('admin.reservation.destroy', $reservation->id) }}"
                                onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </div>
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
