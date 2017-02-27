<template>
    <div>
        <div class="alert alert-danger" v-if="error">
            <p>Couldn't add that zip code.</p>
        </div>
        <div class="alert alert-success" v-if="success">
            <p>Zip Code Added.</p>
        </div>
        <form autocomplete="off" v-on:submit="addZip">
            <div class="form-group">
                <label for="zipcode">Zip Code</label>
                <input type="zipcode" id="zipcode" class="form-control" placeholder="" v-model="zipcode" required>
            </div>
            <button type="submit" class="btn btn-default">Add Zip</button>
        </form>
    </div>
</template>
<script>
    import weather from '../weather.js';

    export default {
        data() {
            return {
                zipcode: null,
                error: false,
                success: false
            }
        },
        methods: {
            addZip(event) {
                event.preventDefault();
                weather.addZip(this, this.zipcode);
            }
        }
    }
</script>