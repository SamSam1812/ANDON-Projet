import './bootstrap';

import { createApp } from 'vue';
import axios from 'axios';
import HeureEnTempsReel from './components/TimeComponent.vue';
import FormSession from './components/FormSession.vue';
import Home from './components/home.vue';
import Statue from './components/statut.vue';
axios.defaults.baseURL = 'http://localhost:8054';

createApp({
    components: {
        HeureEnTempsReel,
        FormSession,
        Home,
        Statue,
    }
}).mount("#app")


