<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.tailwindcss.com"></script>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-end m-2 p-2">
                    <a href="{{route('admin.categories.index')}}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Table Index</a>
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100"> 
                    <div class="m-2 p-2">
                       
                      <form method="POST" action="{{route('admin.tables.store')}}">
                        @csrf
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Guest Number</label>
                            <input type="number" name="guest_number" class="form-control" id="exampleInputPassword1">
                          </div>
                          <div class="mb-3 ">
                            <label class="form-check-label" for="exampleCheck1">Status</label>
                            <Select class="form-control" name="status">
                              @foreach (App\Enums\TableStatus::cases() as $table)
                              <option value="{{$table->value}}">{{$table->name}}</option>
                              @endforeach
                            </Select>
                            
                          </div>
                          <div class="mb-3 ">
                            <label class="form-check-label" for="exampleCheck1">Location</label>
                            <Select class="form-control" name="location">
                                @foreach (App\Enums\TableLocation::cases() as $location)
                                <option value="{{$location->value}}">{{$location->name}}</option>
                                @endforeach
                            </Select>
                            
                          </div>
                          <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
  
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-admin-layout>