<template>
    <div class="divTime">
        <span class="date">{{ currentDate }}</span>
        <span class="date">{{ currentTime }}</span>
    </div>
</template>

<script>
export default {
    data() {
        return {
            currentDate: '',
            currentTime: ''
        };
    },
    methods: {
        updateTime() {
            const now = new Date();
            this.currentDate = now.toLocaleDateString();
            this.currentTime = now.toLocaleTimeString();
        }
    },
    mounted() {
        this.updateTime();
        setInterval(() => {
            this.updateTime();
        }, 1000);
    }
};
</script>
