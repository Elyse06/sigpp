<?php

namespace App\Console\Commands;

use App\Models\SoldeSortie;
use Illuminate\Console\Command;

class ResetSoldeSortie extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reset:sortie';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'réinitialiser le solde du sortie personnel';

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
        $soldeSorties = SoldeSortie::all(); 

        foreach ($soldeSorties as $soldeSortie) {
            if (now()->isSameDay($lastDayOfMonth)) {
                $soldeSortie->solde = 4;
                $soldeSortie->save();
            }
        }
    }
}
