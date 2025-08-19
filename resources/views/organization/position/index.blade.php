@extends('layouts.app')

@section('banner')
    <x-banner :current-page="'View Benefits'" ></x-banner >
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

    <x-filters :action="route('employee.benefits.index')" :has-users="false" :users="$benefits" :has-daterange="false"
               :has-user-type="false" :has-search="true" :search-placeholder="'Benefits Name'" >

    </x-filters >

    <!-- add user starts here -->
    <x-admin-panel :has-per-page="true" :per-page-route="route('employee.benefits.index')" :filters="$filters" >
        <x-table-container >
            <thead class="table-head" >
            <tr >
                <th class="sorting sorting_asc" tabindex="0" aria-controls="DataTables_Table_1" aria-sort="ascending" >
                    Name
                </th >
                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" >Created At</th >
            </tr >
            </thead >
            <tbody >
            <td >
                SSS
            </td >

            <td >
                2025-08-31
            </td >

            </tbody >
        </x-table-container >
        {{--        <x-table-pagination :action="route('employee.benefit.index')" :filters="$filters"--}}
        {{--                            :collection="$benefits" ></x-table-pagination >--}}
    </x-admin-panel >
    <!-- add user ends here -->
@endsection

