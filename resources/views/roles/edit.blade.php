<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Roles Edit') }}
            </h2>
            <a href="{{ route('roles.index') }}" class="bg-slate-700 text-md rounded-md text-white px-5 py-3">&rightarrow;</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{route('roles.update',$role->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <label for="" class="text-lg font-medium">Name</label>
                            <div class="my-3">
                                <input value="{{ old('name', $role->name) }}" type="text" name="name" id="name" class="border-gray-300 shadow-sm w-1/2 rounded-lg" placeholder="Enter Name">
                                @error('name')
                                <p class="text-red-400 font-medium">{{ $message }}</p>
                                @enderror
                            </div>


                            <div class="grid grid-cols-4 mb-3">
                                @if($permissions->isNotEmpty())
                                    @foreach($permissions as $permission)
                                        <div class="mt-3">
                                            <input {{ ($hasPermissions->contains($permission->name)) ? 'checked' : ''}} type="checkbox" class="rounded" id="role{{$permission->id}}" name="permission[]" value="{{ $permission->name }}" >
                                            <label for="role-{{ $permission->id }}">{{ $permission->name }}</label>
                                        </div>
                                    @endforeach
                                @endif

                            </div>
                            <button class="text-lg bg-gray-800 py-2 px-3 text-white rounded-md">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
