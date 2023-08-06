<!DOCTYPE html>
<html>
<head>
    <title>Data Request</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 6px;
        }

        th {
            background-color: #f2f2f2;
        }

        h1, h2 {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
<h1>Data Request - {{ $player->discord_name }}</h1>

<h2>Usr</h2>
<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Profile Photo Path</th>
        <th>Github ID</th>
        <th>Discord ID</th>
        <th>Guilds</th>
    </tr>
    <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->profile_photo_path }}</td>
        <td>{{ $user->github_id }}</td>
        <td>{{ $user->discord_id }}</td>
        <td>{{ $user->guilds }}</td>
    </tr>
</table>

<h2>Player Information</h2>
<table>
    <tr>
        <th>Discord ID</th>
        <th>Rating</th>
        <th>Profile Link</th>
        <th>Status</th>
        <th>Discord Name</th>
        <th>Currency</th>
    </tr>
    <tr>
        <td>{{ $player->discord_id }}</td>
        <td>{{ $player->rating }}</td>
        <td>{{ $player->profile_link }}</td>
        <td>{{ $player->status }}</td>
        <td>{{ $player->discord_name }}</td>
        <td>{{ $player->currency }}</td>
    </tr>
</table>

<h2>Player Records</h2>
<table>
    <tr>
        <th>Player ID</th>
        <th>Guild ID</th>
        <th>Host ID</th>
        <th>Rating</th>
        <th>Country</th>
    </tr>
    @foreach($playerRecords as $record)
        <tr>
            <td>{{ $record->player_id }}</td>
            <td>{{ $record->guild_id }}</td>
            <td>{{ $record->host_id }}</td>
            <td>{{ $record->rating }}</td>
            <td>{{ $record->country }}</td>
        </tr>
    @endforeach
</table>

<h2>Bans</h2>
<table>
    <tr>
        <th>Player ID</th>
        <th>Guild ID</th>
        <th>Host ID</th>
        <th>Reason</th>
    </tr>
    @foreach($bans as $ban)
        <tr>
            <td>{{ $ban->player_id }}</td>
            <td>{{ $ban->guild_id }}</td>
            <td>{{ $ban->host_id }}</td>
            <td>{{ $ban->reason }}</td>
        </tr>
    @endforeach
</table>

</body>
</html>
