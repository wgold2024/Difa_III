<?php

namespace App\Console\Commands;

use App\Models\Defect;
use App\Models\DefectValue;
use Illuminate\Console\Command;

class Clear3Mpp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:clear-mpp';

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
        $defect4AghSeeder = Defect::whereBetween('id', [1000, 1499])->delete();
    }
}
