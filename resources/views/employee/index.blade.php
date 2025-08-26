@extends('layouts.app')

@section('banner')
    <x-banner :current-page="'Employee List'" ></x-banner >
@endsection

{{-- @section('styles')
    <style>
        .datatable-header {
            display: flex;
            margin-bottom: 25px;
        }

        .dataTables_length, .dataTables_filter {
            width: 50% !important;
        }

        .dataTables_filter label{
            width: 100%;
            padding-right: 15px;
        }

        td.actions {
            width: 150px !important;
        }

        .dataTables_info {
            padding: 17px 0;
        }

        @media only screen and (max-width: 1024px) {
            .dataTables_length, .dataTables_filter {
                width: 100% !important;
            }

            .card {
                overflow-x: scroll;
            }

        }
    </style>
@endsection --}}

@section('content')
    <div class="text-end mb-4" >
        <a href="{{route('employee.records.create')}}" >
            <x-button type="button" class="btn-primary pull-right me-2" :action="'add'" >Add New Employee</x-button >
        </a >
    </div >

    <x-filters :action="route('employee.records.index')" :has-users="false" :users="$employees" :has-daterange="false"
               :has-user-type="false" :has-search="true" :search-placeholder="'Employee Name'" >

    </x-filters >

    <!-- add user starts here -->
    <x-admin-panel :has-per-page="true" :per-page-route="route('employee.records.index')" :filters="$filters" >
        <x-table-container >
            <thead class="table-head" >
            <tr >
                <th class="sorting sorting_asc" tabindex="0" aria-controls="DataTables_Table_1" aria-sort="ascending" >
                    Employee ID
                </th >

                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" >Name</th >
                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" >Position</th >
                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" >Employment Type</th >
                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" >Employment Status</th >
                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" >Hire Date</th >
                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" >Action</th >
            </tr >
            </thead >
            <tbody >
            @forelse($employees as $employee)
                <tr >
                    <td >{{ $employee->employee_number ?? 'N/A' }}</td >
                    <td >
                        {{ $employee->user->first_name . ' ' . ($employee->user->middle_name ?? '') . ' ' . $employee->user->last_name }}
                    </td >
                    <td >
                        {{ $employee->positions->isNotEmpty() ? $employee->positions->pluck('title')->implode(', ') : 'N/A' }}
                    </td >
                    <td >{{ $employee->employment_type }}</td >
                    <td >{{ $employee->employment_status }}</td >
                    <td >{{ \Carbon\Carbon::parse($employee->hire_date)->format('Y-m-d') }}</td >

                    <td >
                        <x-entity-actions :edit="route('employee.records.edit', $employee->id)"
                                          :entity-id="'employee-' . $employee->id"
                                          :delete="route('employee.records.destroy', $employee->id)"
                                          :name="$employee->first_name . ' ' . $employee->last_name" >
                            <a href="{{ route('employee.records.show', $employee->id) }}" type="button"
                               title="View Details"
                               class="btn btn-warning edit-btn btn-action btn-no-radius btn-square" >
                                <i class="fas fa-id-card" aria-hidden="true" style="margin-right: 0;" ></i >
                            </a >
                        </x-entity-actions >
                    </td >

                </tr >
            @empty
                <tr >
                    <td colspan="7" class="text-center" >No employees found</td >
                </tr >
            @endforelse
            </tbody >

        </x-table-container >
        {{--        <x-table-pagination :action="route('employee.benefit.index')" :filters="$filters"--}}
        {{--                            :collection="$benefits" ></x-table-pagination >--}}
    </x-admin-panel >
    <!-- add user ends here -->
@endsection

