import "./bootstrap";

import { createApp } from 'vue/dist/vue.esm-bundler';
import { createAuth0 } from '@auth0/auth0-vue';

import FlagApp from "./components/FlagApp.vue";

const app = createApp({});

app.use(
    createAuth0({
        domain: "dev-u5qudu3bjhw1qjdt.us.auth0.com",
        clientId: "PX04fsszF5YWdyVUFAWgx4MZvyqERzQA",
        authorizationParams: {
            redirect_uri: 'http://localhost',
            audience: "https://github.com/auth0/laravel-auth0",
        }
    })
)

app.component("flag-app", FlagApp);

const mountedApp = app.mount("#app");
