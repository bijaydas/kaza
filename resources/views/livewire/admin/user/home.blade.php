<x-layouts.page title="Users" description="Manage all your users">

    @can('view_user')
        <div class="text-right">
            <a wire:navigate class="btn btn-primary btn-sm" href="{{ route('admin.users.create') }}">Create users</a>
        </div>

        <div class="section mt-2">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Created on</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->fullName() }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->roles()->first()->name }}</td>
                            <th>{{ $user->getCreatedOn() }}</th>
                            <td>
                                <a href="{{ route('admin.users.edit', ['id' => $user->id]) }}" class="btn btn-ghost btn-sm text-zinc-400 p-1">
                                    <x-heroicon-o-pencil-square class="h-5 w-5" />
                                </a>

                                <a href="#" class="btn btn-ghost btn-sm text-zinc-400 p-1">
                                    <x-heroicon-o-trash class="w-5 h-5" />
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    @elsecannot('view_user')
        <x-access-denied />
    @endcannot

</x-layouts.page>
