<?php

namespace App\Console\Commands;

use App\Models\Conge;
use App\Models\Mission;
use App\Notifications\MissionEndingNotification;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Notification;

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
        // notification
        $conge = Conge::whereDate('fincon', '<', now())->first();
        if ($conge) {
            $employee = $conge->emploie;
            if ($employee) {
                $employeeName = $employee->nom;
                $user = $employee->users;
                if ($user) {
                    // Maintenant, vous avez l'objet User associé à la mission.
                    // Vous pouvez utiliser $user pour envoyer des notifications, par exemple.
                    Notification::send($user, new MissionEndingNotification($employeeName));
                }
            }
        }
    }
}
