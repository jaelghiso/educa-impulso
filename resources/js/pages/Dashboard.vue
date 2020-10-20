<template>
    <div>
        <nav class="bg-header shadow">
            <div class="container mx-auto">
                <div class="flex justify-between item-center py-3">
                    <a class="flex justify-between item-center">
                        <img
                            :src="logo_src"
                            alt="logo-impulso"
                            class="logo--setup-header"
                        />
                    </a>
                    <div class="flex items-center ml-auto">
                        <router-link
                            :to="{ name: 'read' }"
                            class="text-sm text-white font-bold m-2"
                            >Admin News</router-link
                        >
                        <router-link
                            :to="{ name: 'readCourse' }"
                            class="text-sm text-white font-bold m-2"
                            >Admin Cursos</router-link
                        >
                        <router-link
                            :to="{ name: 'readSummary' }"
                            class="text-sm text-white font-bold m-2"
                            >Admin Temarios</router-link
                        >
                        <router-link
                            :to="{ name: 'home' }"
                            class="text-sm text-white font-bold m-2"
                            >Home</router-link
                        >
                    </div>
                </div>
            </div>
        </nav>
        <div class="container mx-auto mt-2">
            <header class="my-4">
                Bienvenido, {{ userName }}
                <a
                    @click="logout"
                    class="float-right mr-3 button text-white"
                    style="cursor:pointer"
                    >Logout</a
                >
            </header>
            <div class="container mx-auto">
                <div class="flex flex-row">
                    <div class="flex justify-start items-start py-3 my-3 mr-4">
                        <div class="jumbotron mt-4">
                            <h1 class="bg--primary-text py-2">
                                Bienvenido a<br />
                                <span
                                    class="text-yellow-600 text-semibold text-3xl"
                                    >Admin Noticias!</span
                                >
                            </h1>
                            <router-link
                                :to="{ name: 'read' }"
                                class="button my-3"
                                >Administrar &rarr;</router-link
                            >
                            <hr class="py-3 mt-5" />
                            <p class="text-sm my-2">
                                Presiona aquí debajo para crear una nueva
                                Noticia:
                            </p>
                            <router-link
                                :to="{ name: 'create', params: { userId } }"
                                class="button bg--primary-text"
                                >New Post</router-link
                            >
                        </div>
                    </div>
                    <div class="flex justify-around w-9/12 mx-auto">
                        <router-view :userName="userName"></router-view>
                    </div>
                </div>
                <div class="flex flex-row">
                    <div class="flex justify-start items-start py-3 my-3 mr-4">
                        <div class="jumbotron mt-4">
                            <h1 class="bg--primary-text py-2">
                                Bienvenido a<br />
                                <span
                                    class="text-yellow-600 text-semibold text-3xl"
                                    >Admin Cursos!</span
                                >
                            </h1>
                            <router-link
                                :to="{ name: 'readCourse' }"
                                class="button my-3"
                                >Administrar &rarr;</router-link
                            >
                            <hr class="py-3 mt-5" />
                            <p class="text-sm mb-4">
                                Presiona aquí debajo para crear<br />
                                un nuevo Curso o un nuevo Temario:
                            </p>
                            <router-link
                                :to="{ name: 'createCourse', params: { userId } }"
                                class="button bg--primary-text"
                                >New Course</router-link
                            >
                            <router-link
                                :to="{ name: 'createSummary', params: { userId } }"
                                class="button bg--primary-text"
                                >New Summary</router-link
                            >
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <Footer />
    </div>
</template>

<script>
import Footer from "../components/Footer";

export default {
    components: { Footer },
    data() {
        return {
            logo_src: "images/logo-impulso.png"
        };
    },
    props: {
        userId: {
            type: Number,
            required: true
        },
        userName: {
            type: String,
            required: true
        },
        courseId:{
            type: Number,
            required: true
        }
    },
    methods: {
        logout() {
            axios.post("/logout").then(() => {
                window.location = "/";
            });
        }
    }
};
</script>
<style>
.text--bg-primary {
    color: #f5f5f5;
}
</style>
