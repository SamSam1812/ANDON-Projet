<template>
    <div>
        <form @submit.prevent="submitProduction">
            <div class="inputSession">
                <label for="nbr_operateur">Nombre d'opérateurs :</label>
                <input type="number" id="nbr_operateur" v-model="nbr_operateur" required>
            </div>
            <div class="inputSession">
                <label for="nbr_palette">Nombre de palettes :</label>
                <input type="number" id="nbr_palette" v-model="nbr_palette" required>
            </div>
            <div class="inputSession">
                <label for="nbr_cartons">Nombre de cartons :</label>
                <input type="number" id="nbr_cartons" v-model="nbr_cartons" required>
            </div>
            <div class="inputSession">
                <label for="nbr_contenant">Nombre de contenants :</label>
                <input type="number" id="nbr_contenant" v-model="nbr_contenant" required>
            </div>
            <div class="inputSession">
                <label for="estimatedTime">Temps prévisionnel :</label>
                <input type="time" id="estimatedTime" v-model="estimatedTime" required>
            </div>
            <div class="inputSession">
                <label for="stop_time">Temps d'arrêt prévu :</label>
                <input type="time" id="stop_time" v-model="stop_time" required>
            </div>
            <div class="inputSession">
                <label for="name_chief">Nom du responsable :</label>
                <input type="text" id="name_chief" v-model="name_chief" required>
            </div>
            <div style="display: grid; justify-items: center; margin-top: 20px">
                <button class="historiqueButton" type="submit">Lancer la production</button>
            </div>
        </form>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            nbr_operateur: null,
            nbr_palette: null,
            nbr_cartons: null,
            nbr_contenant: null,
            name_chief: null,
            estimatedTime: null,
            stop_time : null
        };
    },
    methods: {
        async submitProduction() {
            try {
                await axios.post('/api/production', {
                    nbr_operateur: this.nbr_operateur,
                    nbr_palette: this.nbr_palette,
                    nbr_cartons: this.nbr_cartons,
                    nbr_contenant: this.nbr_contenant,
                    estimatedTime: this.estimatedTime,
                    name_chief: this.name_chief,
                    stop_time: this.stop_time
                }).then((res) => {
                    window.location.href = res.data.redirect
                })
            } catch (error) {
                console.error('Erreur lors de la soumission de la production :', error);
            }
        },

    }
};
</script>
