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

                    <!-- Right side of Navbar -->
                    <div class="flex items-center ml-auto">
                        <router-link
                            :to="{ name: 'login' }"
                            class="text-sm text-muted-light text-white font-bold m-2"
                        >
                            Acceder</router-link
                        >
                        <router-link
                            :to="{ name: 'register' }"
                            class="text-sm text-muted-light text-white font-bold m-2"
                            >Registrarse</router-link
                        >
                    </div>
                </div>
            </div>
        </nav>
    </div>
</template>
<script>
export default {
    data() {
        return {
            logo_src: "images/logo-impulso.png"
        };
    }
};
</script>
