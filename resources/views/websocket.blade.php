<!DOCTYPE html>
<html lang="en">
<head>
    @vite('resources/js/app.js')
    <meta name="csrf-token" content="csrf_token()">
</head>
<body>

<h1>My First Heading</h1>
<p>My first paragraph.</p>

<table class="table table-hover text-nowrap" id="guilds">
    <thead>
    <tr>
        <th>ID</th>
        <th>GuildID</th>
        <th>Guild Name</th>
        <th>Created</th>
        <th>Updated</th>
        <th>Verify</th>
        <th>Verify Channel</th>
        <th>Verify Roles</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
            <tr>
                <th>id</th>
                <th>guildId</th>
                <th>serverName</th>
                <th>created_at</th>
                <th>updated_at</th>
                <th>verify</th>
                <th>verifyChannel</th>
                <th>verifyRoles</th>
                <th>
                    <button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit" wire:click="editGuild(id)">
                        <i class="fa fa-lg fa-fw fa-pen"></i>
                    </button>
                    <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete" wire:click="deleteConfirmation(id)">
                        <i class="fa fa-lg fa-fw fa-trash"></i>
                    </button>
                    <button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                        <i class="fa fa-lg fa-fw fa-eye"></i>
                    </button>
                </th>
            </tr>
            <tr>
                <th>id</th>
                <th>guildId</th>
                <th>serverName</th>
                <th>created_at</th>
                <th>updated_at</th>
                <th>verify</th>
                <th>verifyChannel</th>
                <th>verifyRoles</th>
                <th>
                    <button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit" wire:click="editGuild(id)">
                        <i class="fa fa-lg fa-fw fa-pen"></i>
                    </button>
                    <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete" wire:click="deleteConfirmation(id)">
                        <i class="fa fa-lg fa-fw fa-trash"></i>
                    </button>
                    <button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                        <i class="fa fa-lg fa-fw fa-eye"></i>
                    </button>
                </th>
            </tr>
        <tr>

        </tr>
    </tbody>
</table>

</body>
</html>
