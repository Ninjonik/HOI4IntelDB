import './app.js';

const form = document.getElementById("form");
const inputMessage = document.getElementById("input-message");
form.addEventListener("submit", function(event){
    event.preventDefault();
    const userInput = inputMessage.value;
    axios.post("/dashboard/chat/send", {
        message: userInput
    });
    inputMessage.value = "";
});

const avatars = document.getElementById("avatars")

function userInitial(username){
    const names = username.split(" ");
    return names.map((name) => name[0]).join("".toUpperCase())
}

function renderAvatars(){
    avatars.textContent = "";
    let i = 0
    usersOnline.forEach((user) =>{
        const colors = [
            "primary",
            "secondary",
            "success",
            "danger",
            "warning",
            "info"
        ]
        const span = document.createElement("span");
        span.classList.add("badge", "badge-" + colors[i] + "", "m-1");
        span.textContent = userInitial(user.name);
        avatars.append(span);
        if(i === 5){
            i = 0;
        }
        i++
    })
}

const channel = echo.join("presence.dashboard.staff_chat.1");
let usersOnline = [];
const listMessage = document.getElementById("listMessage");
channel.here((users) => {
    usersOnline = [...users];
    renderAvatars();
    console.log({users})
    console.log("subscribed");
})
    .joining((user) => {
        console.log({user}, "joined")
    })
    .leaving((user) => {
        console.log({user}, "left")
    })
    .listen(".staff_chat", (event)=> {
    console.log(event);
    const message = event.message;
    const name = event.user.name;
    const email = event.user.email;
    const mainDiv = document.createElement("div");
    mainDiv.classList.add("direct-chat-msg");
    const userDiv = document.createElement("div");
    userDiv.classList.add("direct-chat-infos", "clearfix");
    const usernameSpan = document.createElement("span");
    usernameSpan.classList.add("direct-chat-name", "float-left");
    usernameSpan.textContent = name;
    const timeSpan = document.createElement("span");
    timeSpan.classList.add("direct-chat-timestamp", "float-right");
    timeSpan.textContent = email;
    userDiv.appendChild(usernameSpan);
    userDiv.appendChild(timeSpan);
    mainDiv.appendChild(userDiv);
    const img = document.createElement("img");
    img.classList.add("direct-chat-img");
    img.src="https://static.thenounproject.com/png/574704-200.png"
    mainDiv.appendChild(img);
    const messageDiv = document.createElement("div");
    messageDiv.classList.add("direct-chat-text");
    messageDiv.textContent=message
    mainDiv.appendChild(messageDiv);
    listMessage.append(mainDiv);
})


