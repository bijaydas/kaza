<div class=" w-11/12 mx-auto overflow-x-auto">
    <div class="flex items-center my-4">
        <div class="flex-1">
            <x-shared.breadcrumbs until="users" />
        </div>
        <div class="flex-1 text-right">
            <a class="btn btn-sm btn-primary" href="{{ route('users.create') }}">
                <span>Create</span>
                <x-heroicon-o-plus-small class="w-5" />
            </a>
        </div>
    </div>

    <div class="bg-white px-4 py-4 border">
        <table class="table table-sm table-zebra">
            <thead>
                <tr>
                    <th>Id#</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>
                            <div class="flex items-center space-x-2">
                                <x-heroicon-c-user-circle class="w-8 text-gray-500" />
                                <div>
                                    <span class="block text-gray-800">{{ $user->fullName() }}</span>
                                    <span class="block text-gray-500 text-xs">{{ $user->email }}</span>
                                </div>
                            </div>
                        </td>

                        <td>
                            @if($user->type === 'admin')
                                <x-shared.badge type="badge-success">{{ $user->type }}</x-shared.badge>
                            @else
                                <x-shared.badge type="badge-info">{{ $user->type }}</x-shared.badge>
                            @endif
                        </td>
                        <td>
                            @if($user->status === 'active')
                                <x-shared.badge type="badge-success">{{ $user->status }}</x-shared.badge>
                            @else
                                <x-shared.badge type="badge-error">{{ $user->status }}</x-shared.badge>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('users.edit', ['id' => $user->id]) }}" class="text-sm text-gray-500 hover:underline">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
