@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Guilds Settings</h1>
@stop

@section('content')
    {{ $slot }}
@stop

@section('css')
    @livewireStyles
    <link rel="stylesheet" href="{!! mix('resources/css/swal.css',) !!}">
@stop

@section('js')
    @livewireScripts
    <script src="{!! mix('resources/js/sweetalert.js') !!}">
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
    </script>

@stop
