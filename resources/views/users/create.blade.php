<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Users / Create') }}
            </h2>
            <a href="{{ route('users.index') }}" class="bg-slate-700 text-md rounded-md text-white px-5 py-3">&rightarrow;</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{route('users.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <label for="" class="text-lg font-medium">Name</label>
                            <div class="my-3">
                                <input value="{{ old('name') }}" type="text" name="name" id="name" class="border-gray-300 shadow-sm w-1/2 rounded-lg">
                                @error('name')
                                <p class="text-red-400 font-medium">{{ $message }}</p>
                                @enderror
                            </div>
                            <label for="" class="text-lg font-medium">Email</label>
                            <div class="my-3">
                                <input value="{{ old('email') }}" type="email" name="email" id="email" class="border-gray-300 shadow-sm w-1/2 rounded-lg">
                                @error('email')
                                <p class="text-red-400 font-medium">{{ $message }}</p>
                                @enderror
                            </div>
                            <label for="" class="text-lg font-medium">Password</label>
                            <div class="my-3">
                                <input value="{{ old('password') }}" type="text" name="password" id="password" class="border-gray-300 shadow-sm w-1/2 rounded-lg">
                                @error('password')
                                <p class="text-red-400 font-medium">{{ $message }}</p>
                                @enderror
                            </div>
                            <label for="" class="text-lg font-medium">Confirm Password</label>
                            <div class="my-3">
                                <input value="{{ old('confirm_password') }}" type="text" name="confirm_password" id="confirm_password" class="border-gray-300 shadow-sm w-1/2 rounded-lg">
                                @error('confirm_password')
                                <p class="text-red-400 font-medium">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="grid grid-cols-4 mb-3">
                                @if($roles->isNotEmpty())
                                    @foreach($roles as $role)
                                        <div class="mt-3">
                                            <input
                                                   type="checkbox" id="role-{{ $role->id }}" class="rounded" name="role[]" value="{{ $role->name }}">
                                            <label for="role-{{ $role->id }}" class="text-sm font-medium">{{ $role->name }}</label>

                                        </div>
                                    @endforeach
                                @endif
                                @error('role')
                                <p class="text-red-400 font-medium">{{ $message }}</p>
                                @enderror
                            </div>
                            <button class="text-lg bg-slate-700 hover:bg-slate-800 py-2 px-3 text-white rounded-md">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
