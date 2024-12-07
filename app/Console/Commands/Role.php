<?php

namespace App\Console\Commands;

use App\Enums\RoleEnum;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Spatie\Permission\Models\Role as RoleModel;

class Role extends Command
{
    /**
     * @var should be fresh or update
     * @var string
     */
    protected $signature = 'role {type}';

    protected $description = 'Update roles use fresh or refresh';

    private function fresh(): void
    {
        if (! $this->confirm('Are you sure you want to fresh roles ?')) {
            $this->info('Exiting fresh roles operation.');

            return;
        }

        truncate('roles');

        Artisan::call('db:seed --class=RoleSeeder');

        $this->info('Role successfully refreshed');
    }

    private function update(): void
    {
        $roles = RoleEnum::values();

        $bar = $this->output->createProgressBar(count($roles));

        $bar->start();

        foreach ($roles as $role) {
            RoleModel::firstOrCreate(['name' => $role]);

            sleep(1);
            $bar->advance();
        }
        $bar->finish();
    }

    public function handle(): void
    {
        $type = $this->argument('type');

        if ($type === 'fresh') {
            $this->fresh();
        }

        if ($type === 'update') {
            $this->update();
        }
    }
}
