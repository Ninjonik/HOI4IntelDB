import './bootstrap';

import Alpine from 'alpinejs';
import Echo from 'laravel-echo'

window.echo = new Echo({
    broadcaster: "pusher",
    key: import.meta.env.VITE_PUSHER_APP_KEY,
    cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER,
    forceTLS: import.meta.env.PUSHER_USE_TLS,
    wsHost: window.location.hostname,
    wsPort: 6001,
    wssPort: 6001,
    encrypted: import.meta.env.PUSHER_ENCRYPTED,
    disableStats: false,
    enabledTransports: ["ws", "wss"]
})

window.Alpine = Alpine;

Alpine.start();

