<template>
    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron">
                <h2>Add zip codes</h2>
                <div class="alert alert-danger alert-dismissible fade show" role="alert" v-if="error">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <p>Couldn't add that zip code.</p>
                </div>
                <div class="alert alert-success alert-dismissible fade show" role="alert" v-if="success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
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
        </div>

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