<template>
    <div>
        <Header />

        <div class="container mx-auto py-4">
            <router-view></router-view>
        </div>

        <Footer />
    </div>
</template>
<script>
import Header from "../components/Header";
import Footer from "../components/Footer";

export default {
    components: {
        Header,
        Footer
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
