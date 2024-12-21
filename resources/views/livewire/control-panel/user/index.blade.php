<div class=" w-11/12 mx-auto overflow-x-auto">
    <div class="text-right my-6">
        <a class="btn btn-sm btn-primary" href="{{ route('users.create') }}">
            <span>Create</span>
            <x-heroicon-o-plus-small class="w-5" />
        </a>
    </div>

    <div class="bg-white shadow-md px-4 py-4">
        <table class="table table-zebra">
            <thead>
                <tr>
                    <th>Id#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Type</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->first_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->type }}</td>
                        <td>
                            <a href="{{ route('users.edit', ['id' => $user->id]) }}" class="btn btn-sm btn-ghost">
                                <x-heroicon-m-pencil-square class="w-4" />
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
