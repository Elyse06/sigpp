<!DOCTYPE html>
<html>
<head>
    <title>Rapport PDF</title>
</head>
<body>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Top 10 Des Employées Qui à Pris Plus De Repo-Medical</h3>
                </div>

                <div class="card-body p-0">
                    <table class="table table-hover">
                        <tbody>
                            @foreach ($topEmployeesRepos as $employee)
                                <ul>
                                    <li>
                                        <i class="expandable-table-caret fas fa-caret-right fa-fw"></i>
                                        {{ $employee->emploie->nom }} ({{ $employee->conge_count }})
                                        <ul>
                                            @foreach ($employee->emploie->repomedicals as $repos)
                                                <li>
                                                    {{ $repos->motifrep }}: {{ $repos->debutrep }} / {{ $repos->finrep }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                </ul>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </div>
</body>
</html>
