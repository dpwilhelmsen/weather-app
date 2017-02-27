<template>
    <div>
        <hr class="extra-margins">
        <h2>Current weather for your zip codes</h2><br><br>
        <div class="row" v-for="chunk in chunkedItems">
            <div class="col-lg-4" v-for="info in chunk">
                <!--Card-->
                <div class="card">

                    <!--Card image-->
                    <div class="view overlay hm-white-slight">
                        <span class="weather-icon-wrap" v-html="getIcon(info.weather[0].id)"></span>
                        <a href="#">
                            <div class="mask"></div>
                        </a>
                    </div>
                    <!--/.Card image-->

                    <!--Card content-->
                    <div class="card-block">
                        <!--Title-->
                        <h4 class="card-title">{{ info.name }} - {{ info.zipcode }}</h4>
                        <!--Text-->
                        <p class="card-text">
                            <span style="text-transform:capitalize;">{{ info.weather[0].description }}</span><br><br>
                            <strong>Current Temp:</strong> {{ info.main.temp }}° F<br>
                            <strong>Humidity:</strong> {{ info.main.humidity }} %<br>
                            <strong>Wind:</strong> {{ info.wind.speed }} MPH<br>
                        </p>
                    </div>
                    <!--/.Card content-->

                </div>
                <!--/.Card-->
            </div>
        </div>
    </div>
</template>
<script>
    import weather from '../weather.js';
    import icons from '../data/icons.js';

    export default{
        data(){
            return{
                weather: weather,
                error: false,
                success: false
            }
        },

        computed: {
            chunkedItems () {
                return _.chunk(this.weather.userWeather, 3);
            }
        },

        methods: {
            getIcon(code) {
                var prefix = 'wi wi-';
                var icon = icons[code].icon;

                // If we are not in the ranges mentioned above, add a day/night prefix.
                if (!(code > 699 && code < 800) && !(code > 899 && code < 1000)) {
                    icon = 'day-' + icon;
                }

                // Finally tack on the prefix.
                return "<i class='"+prefix + icon+"'></i>";
            }
        },

        mounted: function () {
            this.$nextTick(function () {
                weather.getUserWeather(this)
            })
        }
    }
</script>
