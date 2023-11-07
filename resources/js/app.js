import "./bootstrap";

import { createApp } from 'vue/dist/vue.esm-bundler';

import ExampleCounter from "./components/ExampleCounter.vue";

const app = createApp({});

app.component("example-counter", ExampleCounter);

const mountedApp = app.mount("#app");
