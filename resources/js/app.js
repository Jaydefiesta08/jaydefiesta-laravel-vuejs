import { createApp } from "vue";
import App from "./components/App.vue";
import { createRouter, createWebHistory } from "vue-router";
import VueAxios from "vue-axios";
import axios from "axios";
import { routes } from "./routes";
import Toast from "vue-toastification";
import "vue-toastification/dist/index.css"; // Make sure the CSS is loaded
import "bootstrap/dist/js/bootstrap.bundle.min.js";

const app = createApp(App);

const router = createRouter({
    history: createWebHistory(),
    routes: routes,
});

app.use(router);
app.use(VueAxios, axios);
app.use(Toast); // Ensure Toast plugin is initialized

app.mount("#app");
