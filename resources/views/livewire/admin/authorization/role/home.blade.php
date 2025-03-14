<x-layouts.page title="Roles" description="Manage all your roles">
    @can('view_role')
        <div class="section mt-2">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Created on</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($roles as $role)
                        <tr>
                            <td>{{ $role->name }}</td>
                            <td>{{ $role->created_at->diffForHumans() }}</td>
                            <td>
                                <a href="{{ route('admin.authorization.roles.edit', ['id' => $role->id]) }}" class="btn btn-ghost btn-sm text-zinc-400 p-1">
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
    @elsecannot('view_role')
        <x-access-denied />
    @endcannot
</x-layouts.page>
