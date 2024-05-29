<template>
    <div class="statue_machine">
        <span>POLYPROD</span>
        <div v-if="bp1 === 1">
            <div class="red_circle"></div>
        </div>
        <div v-else>
            <div class="green_circle"></div>
        </div>
    </div>
    <div class="statue_machine">
        <span>PESEUSE</span>
        <div v-if="bp2 === 1">
            <div class="red_circle"></div>
        </div>
        <div v-else>
            <div class="green_circle"></div>
        </div>
    </div>
    <div class="statue_machine">
        <span>REGROUPEUR</span>
        <div v-if="bp3 === 1">
            <div class="red_circle"></div>
        </div>
        <div v-else>
            <div class="green_circle"></div>
        </div>
    </div>
    <div class="statue_machine">
        <span>PALETISATION</span>
        <div v-if="bp4 === 1">
            <div class="red_circle"></div>
        </div>
        <div v-else>
            <div class="green_circle"></div>
        </div>
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
            appel1:0,
            appel2:0,
            appel3:0,
            appel4:0,
            bp1:false,
            bp2:false,
            bp3:false,
            bp4:false,
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
                    this.appel1 = response.data.appel_1;
                    this.appel2 = response.data.appel_2;
                    this.appel3 = response.data.appel_3;
                    this.appel4 = response.data.appel_4;
                    this.bp1 = response.data.bp_1;
                    this.bp2 = response.data.bp_2;
                    this.bp3 = response.data.bp_3;
                    this.bp4 = response.data.bp_4;

                })
                .catch(error => {
                    console.error('Erreur lors de la récupération des données :', error);
                });
        }
    }
}
</script>

