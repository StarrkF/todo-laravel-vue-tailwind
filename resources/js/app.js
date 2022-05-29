require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


import { createApp } from 'vue'; 
import router from './router'
import TodoIndex from './components/todos/Todo.vue'
import '../css/app.css'


createApp ({
    components: {
        TodoIndex
    }
}).use(router).mount('#app')
