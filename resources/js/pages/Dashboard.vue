<template>
    <div>
        <Header />
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
            <div class="container md:flex md:flex-wrap mx-auto">
                <div class="flex flex-col w-3/12 justify-start">
                    <div class="py-3 my-3 mr-4">
                        <div class="jumbotron mt-4">
                            <h1 class="bg--primary-text py-2">
                                ¡Bienvenido a<br />
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
                                class="button"
                                >New Post</router-link
                            >
                        </div>
                    </div>
                    
                </div>
                <div class="flex flex-col w-9/12">
                    <div class="content-start mx-5">
                        <router-view :userName="userName"></router-view>
                    </div>
                </div>
            </div>

        </div>
        <Footer />
    </div>
</template>

<script>
import Header from "../components/organisms/Header";
import Footer from "../components/organisms/Footer";

export default {
    components: { Footer, Header },
    data() {
        return {
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
