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
                    <h3 class="card-title">Top 10 Des Employées Qui à Pris Plus De Sortie</h3>
                </div>

                <div class="card-body p-0">
                    <table class="table table-hover">
                        <tbody>
                            @foreach ($topEmployeesSortie as $employee)
                                <ul>
                                    <li>
                                        <i class="expandable-table-caret fas fa-caret-right fa-fw"></i>
                                        {{ $employee->emploie->nom }} ({{ $employee->sortie_count }})
                                        <ul>
                                            @foreach ($employee->emploie->sortieperso as $sortie)
                                                <li>
                                                    {{ $sortie->motifsortie }}: {{ $sortie->debutsortie }} / {{ $sortie->finsortie }}
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
