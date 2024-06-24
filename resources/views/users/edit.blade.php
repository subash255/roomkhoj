
@vite(['resources/css/app.css', 'resources/js/app.js'])

    <h2 class="font-bold text-3xl text-amber-600">Edit User</h2>
    <hr class="h-1 bg-amber-600">

    <div class="mt-10">
        <form action="{{route('users.update',$user->id)}}" method="POST">
            @csrf
            <div class="mb-4">
                <input type="text" class="border p-3 w-full rounded-lg" name="name" placeholder=" Name" value="{{$user->name}}">
                @error('name')
                    <div class="text-red-500 mt-2 text-sm">
                        {{$message}}
                    </div>
                @enderror
            </div>

            <div class="mb-4">
                <input type="text" class="border p-3 w-full rounded-lg" name="email" placeholder="email" value="{{$user->email}}">
                @error('priority')
                    <div class="text-red-500 mt-2 text-sm">
                        {{$message}}
                    </div>
                @enderror
            </div>

            <div class="mb-4">
                <input type="text" class="border p-3 w-full rounded-lg" name="phone" placeholder="phone" value="{{$user->phone}}">
                @error('priority')
                    <div class="text-red-500 mt-2 text-sm">
                        {{$message}}
                    </div>
                @enderror
            </div>
            Date of Birth
            <div class="mb-4">
                <input type="date" class="border p-3 w-full rounded-lg" name="dob" placeholder="dob" value="{{$user->dob}}">
                @error('priority')
                    <div class="text-red-500 mt-2 text-sm">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="mb-4">
                <input type="file" class="border p-3 w-full rounded-lg" name="photopath" placeholder="photo" value="{{$user->photopath}}">
                @error('priority')
                    <div class="text-red-500 mt-2 text-sm">
                        {{$message}}
                    </div>
                @enderror
            </div>
          
              
        


            <div class="flex justify-center gap-5">
                <button class="bg-blue-600 text-white py-3 px-10 rounded-lg">Update</button>
                <a href="{{route('users.profile',$user->id)}}" class="bg-red-500 text-white py-3 px-7 rounded-lg">Cancel</a>
            </div>
        </form>
    </div>

