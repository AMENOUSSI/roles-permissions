

<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Users Edit') }}
            </h2>
            @can('create users')
            <a href="{{ route('users.create') }}" class="bg-slate-700 text-md rounded-md text-white px-5 py-3">&plus;</a>
            @endcan
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

           <x-message></x-message>
            <table class="w-full">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th  class="px-6 py-3 text-left" width="60">
                        #
                    </th>
                    <th class="px-6 py-3 text-left">
                        Name
                    </th>
                    <th class="px-6 py-3 text-left">
                        Email
                    </th>
                    <th class="px-6 py-3 text-left">
                        Roles
                    </th>
                    <th  class="px-6 py-3 text-left" width="180">
                        Created At
                    </th>
                    <th  class="px-6 py-3 text-center" width="180">
                        Actions
                    </th>
                </tr>
                </thead>
                <tbody class="bg-white">
                @if($users->isNotEmpty())
                    @foreach($users as $user)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th  class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-left">
                                {{ $user->id }}
                            </th>
                            <td class="px-6 py-3 text-left">
                                {{ $user->name }}
                            </td>
                            <td class="px-6 py-3 text-left">
                                {{ $user->email }}
                            </td>
                            <td class="px-6 py-3 text-left">
                                {{ $user->roles->pluck('name')->implode(', ') }}
                            </td>
                            <td class="px-6 py-3 text-left">
                                {{\Carbon\Carbon::parse($user->created_at)->format('d M, Y')  }}
                            </td>
                            <td class="px-6 py-4 text-center">
                                @can('edit users')
                                <a href="{{ route('users.edit',$user->id) }}" class="bg-green-700 text-md rounded-md text-white px-3 py-2">Edit</a>
                                @endcan

                                    @can('delete users')
                                    <a href="javascript:void(0);" onclick="deleteUser({{ $user->id }})" class="bg-red-700 text-md rounded-md text-white px-3 py-2">Delete</a>
                                    @endcan

                            </td>

                        </tr>
                    @endforeach
                @endif

                </tbody>
            </table>
            <div class="my-3">
                {{ $users->links() }}
            </div>        </div>
    </div>
    <x-slot name="script">
        <script type="text/javascript">
            function deleteUser(id){
                if(confirm("Are you sure want to delete?")){
                    $.ajax({
                        url: '{{ route('users.destroy') }}',
                        type: 'delete',
                        data: {id:id},
                        dataType: 'json',
                        headers:{
                            'x-csrf-token' : '{{ csrf_token() }}'
                        },
                        success: function (response){
                            window.location.href = '{{ route("users.index") }}';
                        }
                    });
                }
            }

        </script>
    </x-slot>
</x-app-layout>
