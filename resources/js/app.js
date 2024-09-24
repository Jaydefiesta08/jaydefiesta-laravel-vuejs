import { createApp } from "vue"; // Vue 3 uses createApp
import App from "./components/App.vue";
import { createRouter, createWebHistory } from "vue-router"; // Vue Router 4 uses named exports
import VueAxios from "vue-axios";
import axios from "axios";
import { routes } from "./routes";

// Create the Vue app
const app = createApp(App);

// Create the router
const router = createRouter({
    history: createWebHistory(),
    routes: routes,
});

// Use the router and axios plugins
app.use(router);
app.use(VueAxios, axios);

// Mount the app
app.mount("#app");
