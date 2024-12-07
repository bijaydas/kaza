<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Spatie\Permission\Models\Permission as PermissionModel;

class PermissionCommand extends Command
{
    protected $signature = 'permission {type}';

    protected $description = 'Update permission use fresh or update';

    private function fresh(): void
    {
        if (! $this->confirm('Are you sure you want to fresh permissions ?')) {
            $this->info('Exiting fresh permissions operation.');

            return;
        }

        truncate('permissions');

        Artisan::call('db:seed --class=PermissionSeeder');

        $this->info('Permissions successfully refreshed');
    }

    private function update(): void
    {
        $permissions = getPermissionsData();

        $bar = $this->output->createProgressBar(count($permissions));

        $bar->start();

        foreach ($permissions as $permission) {
            PermissionModel::firstOrCreate(['name' => $permission]);

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
