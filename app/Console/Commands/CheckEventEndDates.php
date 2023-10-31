<?php

namespace App\Console\Commands;

use App\Models\Conge;
use App\Models\Mission;
use App\Models\Permission;
use App\Models\RepoMedical;
use App\Models\SortiePersonnel;
use App\Notifications\CongeEndingNotification;
use App\Notifications\MissionEndingNotification;
use App\Notifications\PermissionEndingNotification;
use App\Notifications\ReposEndingNotification;
use App\Notifications\SortiEndingNotification;
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
        // notification conge
        $conges = Conge::whereDate('fincon', '<', now())->get();
        foreach ($conges as $conge) {
            $employee = $conge->emploie;
            if ($employee) {
                $employeeName = $employee->nom;
                $user = $employee->users;
                if ($user) {
                    // Maintenant, vous avez l'objet User associé à la mission.
                    // Vous pouvez utiliser $user pour envoyer des notifications, par exemple.
                    Notification::send($user, new CongeEndingNotification($employeeName));
                }
            }
        }

        // notification permission
        $permissions = Permission::whereDate('finpermi', '<', now())->get();
        foreach ($permissions as $permission) {
            $employee = $permission->emploie;
            if ($employee) {
                $employeeName = $employee->nom;
                $user = $employee->users;
                if ($user) {
                    // Maintenant, vous avez l'objet User associé à la mission.
                    // Vous pouvez utiliser $user pour envoyer des notifications, par exemple.
                    Notification::send($user, new PermissionEndingNotification($employeeName));
                }
            }
        }

        // notification repos
        $reposs = RepoMedical::whereDate('finrep', '<', now())->get();
        foreach ($reposs as $repos) {
            $employee = $repos->emploie;
            if ($employee) {
                $employeeName = $employee->nom;
                $user = $employee->users;
                if ($user) {
                    // Maintenant, vous avez l'objet User associé à la mission.
                    // Vous pouvez utiliser $user pour envoyer des notifications, par exemple.
                    Notification::send($user, new ReposEndingNotification($employeeName));
                }
            }
        }

        // notification sortie
        $sorties = SortiePersonnel::whereDate('finsortie', '<', now())->get();
        foreach ($sorties as $sortie) {
            $employee = $sortie->emploie;
            if ($employee) {
                $employeeName = $employee->nom;
                $user = $employee->users;
                if ($user) {
                    // Maintenant, vous avez l'objet User associé à la mission.
                    // Vous pouvez utiliser $user pour envoyer des notifications, par exemple.
                    Notification::send($user, new SortiEndingNotification($employeeName));
                }
            }
        }
    }
}
