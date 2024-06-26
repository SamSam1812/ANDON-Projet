import './bootstrap';

import { createApp } from 'vue';
import axios from 'axios';
import HeureEnTempsReel from './components/TimeComponent.vue';
import FormSession from './components/FormSession.vue';
import Home from './components/home.vue';
import Statue from './components/statut.vue';
import Rebus from './components/Rebus.vue';
import ProgressBar from './components/progressBar.vue'
axios.defaults.baseURL = 'http://localhost:8054';

createApp({
    components: {
        HeureEnTempsReel,
        FormSession,
        Home,
        Statue,
        Rebus,
        ProgressBar,
    }
}).mount("#app")


