<template>
    <div>
        <h1>Laravel 5</h1>
        <add-zip v-if="auth.user.authenticated"></add-zip>
    </div>
</template>

<script>
    import auth from '../auth.js'
    import AddZip from './AddZip.vue';

    export default {
        data() {
            return {
                auth: auth
            }
        },
        methods: {
        },
        components: {
            AddZip
        }
    }
</script>