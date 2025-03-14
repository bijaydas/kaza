<x-layouts.page breadcrumbs="adminUsers">
    <x-slot:title>Create user</x-slot:title>
    <x-slot:description>Create all your users here</x-slot:description>

    @can('create_user')
        <form wire:submit="createUser" class="w-1/2 flex flex-col gap-y-4">
            <div class="flex flex-col gap-y-4 section p-4">
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
                        <span class="label-text">Role</span>
                        <div class="flex">
                            <x-form.radio wire:model="form.role" name="role" value="user" label="User" />
                            <x-form.radio wire:model="form.role" name="role" value="admin" label="Admin" />
                        </div>
                    </div>
                </div>

                <div class="flex space-x-2">
                    <div class="flex-1">
                        <x-form.select label="Account status">
                            <select class="select select-primary">
                                @foreach(\App\Enums\AccountStatus::data() as $value)
                                    <option value="">{{ $value }}</option>
                                @endforeach
                            </select>
                        </x-form.select>
                    </div>
                    <div class="flex-1">
                        <x-form.input type="text" wire:model="form.phone" name="phone" label="Phone" />
                    </div>
                </div>

                <div class="flex space-x-2">
                    <x-form.input type="email" name="form.email" wire:model="form.email" label="Email" containerClass="w-1/2" required />
                    <x-form.input type="password" name="form.password" wire:model="form.password" label="Password" containerClass="w-1/2" required />
                </div>
            </div>

            <div class="flex justify-end space-x-2">
                <button class="btn btn-primary btn-sm" type="submit">Submit</button>
            </div>

            @include('shared.form-result')
        </form>
    @elsecannot('create_user')
        <x-access-denied />
    @endcannot
</x-layouts.page>
