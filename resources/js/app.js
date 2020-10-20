require("./bootstrap");

import Vue from "vue";
import VueRouter from "vue-router";
import "v-markdown-editor/dist/v-markdown-editor.css";
import swal from "sweetalert";

import Editor from "v-markdown-editor";

Vue.use(Editor);

import { library } from "@fortawesome/fontawesome-svg-core";
import {
    faFacebookF,
    faTwitter,
    faInstagram
} from "@fortawesome/free-brands-svg-icons";
import {
    faGlobe,
    faCommentDots,
    faHeart
} from "@fortawesome/free-solid-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";

library.add(
    faFacebookF,
    faTwitter,
    faInstagram,
    faGlobe,
    faCommentDots,
    faHeart
);

import DateFilter from "./filters/date";

Vue.filter("date", DateFilter);

import Dashboard from "./pages/Dashboard";
import Welcome from "./pages/Welcome";
import Homepage from "./pages/Homepage";

import News from "./pages/News";
import SingleNews from "./components/SingleNews";

import Login from "./pages/Login";
import Register from "./pages/Register";

import Read from "./components/Read";
import Create from "./components/Create";
import Update from "./components/Update";

import ReadCourse from "./components/ReadCourse";
import CreateCourse from "./components/CreateCourse";
import UpdateCourse from "./components/UpdateCourse";

import ReadSummary from "./components/ReadSummary";
import CreateSummary from "./components/CreateSummary";
import UpdateSummary from "./components/UpdateSummary";

Vue.component("font-awesome-icon", FontAwesomeIcon);

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
            path: "/news",
            name: "news",
            component: News,
            props: true
        },
        {
            path: "/news/single",
            name: "single",
            component: SingleNews,
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
        },
        {
            path: "/admin/dashboard",
            name: "readCourse",
            component: ReadCourse,
            props: true
        },
        {
            path: "/admin/createCourse",
            name: "createCourse",
            component: CreateCourse,
            props: true
        },
        {
            path: "/admin/updateCourse",
            name: "updateCourse",
            component: UpdateCourse,
            props: true
        },
        {
            path: "/admin/dashboard",
            name: "readSummary",
            component: ReadSummary,
            props: true
        },
        {
            path: "/admin/createSummary",
            name: "createSummary",
            component: CreateSummary,
            props: true
        },
        {
            path: "/admin/updateSummary",
            name: "updateSummary",
            component: UpdateSummary,
            props: true
        }
    ]
});

const app = new Vue({
    el: "#app",
    router,
    components: { Dashboard, Welcome, Homepage }
});
