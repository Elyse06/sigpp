<?php

namespace App\Console\Commands;

use App\Models\SoldePermission;
use Illuminate\Console\Command;

class ResetSoldePermission extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reset:permission';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'réinitialiser le solde du permission';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $lastDayOfMonth = now()->endOfMonth();
        $soldePermissions = SoldePermission::all(); 

        foreach ($soldePermissions as $soldePermission) {
            if (now()->isSameDay($lastDayOfMonth)) {
                $soldePermission->solde = 8;
                $soldePermission->save();
            }
        }
    }
}
