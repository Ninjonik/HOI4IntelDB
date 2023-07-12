import './app.js';

let usersOnline = [];

const channel = echo.join("presence.dashboard.lobby.1");
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
    .listen(".lobby", (event) => {
        console.log(event);

        const table = document.getElementById('table');
        const tableBody = document.querySelector("#data tbody");

        if (event.action === "delete" && event.user?.discord_id) {
            const rowToDelete = tableBody.querySelector(`tr[data-discord-id="${event.user.discord_id}"]`);
            if (rowToDelete) {
                tableBody.removeChild(rowToDelete);
            }
        } else {
            const tr = document.createElement("tr");
            tr.setAttribute("data-discord-id", event.user.discord_id);

            const idCell = document.createElement("td");
            idCell.textContent = "1";
            tr.appendChild(idCell);

            const discordIdCell = document.createElement("td");
            discordIdCell.textContent = event.user.discord_id;
            discordIdCell.id = "discord_id";
            tr.appendChild(discordIdCell);

            const nameCell = document.createElement("td");
            nameCell.textContent = event.user.discord_name;
            tr.appendChild(nameCell);

            const countryCell = document.createElement("td");
            countryCell.textContent = event.user.country;
            tr.appendChild(countryCell);

            const ratingCell = document.createElement("td");
            ratingCell.textContent = event.user.rating + "%";
            tr.appendChild(ratingCell);

            const joinedCell = document.createElement("td");
            const joinedDate = new Date(event.user.joined * 1000);
            joinedCell.textContent = joinedDate.toLocaleString();
            tr.appendChild(joinedCell);

            const actionsCell = document.createElement("td");
            const editButton = document.createElement("button");
            editButton.className = "btn btn-xs btn-default text-primary mx-1 shadow";
            editButton.title = "Edit";
            editButton.innerHTML = '<i class="fa fa-lg fa-fw fa-pen"></i>';
            actionsCell.appendChild(editButton);

            const deleteButton = document.createElement("button");
            deleteButton.className = "btn btn-xs btn-default text-danger mx-1 shadow";
            deleteButton.title = "Delete";
            deleteButton.innerHTML = '<i class="fa fa-lg fa-fw fa-trash"></i>';
            actionsCell.appendChild(deleteButton);

            tr.appendChild(actionsCell);

            tableBody.appendChild(tr);
        }
    });
