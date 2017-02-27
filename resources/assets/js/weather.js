import Vue from './app.js';
import {router} from './app.js';

export default {
    userWeather: [],
    addZip(context, zipcode) {
        Vue.http.post(
            'api/zipcode',
            {
                zipcode: zipcode,
            }
        ).then(response => {
            context.error = false;
            this.userWeather = response.data;
        }, response => {
            context.error = true;
        })
    },
    getUserWeather(context) {
        Vue.http.get(
            'api/weather'
        ).then(response => {
            context.error = false;
            this.userWeather = response.body.data;
        }, response => {
            context.error = true;
        })
    }
}