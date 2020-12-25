<template>
    <div>
        <Header>
        </Header>
        <div class="container mx-auto mt-2">
            <header class="flex flex-row justify-between">
                Bienvenido, {{ userName }}
                <a
                    @click="logout"
                    class="float-right mr-3 button text-white"
                    style="cursor:pointer"
                    >Logout</a
                >
            </header>
        </div>
        <div class="container mx-auto">
            <router-view
                :userName="userName"
                :postAuthor="postAuthor"
            ></router-view>
        </div>
        <Footer />
    </div>
</template>

<script>
import Header from "../components/organisms/Header";
import Footer from "../components/organisms/Footer";
export default {
    components: {
        Header,
        Footer
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
        postAuthor: {
            type: String,
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
