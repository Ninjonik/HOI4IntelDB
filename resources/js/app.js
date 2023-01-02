import './bootstrap';
import './memberchart';

const channel = Echo.channel("public.playground.1");
channel.subscribed(() => {
    console.log("subscribed");
})


import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
