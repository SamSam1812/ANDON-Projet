<template>
    <div class="prod">
        <span class="greenText">Nombre de contenants faits</span>
        <p class="greenNbr">{{ nombreContenants }}</p>
    </div>
    <div class="prod">
        <span class="greenText">Nombre de palettes faites</span>
        <p class="greenNbr">{{ nombrePalettes }}</p>
    </div>
    <div class="prod">
        <span class="greenText">Nombre de cartons faits</span>
        <p class="greenNbr">{{ nombreCartons }}</p>
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
            nombreContenants: 0,
            nombrePalettes: 0,
            nombreCartons: 0,
        };
    },
    mounted() {
        this.fetchData();
        setInterval(this.fetchData, 10000);
        this.CreateData();
        setInterval(this.CreateData, 10800);
        this.CreateDataRegroupeur();
        setInterval(this.CreateDataRegroupeur, 41400);
        this.CreateDataPaletisation();
        setInterval(this.CreateDataPaletisation, 45000);
    },
    methods: {
        fetchData() {
            axios.get(`/api/data/${this.sessionid}`)
                .then(response => {
                    this.nombreContenants = response.data.nombre_contenants;
                    this.nombrePalettes = response.data.nombre_palettes;
                    this.nombreCartons = response.data.nombre_cartons;
                })
                .catch(error => {
                    console.error('Erreur lors de la récupération des données :', error);
                });
        },
        CreateData() {
            try {
                axios.post(`/api/add_fake/${this.sessionid}`, {
                })
            } catch (error) {
                console.error('Erreur lors de la soumission de la production :', error);
            }
        },
        CreateDataRegroupeur() {
            try {
                axios.post(`/api/add_fake_regroupeur/${this.sessionid}`, {
                })
            } catch (error) {
                console.error('Erreur lors de la soumission de la production :', error);
            }
        },
        CreateDataPaletisation() {
            try {
                axios.post(`/api/add_fake_paletisation/${this.sessionid}`, {
                })
            } catch (error) {
                console.error('Erreur lors de la soumission de la production :', error);
            }
        }
    }
}
</script>


