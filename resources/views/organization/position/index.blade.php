@extends('layouts.app')

@section('banner')
    <x-banner :current-page="'View position'"></x-banner>
@endsection

@section('content')
    <div class="text-end mb-4">
        <a href="{{ route('organization.position.create') }}">
            <x-button type="button" class="btn-primary pull-right me-2" :action="'add'">Add New Position</x-button>
        </a>
    </div>

    <x-filters
        :action="route('organization.position.index')"
        :has-users="false"
        :users="$positions"
        :has-daterange="false"
        :has-user-type="false"
        :has-search="true"
        :search-placeholder="'Position Name'">
    </x-filters>

    <!-- add user starts here -->
    <x-admin-panel :has-per-page="true" :per-page-route="route('organization.position.index')" :filters="$filters">
        <x-table-container>
            <thead class="table-head">
            <tr>
                <th>Name</th>
                <th>Department</th>
                <th>Base Salary</th>

            </tr>
            </thead>
            <tbody>
            @forelse ($positions as $position)
                <tr>
                    <td>{{ $position->title }}</td>
                    <td>{{ $position->department->department_name ?? 'N/A' }}</td>
                    <td>{{ number_format($position->base_salary, 2) }}</td>

                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">No positions found.</td>
                </tr>
            @endforelse
            </tbody>
        </x-table-container>

        <x-table-pagination
            :action="route('organization.position.index')"
            :filters="$filters"
            :collection="$positions">
        </x-table-pagination>
    </x-admin-panel>
    <!-- add user ends here -->
@endsection
