import './bootstrap';

import { createApp } from 'vue';
import axios from 'axios';
import HeureEnTempsReel from './components/TimeComponent.vue';
import FormSession from './components/FormSession.vue';
axios.defaults.baseURL = 'http://localhost:8066';

createApp({
    components: {
        HeureEnTempsReel,
        FormSession
    }
}).mount("#app")


