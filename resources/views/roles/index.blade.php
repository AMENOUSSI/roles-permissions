

<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Roles Page') }}
            </h2>
            @can('create roles')
            <a href="{{ route('roles.create') }}" class="bg-slate-700 text-md rounded-md text-white px-5 py-3">&plus;</a>
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
                        Permissions
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
                @if($roles->isNotEmpty())
                    @foreach($roles as $role)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th  class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-left">
                                {{ $role->id }}
                            </th>
                            <td class="px-6 py-3 text-left">
                                {{ $role->name }}
                            </td>
                            <td class="px-6 py-3 text-left">
                                {{ $role->permissions->pluck('name')->implode(', ') }}
                            </td>
                            <td class="px-6 py-3 text-left">
                                {{\Carbon\Carbon::parse($role->created_at)->format('d M, Y')  }}
                            </td>
                            <td class="px-6 py-4 text-center">
                                @can('edit roles')
                                <a href="{{ route('roles.edit',$role->id) }}" class="bg-green-700 text-md rounded-md text-white px-3 py-2">Edit</a>
                                @endcan
                                    @can('delete roles')
                                    <a href="javascript:void(0);" onclick="deleteRole({{ $role->id }})" class="bg-red-700 text-md rounded-md text-white px-3 py-2">Delete</a>
                                    @endcan

                            </td>


                        </tr>
                    @endforeach
                @endif

                </tbody>
            </table>
            <div class="my-3">
                {{ $roles->links() }}
            </div>
        </div>
    </div>
    <x-slot name="script">
        <script type="text/javascript">
            function deleteRole(id){
                if(confirm("Are you sure want to delete?")){
                    $.ajax({
                        url: '{{ route('roles.destroy') }}',
                        type: 'delete',
                        data: {id:id},
                        dataType: 'json',
                        headers:{
                            'x-csrf-token' : '{{ csrf_token() }}'
                        },
                        success: function (response){
                            window.location.href = '{{ route("roles.index") }}';
                        }
                    });
                }
            }

        </script>
    </x-slot>
</x-app-layout>
