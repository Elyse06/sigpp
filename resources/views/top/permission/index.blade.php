@extends('layouts.master')
@section('contenu')
    <div class="row w-100">
        <div class="col-12 w-100">
            <div class="card w-100">
                <div class="card-header" style="background-color: #4A8B2C">
                    <h3 class="card-title" style="color: white">Top 10 des employées qui ont pris plus de Permission</h3>
                    <a style="float: right;color: white"  href="{{ route('toppermission.generatePDF') }}" class="btn btn-custom">
                        <i class="fas fa-file-pdf" style="color: red;"></i>
                        Générer le PDF
                    </a>
                </div>

                <div class="card-body p-0">
                    <table class="table table-hover">
                        <tbody>
                            @foreach ($topEmployeesPermissions as $employee)
                                <tr data-widget="expandable-table" aria-expanded="false">
                                    <td>
                                        <i class="expandable-table-caret fas fa-caret-right fa-fw"></i>
                                        {{ $employee->emploie->nom }} ({{ $employee->permission_count }})
                                    </td>
                                </tr>
                                <tr class="expandable-body d-none">
                                    <td>
                                        <div class="p-0" style="display: none;">
                                            <table class="table table-hover">
                                                <tbody>
                                                    @foreach ($employee->emploie->permissions as $permission)
                                                        <tr>
                                                            <td>{{ $permission->motifpermi }}: {{ $permission->debutpermi }} / {{ $permission->finpermi }}</td>
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
