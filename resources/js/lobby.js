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
        console.log(event);

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
            const editModeContainer = document.createElement("div");
            editModeContainer.id = `editModeContainer_${event.user.discord_id}`;
            const editModeDiv = document.createElement("div");
            editModeDiv.id = `edit_${event.user.discord_id}`;
            editModeDiv.style.display = "none";
            const inputElement = document.createElement("input");
            inputElement.id = `input_${event.user.discord_id}`;
            inputElement.name = `country_${event.user.discord_id}`;
            inputElement.type = "text";
            inputElement.onblur = () => updateCountry(inputElement.value, event.user.discord_id);
            editModeDiv.appendChild(inputElement);
            editModeContainer.appendChild(editModeDiv);
            const countrySpan = document.createElement("span");
            countrySpan.id = `country_${event.user.discord_id}`;
            countrySpan.textContent = event.user.country;
            editModeContainer.appendChild(countrySpan);
            countryCell.appendChild(editModeContainer);

            const editButton = document.createElement("button");
            editButton.className = "btn btn-xs btn-default text-primary mx-1 shadow";
            editButton.title = "Edit";
            editButton.innerHTML = '<i class="fa fa-lg fa-fw fa-pen"></i>';
            editButton.onclick = () => editMode(event.user.discord_id);
            countryCell.appendChild(editButton);

            tr.appendChild(countryCell);

            const ratingCell = document.createElement("td");
            ratingCell.textContent = event.user.rating + "%";
            tr.appendChild(ratingCell);

            const joinedCell = document.createElement("td");
            const joinedDate = new Date().toLocaleString('de-DE', { day: '2-digit', month: '2-digit', year: 'numeric', hour: '2-digit', minute: '2-digit', second: '2-digit' }).replace(',', '');
            joinedCell.textContent = joinedDate.toLocaleString();
            tr.appendChild(joinedCell);

            const actionsCell = document.createElement("td");
/*
            const editActionButton = document.createElement("button");
            editActionButton.className = "btn btn-xs btn-default text-primary mx-1 shadow";
            editActionButton.title = "Edit";
            editActionButton.innerHTML = '<i class="fa fa-lg fa-fw fa-pen"></i>';
            actionsCell.appendChild(editActionButton);

            const deleteActionButton = document.createElement("button");
            deleteActionButton.className = "btn btn-xs btn-default text-danger mx-1 shadow";
            deleteActionButton.title = "Delete";
            deleteActionButton.innerHTML = '<i class="fa fa-lg fa-fw fa-trash"></i>';
            actionsCell.appendChild(deleteActionButton);
*/
            const viewActionButton = document.createElement("button");
            viewActionButton.className = "btn btn-xs btn-default text-success mx-1 shadow";
            viewActionButton.title = "View";
            viewActionButton.innerHTML = '<i class="fa fa-lg fa-fw fa-eye"></i>';
            const viewActionHref = document.createElement('a');
            viewActionHref.href = 'https://db.theorganization.eu/' + event.user.discord_id;
            viewActionHref.appendChild(viewActionButton)
            actionsCell.appendChild(viewActionHref);

            tr.appendChild(actionsCell);

            tableBody.appendChild(tr);
        }
    });
