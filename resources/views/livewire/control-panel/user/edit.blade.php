<div class="flex space-x-4 w-3/4 ml-20 mt-10">
    <form wire:submit="save" class="w-2/3 space-y-4">
        <div class="bg-white flex flex-col gap-y-4 px-6 py-8 shadow-md">
            <div class="flex space-x-2">
                <x-form.input type="text" name="form.firstName" wire:model="form.firstName" label="First name" containerClass="flex-1"/>
                <x-form.input type="text" name="form.lastName" wire:model="form.lastName" label="Last name" containerClass="flex-1"/>
            </div>

            <div class="flex space-x-2">
                <x-form.input type="date" wire:model="form.dateOfBirth" label="Date of birth" containerClass="flex-1" />
                <x-form.input type="date" wire:model="form.anniversaryDate" label="Anniversary" containerClass="flex-1" />
            </div>

            <div class="flex">
                <div class="flex-1">
                    <span class="label-text">Gender</span>
                    <div class="flex">
                        <x-form.radio wire:model="form.gender" name="gender" value="male" label="Male" />
                        <x-form.radio wire:model="form.gender" name="gender" value="female" label="Female" />
                        <x-form.radio wire:model="form.gender" name="gender" value="not-selected" label="Not selected" />
                    </div>
                </div>
                <div class="flex-1">
                    <span class="label-text">Account type</span>
                    <div class="flex">
                        <x-form.radio wire:model="form.type" name="type" value="user" label="User" />
                        <x-form.radio wire:model="form.type" name="type" value="admin" label="Admin" />
                    </div>
                </div>
            </div>

            <div class="flex space-x-2">
                <x-form.input type="text" wire:model="form.phone" name="phone" label="Phone" containerClass="w-1/2" />

                <label for="" class="form-control w-1/2">
                    <span class="label">
                        <span class="label-text">Relationship</span>
                    </span>

                    <select class="select select-bordered" wire:model="form.relationship" name="relationship">
                        <option value="not-selected">Not selected</option>
                        <option value="mother">Mother</option>
                        <option value="father">Father</option>
                        <option value="wife">Wife</option>
                        <option value="husband">Husband</option>
                        <option value="son">Son</option>
                        <option value="daughter">Daughter</option>
                        <option value="brother">Brother</option>
                        <option value="sister">Sister</option>
                        <option value="aunt">Aunt</option>
                        <option value="uncle">Uncle</option>
                        <option value="cousin">Cousin</option>
                    </select>
                </label>
            </div>

            <div class="flex space-x-2">
                <x-form.input type="text" name="form.email" wire:model="form.email" label="Email" containerClass="w-1/2" required />
                <x-form.input type="text" name="form.password" wire:model="form.password" label="Password" containerClass="w-1/2" required />
            </div>

            <div class="flex space-x-2">
                <label for="" class="form-control w-1/2">
                    <span class="label">
                        <span class="label-text">
                            Account status
                            @if($form->status === 'active')
                                <x-shared.badge success>Active</x-shared.badge>
                            @else
                                <x-shared.badge error>Inactive</x-shared.badge>
                            @endif
                        </span>
                    </span>

                    <select class="select select-bordered" wire:model="form.status" name="status">
                        @foreach($d_status as $status)
                            <option value="{{ $status }}">{{ ucfirst($status) }}</option>
                        @endforeach
                    </select>
                </label>
            </div>

            @include('shared.form-result')
        </div>

        <div class="flex justify-end space-x-2">
            <button class="btn btn-sm btn-error" type="button">Delete</button>
            <button class="btn btn-sm btn-primary" type="submit">Update user</button>
        </div>
    </form>

    <div class="flex-grow">
        Questions and answers
    </div>
</div>
