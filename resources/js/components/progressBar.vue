<template>
    <div class="progress-container">
        <div
            class="progress-bar"
            :style="{ width: global_trs + '%' }"
            :class="progressBarClass"
            id="myBar"
        ></div>
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
            global_trs: 0,
        };
    },
    computed: {
        progressBarClass() {
            if (this.global_trs < 50) {
                return 'progress-red';
            } else if (this.global_trs < 75) {
                return 'progress-yellow';
            } else {
                return 'progress-green';
            }
        },
    },
    mounted() {
        this.fetchData();
        setInterval(this.fetchData, 10000);
    },
    methods: {
        fetchData() {
            axios.get(`/api/TRS/${this.sessionid}`)
                .then(response => {
                    this.global_trs = response.data.global_trs * 100;
                })
                .catch(error => {
                    console.error('Erreur lors de la récupération des données :', error);
                });
        },
    }
}
</script>

<style>
    .progress-bar {
        height: 55px;
        border-radius: 7px;
        transition: width 0.5s;
    }

    .progress-red {
        background-color: #EB1F20;
    }

    .progress-yellow {
        background-color: yellow;
    }

    .progress-green {
        background-color: #93CE56;
    }
</style>
