<?php

namespace App\Console\Commands;

use App\Models\Defect;
use App\Models\DefectValue;
use Illuminate\Console\Command;

class ClearAgh extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:clear-agh';

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
        $defect4AghSeeder = Defect::whereBetween('id', [1500, 1599])->delete();
//        $defectValue4AghSeeder = DefectValue::whereBetween('id', [1500, 1599])->delete(); // авто - каскадное удаление
    }
}
