<template>
    <div>
        <nav class="navbar navbar-expand-md shadow-sm bg--dark-blue">
            <a class="navbar-brand">
                <img
                    src="/images/logo+impulso.png"
                    alt="logo-impulso"
                    height="80px;"
                />
            </a>
            <div class="navbar-nav ml-auto">
                <router-link
                    :to="{ name: 'home' }"
                    class="nav-item p-2 text-uppercase text-secondary"
                    >Home</router-link
                >
                <router-link
                    :to="{ name: 'login' }"
                    class="nav-item p-2 text-uppercase text-white"
                    >Acceder</router-link
                >
                <router-link
                    :to="{ name: 'register' }"
                    class="nav-item p-2 text-uppercase text-white"
                    >Registrarse</router-link
                >
            </div>
        </nav>

        <div class="container">
            <router-view></router-view>
        </div>
        <footer>
            <nav id="navbar" class="navbar navbar-expand-md shadow-sm">
                <div class="container">
                    <div class="col-md-3 col-sm-12">
                        <img
                            src="/images/logo+impulso.png"
                            alt="logo-impulso"
                            height="80px;"
                        />
                        <p class="m-2 bg--primary-text">
                            Avda. Gral. San Martín 4722 Esq. Gilberto Bellini,
                            CP. 12300.
                        </p>
                        <p class="m-2 bg--primary-text">Montevideo, Uruguay</p>
                        <p class="m-2 bg--primary-text">
                            Teléfono: (+598) 2216 0050
                        </p>
                    </div>
                    <div
                        class="col-md-6 col-sm-12 d-flex justify-content-around"
                    >
                        <ul class="nav flex-column">
                            <li class="nav-item p-1 bg--primary-text">
                                Inicio
                            </li>
                            <li class="nav-item p-1 bg--primary-text">
                                Inscripciones
                            </li>
                            <li class="nav-item p-1 bg--primary-text">
                                Contacto
                            </li>
                        </ul>
                        <ul class="nav flex-column">
                            <li class="nav-item p-1 bg--primary-text">
                                Institución
                            </li>
                            <li class="nav-item p-1 bg--primary-text">
                                Fundación
                            </li>
                        </ul>
                        <ul class="nav flex-column">
                            <li class="nav-item p-1">Testimonios</li>
                            <li class="nav-item p-1 bg--primary-text">
                                Newsletter
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-3 col-sm-12">
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
                            <p class="p-1 bg--primary-text">
                                Permanece en contacto con nosotros para conocer
                                las últimas noticias!
                            </p>
                        </div>
                    </div>
                </div>
            </nav>
            <div class="py-2 bg--dark-blue">
                <div class="col-md-12 col-sm-12">
                    <p class="m-0 text-center text-white">
                        Copyright &copy; Great Idea South 2020
                    </p>
                </div>
            </div>
        </footer>
    </div>
</template>
<style>
* {
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
}
#navbar {
    color: #0e1753;
    height: auto;
    padding: 20px;
    background-color: #ffc907;
}
.bg--dark-blue {
    background-color: #0e1753;
}
.bg--primary-text {
    color: #0e1753;
}
.btn--bg-primary {
    background-color: #422c6b;
    padding: 8px 18px;
    border-radius: 4px;
    color: #f5f5f5;
}
</style>
<script>
export default {};
</script>
