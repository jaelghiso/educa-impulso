<template>
    <div>
        <Header />
        <div class="container flex justify-end mx-auto mt-2">
            <button class="text-sm text-default font-bold m-2" type="button"
                @click.prevent="$modal.show('login-modal')"
            >
                Acceder
            </button> 
            <!-- <router-link
            :to="{ name: 'login' }"
            class=""
            >Acceder</router-link> -->
            <router-link
            :to="{ name: 'register' }"
            class="text-sm text-default font-bold m-2"
            >Registrarse</router-link>
        </div>
        <login-modal></login-modal>
        <div class="container mx-auto py-4">
            <router-view></router-view>
        </div>

        <Footer />
    </div>
</template>
<script>
import Header from "../components/organisms/Header";
import Footer from "../components/organisms/Footer";
import LoginModal from "../components/organisms/LoginModal";

export default {
    components: {
        Header,
        Footer,
        LoginModal
    }
};
</script>
<style>
* {
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
}

.bg--dark-blue {
    background-color: #0e1753;
}
.card--bg-grey {
    background-color: #f5f5f5;
}
.bg--primary-text {
    color: #0e1753;
}
.bg--purple-text {
    color: #422c6b;
}
.btn--bg-primary {
    background-color: #422c6b;
    padding: 8px 18px;
    border-radius: 4px;
    color: #f5f5f5;
}
.text--bg-primary {
    color: #f5f5f5;
}
</style>
