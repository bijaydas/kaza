<x-layouts.page title="Users" description="Manage all your users">

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
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->fullName() }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->roles()->first()->name }}</td>
                        <td>
                            <a class="btn btn-sm btn-primary" href="#">Edit</a>
                            <a class="btn btn-sm btn-danger" href="#">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layouts.page>
