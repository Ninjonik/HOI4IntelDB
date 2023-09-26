import './app.js';

let usersOnline = [];

const channel = echo.join("presence.dashboard.lobby." + window.lobbyId);
console.log(channel);
channel.here((users) => {
    usersOnline = [...users];
    console.log({ users });
    console.log("subscribed");
})
    .error((error) => {
        console.log(error);
    })
    .joining(() => {
        // websocket fetch current data
    })
    .leaving(() => {
        console.log("left");
    })
    .listen(".lobby." + window.lobbyId, (event) => {
        if (event.action === "delete" && event.user?.discord_id) {
            Livewire.emit("playerLeft", event.user.discord_id)
        } else {
            Livewire.emit("playerJoined", event.user)
        }
    });
