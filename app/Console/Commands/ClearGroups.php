<?php

namespace App\Console\Commands;

use App\Models\Group;
use Illuminate\Console\Command;

class ClearGroups extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:clear-groups';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $groups = Group::query()->delete();
    }
}
