<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-end m-2 p-2">
                    <a href="{{route('admin.categories.index')}}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Menu Index</a>
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100"> 
                    <div class="m-2 p-2">
  
                      <form method="POST" action="{{route('admin.menus.update',$menu->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <form>
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="exampleInputEmail1" value="{{$menu->name}}" aria-describedby="emailHelp">
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Description</label>
                            <input type="text" name="description" class="form-control" value="{{$menu->description}}" id="exampleInputPassword1">
                          </div>
                          <div class="mb-3 form-check">
                            <label class="form-check-label" for="exampleCheck1">Image</label>
                            <input type="file" name="image" class="form-control" id="exampleCheck1">
                            <div>
                              <img class="w-20 h-20" src="{{asset('menus/'.$menu->image)}}" alt="">
                            </div>
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Price</label>
                            <input type="number" name="price" class="form-control" id="exampleInputEmail1" value="{{$menu->price}}" aria-describedby="emailHelp">

                          </div>
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Category</label>
                            <select  name="categories[]" multiple class="form-control" id="categories">
                              @foreach ($categories as $category)
                                  <option value="{{$category->id}}">{{$category->name}}</option>
                              @endforeach
                            </select>
                          </div>
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                     

  
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-admin-layout>