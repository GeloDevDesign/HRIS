@extends('layouts.app')

@section('styles')
    <style >
        .password-div .label-required::after {
            content: none;
        }

        .file-thumbnail-footer {
            display: none;
        }

        .file-preview {
            width: 45% !important;
        }
    </style >
@endsection

@section('banner')
    <x-banner :current-page="'Edit User'" ></x-banner >
@endsection

@section('content')

    <x-card :heading="'Edit Records Form'" >
        @include('employee.form', [
       'employee' => $record,  // Change this to $record
       'action' => route('employee.records.update', $record)
   ])
    </x-card >

@endsection

@section('scripts')
    <script src="{{ asset('limitless/js/vendor/forms/inputs/passy.js') }}" ></script >
    <script src="{{ asset('limitless/demo/pages/form_controls_extended.js') }}" ></script >


    <script src="{{ asset('limitless/js/vendor/media/cropper.min.js') }}" ></script >

@endsection
