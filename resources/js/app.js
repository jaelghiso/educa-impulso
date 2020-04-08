require("./bootstrap");

import Vue from "vue";
import VueRouter from "vue-router";
import swal from "sweetalert";

import Dashboard from "./pages/Dashboard";
import Welcome from "./pages/Welcome";
import Homepage from "./pages/Homepage";

import News from "./pages/News";

import Login from "./pages/Login";
import Register from "./pages/Register";

import Read from "./components/Read";
import Create from "./components/Create";
import Update from "./components/Update";
import Comments from "./components/Comments";

Vue.use(VueRouter);

const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/",
            name: "home",
            props: true
        },
        {
            path: "/news",
            name: "news",
            component: News,
            props: true
        },
        {
            path: "/login",
            name: "login",
            component: Login,
            props: true
        },
        {
            path: "/register",
            name: "register",
            component: Register,
            props: true
        },
        {
            path: "/admin/dashboard",
            name: "read",
            component: Read,
            props: true
        },
        {
            path: "/admin/create",
            name: "create",
            component: Create,
            props: true
        },
        {
            path: "/admin/update",
            name: "update",
            component: Update,
            props: true
        }
    ]
});

const app = new Vue({
    el: "#app",
    router,
    components: { Dashboard, Welcome, Homepage, Comments }
});
