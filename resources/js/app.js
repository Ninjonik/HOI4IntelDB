import './bootstrap';

import Alpine from 'alpinejs';
import Echo from 'laravel-echo'

window.echo = new Echo({
    broadcaster: "pusher",
    key: import.meta.env.VITE_PUSHER_APP_KEY,
    cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER,
    forceTLS: JSON.parse(import.meta.env.VITE_PUSHER_USE_TLS),
    wsHost: window.location.hostname,
    wsPort: parseInt(import.meta.env.VITE_PUSHER_PORT),
    wssPort: parseInt(import.meta.env.VITE_PUSHER_PORT_ENCRYPTED),
    encrypted: JSON.parse(import.meta.env.VITE_PUSHER_ENCRYPTED),
    disableStats: false,
    enabledTransports: ["ws", "wss"]
})

console.log(window.echo)

window.Alpine = Alpine;

Alpine.start();

