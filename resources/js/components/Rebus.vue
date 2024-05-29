<template>
        <div style="display: flex; gap: 10px; align-items: center">
            <span class="redNbr">{{ rebus }}</span>
            <span style="color: #EB1F20;">REBUT PESEUSE</span>
        </div>
        <div class="prod">
            <span class="blueText" style="margin-bottom: 3px">Tps Arrêts non programmés</span>
            <p class="opeNbr">3</p>
        </div>
</template>

<script>
import axios from 'axios';

export default {
    props: {
        sessionid: Number
    },
    data() {
        return {
            rebus:0,
        };
    },
    mounted() {
        this.fetchData();
        setInterval(this.fetchData, 10000);
    },
    methods: {
        fetchData() {
            axios.get(`/api/data/${this.sessionid}`)
                .then(response => {
                    this.rebus = response.data.rebus;
                })
                .catch(error => {
                    console.error('Erreur lors de la récupération des données :', error);
                });
        }
    }
}
</script>
