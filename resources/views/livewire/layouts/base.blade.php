@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Settings</h1>
@stop
@section('content')
    {{ $slot }}
@stop

@section('plugins.Select2', true)

@section('css')
    @livewireStyles
    <link rel="stylesheet" href="{{ url('/css/swal.css') }}">
@stop

@section('js')
    @livewireScripts
    <script src="{{ url('/js/sweetalert.js') }}">
    </script>
    @vite('resources/js/app.js')
    <script>

        function hideModal(){
            $("#modal-guild").modal("hide");
            $("#edit-modal-guild").modal("hide");
            $("#delete-modal-guild").modal("hide");
            $("#view-modal-guild").modal("hide");
            $("#modal").modal("hide");
            $("#edit-modal").modal("hide");
            $("#delete-modal").modal("hide");
            $("#ban-modal").modal("hide");
            $("#view-modal").modal("hide");
            $("#playerRecordsModal").modal("hide");
            $("#guilds-modal").modal("hide");
            console.log("hiding")
        }

        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 4000
        });
        window.addEventListener("close-modal", event => {
            hideModal();
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
        window.addEventListener("guild-edited", event => {
            Toast.fire({
                icon: 'success',
                title: 'Guild has been successfully updated!',
            })
        });
        window.addEventListener("guild-not-edited", event => {
            Toast.fire({
                icon: 'error',
                title: 'There has been an error while processing your changes. They have not been applied to discord.',
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
            hideModal();
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
        window.addEventListener("banned", event => {
            Toast.fire({
                icon: 'success',
                title: 'User successfully banned!',
            })
        });
        window.addEventListener("unbanned", event => {
            Toast.fire({
                icon: 'success',
                title: 'User successfully unbanned!',
            })
        });
        window.addEventListener("banned-error", event => {
            Toast.fire({
                icon: 'error',
                title: 'There has been an error while banning/unbanning this user. Contact HOI4Intel support.',
            })
        });
        window.addEventListener("show-edit-modal", event => {
            $("#edit-modal").modal("show");
        });
        window.addEventListener("show-delete-modal", event => {
            $("#delete-modal").modal("show");
        });
        window.addEventListener("show-ban-modal", event => {
            $("#ban-modal").modal("show");
        });
        window.addEventListener("show-view-modal", event => {
            $("#view-modal").modal("show");
        });

        window.addEventListener('openPlayerRecordsModal', event => {
            console.log("Opening the modal with");
            $('#playerRecordsModal').modal('show');
        });

        window.addEventListener("show-guilds-modal", event => {
            $("#guilds-modal").modal("show");
        })

    </script>

    <script>
        $(document).ready(function() {
            $('#banInfoModal').on('show.bs.modal', function(event) {
                let button = $(event.relatedTarget);
                let banHost = button.data('ban-host');
                let banDate = button.data('ban-date');
                let banReason = button.data('ban-reason');

                let modal = $(this);
                modal.find('#banHost').text('Banned by: ' + banHost);
                modal.find('#banDate').text('Banned on: ' + banDate);
                modal.find('#banReason').text('Reason: ' + banReason);
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>

@stop
