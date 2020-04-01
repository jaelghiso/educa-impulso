<template>
    <div>
        <nav
            id="navbar"
            class="navbar navbar-expand-md navbar-light bg-white shadow-sm"
        >
            <div class="container">
                <div class="col-md-3">
                    <img src="" alt="logo-impulso" />
                    <p class="bg--primary-text">
                        {{ address }}
                    </p>
                    <p class="bg--primary-text">{{ location }}</p>
                    <p class="bg--primary-text">{{ phone }}</p>
                </div>
                <div class="col-md-6">
                    <ul class="ml-auto">
                        <li class="p-2 bg--primary-text">Inicio</li>
                        <li class="p-2 bg--primary-text">Inscripciones</li>
                        <li class="p-2 bg--primary-text">Contacto</li>
                    </ul>
                    <ul>
                        <li class="p-2 bg--primary-text">Institución</li>
                        <li class="p-2 bg--primary-text">Fundación</li>
                    </ul>
                    <ul>
                        <li class="p-2">Testimonios</li>
                        <li class="p-2 bg--primary-text">Newsletter</li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <div class="d-inline">
                        <a class="p-1" href="">Instagram</a>
                        <a class="p-1" href="">Twitter</a>
                        <a class="p-1" href="">Facebook</a>
                        <a class="p-1" href="">Web</a>
                    </div>
                    <div class="form-group">
                        <input
                            type="text"
                            class="form-control"
                            placeholder="Ingresa tu email"
                        />
                        <p class="bg--primary-text">
                            {{ newsText }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="py-5 bg--dark-blue">
                <div class="container">
                    <p class="m-0 text-center text-white">
                        {{ copyright }}
                    </p>
                </div>
            </div>
        </nav>
    </div>
</template>
<style>
* {
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
}
#nav {
    color: #0e1753;
    position: relative;
    top: 95vh;
    bottom: 0;
    right: 0;
    left: 15%;
    padding: 20px;
    background-color: #ffc907;
}
</style>
<script>
export default {
    data() {
        return {
            address:
                "Avda. Gral. San Martín 4722 Esq. Gilberto Bellini, CP. 12300.",
            location: "Montevideo, Uruguay",
            phone: "Teléfono: (+598) 2216 0050",
            copyright: "Copyright &copy; Great Idea South 2020",
            newsText:
                "Permanece en contacto con nosotros para conocer las últimas noticias!"
        };
    }
};
</script>
