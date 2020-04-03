<template>
    <div>
        <div class="container mt-2">
            <header class="d-inline">
                Bienvenido, {{ userName }}
                <p
                    @click="logout"
                    class="bg--primary-text"
                    style="cursor:pointer"
                >
                    Logout <span class="caret"></span>
                </p>
            </header>
        </div>
        <div class="container">
            <router-view></router-view>
        </div>
    </div>
</template>
<script>
export default {
    props: {
        userId: {
            type: Number,
            required: true
        },
        userName: {
            type: String,
            required: true
        }
    },
    data() {
        return {};
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
