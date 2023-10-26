<?php

namespace App\Console\Commands;

use App\Models\Mission;
use Illuminate\Console\Command;

class CheckEventEndDates extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'end:date';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'La date du fin de la planning est arrivé';

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
        $missions = Mission::whereDate('finmis', '=', now())->get();

        foreach ($missions as $mission) {
            // Créez une instance de la notification et envoyez-la à l'utilisateur associé à la mission
            $user = $mission->user; // Assurez-vous que votre modèle Mission a une relation vers l'utilisateur
            $user->notify(new MissionEndingNotification($mission));
        }
        }
}
