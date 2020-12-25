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
            logo_src: "./images/logo-impulso.png"
        };
    }
};
</script>
