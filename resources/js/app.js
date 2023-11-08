import "./bootstrap";

import { createApp } from 'vue/dist/vue.esm-bundler';

import FlagApp from "./components/FlagApp.vue";

const app = createApp({});

app.component("flag-app", FlagApp);

const mountedApp = app.mount("#app");
