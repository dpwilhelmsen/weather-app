<template>
    <div>
        <header>

            <!--Navbar-->
            <nav class="navbar navbar-toggleable-md navbar-dark bg-primary">
                <div class="container">
                    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav1" aria-controls="navbarNav1" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <a class="navbar-brand" href="#">
                        <strong>Weather App</strong>
                    </a>
                    <div class="collapse navbar-collapse" id="navbarNav1">
                        <ul class="navbar-nav mr-auto">
                            <router-link tag="li" :to="{ name: 'home' }" class="nav-item" active-class="active" exact>
                                <a class="nav-link">Home</a>
                            </router-link>
                        </ul>
                        <ul class="navbar-nav ml-auto">
                            <router-link tag="div" :to="{ name: 'register' }" class="nav-item" active-class="active" v-if="!auth.user.authenticated">
                                <a class="nav-link">Register</a>
                            </router-link>
                            <router-link tag="li" :to="{ name: 'login' }" class="nav-item" active-class="active" v-if="!auth.user.authenticated">
                                <a class="nav-link">Login</a>
                            </router-link>
                            <li class="nav-item" v-if="auth.user.authenticated">
                                <span class="nav-link">Hi, {{ auth.user.profile.name }}</span>
                            </li>
                            <li class="nav-item pull-right" v-if="auth.user.authenticated">
                                <a class="nav-link" href="javascript:void(0)" v-on:click="logout">Log out</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!--/.Navbar-->

        </header>
        <main>
            <router-view></router-view>
        </main>
    </div>
</template>

<script>
    import auth from '../auth.js'

    export default {
        data() {
            return {
                auth: auth
            }
        },
        methods: {
            logout() {
                auth.logout()
            }
        },
        mounted: function () {
            this.$nextTick(function () {
                auth.check()
                debugger;
            })
        }
    }
</script>