import Vue from './app.js';
import {router} from './app.js';

export default {
    addZip(context, zipcode) {
        Vue.http.post(
            'api/zipcode',
            {
                zipcode: zipcode,
            }
        ).then(response => {
            context.error = false;
            context.success = true;
            context.zipcode = null;
            router.push({
                name: 'home'
            })
        }, response => {
            context.error = true;
        })
    },
}