<template>
    <div>
        <add-zip v-if="auth.user.authenticated"></add-zip>
        <weather-cards v-if="auth.user.authenticated"></weather-cards>
    </div>
</template>

<script>
    import auth from '../auth.js'
    import AddZip from './AddZip.vue';
    import WeatherCards from './WeatherCards.vue';

    export default {
        data() {
            return {
                auth: auth
            }
        },
        methods: {
        },
        components: {
            AddZip,
            WeatherCards
        }
    }
</script>