@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Settings</h1>
@stop
@section('content')
    {{ $slot }}
@stop

@section('css')
    @livewireStyles
    <link rel="stylesheet" href="{{ url('/resources/css/swal.css') }}">
@stop

@section('js')
    @livewireScripts
    <script src="{{ url('/resources/js/sweetalert.js') }}">
    </script>
    @vite('resources/js/app.js')
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 4000
        });
        window.addEventListener("close-modal", event => {
            $("#modal-guild").modal("hide");
            $("#edit-modal-guild").modal("hide");
            $("#delete-modal-guild").modal("hide");
            $("#view-modal-guild").modal("hide");
            $("#modal").modal("hide");
            $("#edit-modal").modal("hide");
            $("#delete-modal").modal("hide");
            $("#view-modal").modal("hide");
        });
        window.addEventListener("guild-added", event => {
            Toast.fire({
                icon: 'success',
                title: 'New guild has been successfully added!',
            })
        });
        window.addEventListener("guild-updated", event => {
            Toast.fire({
                icon: 'success',
                title: 'New guild has been successfully updated!',
            })
        });
        window.addEventListener("guild-removed", event => {
            Toast.fire({
                icon: 'success',
                title: 'Guild has been successfully removed!',
            })
        });
        window.addEventListener("show-edit-guild-modal", event => {
            $("#edit-modal-guild").modal("show");
        });
        window.addEventListener("show-delete-guild-modal", event => {
            $("#delete-modal-guild").modal("show");
        });
        window.addEventListener("show-view-guild-modal", event => {
            $("#view-modal-guild").modal("show");
        });
        const button = document.getElementById("add");
        button.addEventListener('click', function() {
            $("#modal").modal("show");
            $("#modal-guild").modal("show");
        });
        const close_button = document.getElementById("close");
        button.addEventListener('click', function() {
            $("#modal-guild").modal("hide");
            $("#edit-modal-guild").modal("hide");
            $("#delete-modal-guild").modal("hide");
            $("#view-modal-guild").modal("hide");
            $("#modal").modal("hide");
            $("#edit-modal").modal("hide");
            $("#delete-modal").modal("hide");
            $("#view-modal").modal("hide");
        });

        window.addEventListener("added", event => {
            Toast.fire({
                icon: 'success',
                title: 'New record has been successfully added!',
            })
        });
        window.addEventListener("updated", event => {
            Toast.fire({
                icon: 'success',
                title: 'Record has been successfully updated!',
            })
        });
        window.addEventListener("removed", event => {
            Toast.fire({
                icon: 'success',
                title: 'Record has been successfully removed!',
            })
        });
        window.addEventListener("show-edit-modal", event => {
            $("#edit-modal").modal("show");
        });
        window.addEventListener("show-delete-modal", event => {
            $("#delete-modal").modal("show");
        });
        window.addEventListener("show-view-modal", event => {
            $("#view-modal").modal("show");
        });

    </script>

@stop
