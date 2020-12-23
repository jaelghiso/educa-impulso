require("./bootstrap");

import Vue from "vue";
import VueRouter from "vue-router";
import swal from "sweetalert";

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
Vue.component("font-awesome-icon", FontAwesomeIcon);

import DateFilter from "./filters/date";

Vue.filter("date", DateFilter);

import VueSimplemde from "vue-simplemde";
import "simplemde/dist/simplemde.min.css";

Vue.component("vue-simplemde", VueSimplemde);

import Dashboard from "./pages/Dashboard";
import TeacherDashboard from "./pages/Teacher-Dashboard";
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

import CreateEvent from "./components/CreateEvent";

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
            path: "/teacher/readCourse",
            name: "read-course",
            component: ReadCourse,
            props: true
        },
        {
            path: "/teacher/createCourse",
            name: "create-course",
            component: CreateCourse,
            props: true
        },
        {
            path: "/teacher/updateCourse",
            name: "update-course",
            component: UpdateCourse,
            props: true
        },
        {
            path: "/teacher/readSummary",
            name: "read-summary",
            component: ReadSummary,
            props: true
        },
        {
            path: "/teacher/createSummary",
            name: "create-summary",
            component: CreateSummary,
            props: true
        },
        {
            path: "/teacher/updateSummary",
            name: "update-summary",
            component: UpdateSummary,
            props: true
        },
        {
            path: "/teacher/createEvent",
            name: "create-event",
            component: CreateEvent,
            props: true
        }
    ]
});

const app = new Vue({
    el: "#app",
    router,
    components: { Dashboard, TeacherDashboard, Welcome, Homepage }
});
