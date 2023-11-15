@extends('layouts.master')
@section('contenu')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Top 10 Des Employées Qui à Pris Plus De Sortie</h3>
                    <a href="{{ route('topsortie.generatePDF') }}" class="btn btn-custom">
                        <i class="fas fa-file-pdf" style="color: red;"></i>
                        Générer le PDF
                    </a>
                </div>

                <div class="card-body p-0">
                    <table class="table table-hover">
                        <tbody>
                            @foreach ($topEmployeesSortie as $employee)
                                <tr data-widget="expandable-table" aria-expanded="false">
                                    <td>
                                        <i class="expandable-table-caret fas fa-caret-right fa-fw"></i>
                                        {{ $employee->emploie->nom }} ({{ $employee->sortie_count }})
                                    </td>
                                </tr>
                                <tr class="expandable-body d-none">
                                    <td>
                                        <div class="p-0" style="display: none;">
                                            <table class="table table-hover">
                                                <tbody>
                                                    @foreach ($employee->emploie->sortieperso as $sortie)
                                                        <tr>
                                                            <td>{{ $sortie->motifsortie }}: {{ $sortie->debutsortie }} / {{ $sortie->finsortie }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </div>
@endsection
