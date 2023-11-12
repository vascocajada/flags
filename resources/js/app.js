import "./bootstrap";

import { createApp } from 'vue/dist/vue.esm-bundler';
import { createAuth0 } from '@auth0/auth0-vue';

import FlagApp from "./components/FlagApp.vue";

const app = createApp({});

app.use(
    createAuth0({
        domain: "dev-n3axx2z7c054q5dc.us.auth0.com",
        clientId: "ABv7YDDQnDfb5OkqCQ2Ll96nDWxZaxOb",
        authorizationParams: {
            redirect_uri: 'http://localhost',
            audience: "https://github.com/auth0/flag-app",
        }
    })
)

app.component("flag-app", FlagApp);

const mountedApp = app.mount("#app");
