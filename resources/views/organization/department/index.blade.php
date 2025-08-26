@extends('layouts.app')

@section('banner')
    <x-banner :current-page="'View Department'" ></x-banner >
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
        <a href="{{route('employee.benefits.create')}}" >
            <x-button type="button" class="btn-primary pull-right me-2" :action="'add'" >Add New Benefits</x-button >
        </a >
    </div >

    <x-filters :action="route('employee.benefits.index')" :has-users="false" :users="$departments"
               :has-daterange="false" :has-user-type="false" :has-search="true" :search-placeholder="'Benefits Name'" >

    </x-filters >

    <!-- add user starts here -->
    <x-admin-panel :has-per-page="true" :per-page-route="route('employee.benefits.index')" :filters="$filters" >
        <x-table-container >
            <thead class="table-head" >
            <tr >
                <th class="sorting sorting_asc" tabindex="0" aria-controls="DataTables_Table_1" aria-sort="ascending" >
                    Name
                </th >
                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" >Description</th >
                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" >Manager Assigned</th >
                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" >Action</th >
            </tr >
            </thead >
            <tbody >
            @if ($departments->count() > 0)
                @foreach ($departments as $index => $department)
                    <tr >

                        <td >{{ $department->department_name ?? 'N/A' }}</td >
                        <td >{{ $department->description ?? 'N/A' }}</td >
                        <td >{{ $department->user->first_name . $department->user->last_name  ?? 'N/A' }}</td >
                        <td >
                            {{-- Example actions --}}
                            <x-entity-actions :edit="true"
                                              :view-route="route('organization.department.show', $department)"
                                              :edit-id="$department->id" :entity-id="$department->id"
                                              :view-unit="true" />
                        </td >
                    </tr >
                @endforeach
            @else
                <tr >
                    <td colspan="5" class="text-center" >No Department Available</td >
                </tr >
            @endif
            </tbody >

        </x-table-container >
        {{--        <x-table-pagination :action="route('employee.benefit.index')" :filters="$filters"--}}
        {{--                            :collection="$benefits" ></x-table-pagination >--}}
    </x-admin-panel >
    <!-- add user ends here -->
@endsection

