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
                    :to="{ name: 'read' }"
                    class="nav-item p-2 text-uppercase text-secondary"
                    >Admin</router-link
                >
                <router-link
                    :to="{ name: 'home' }"
                    class="nav-item p-2 text-uppercase text-secondary"
                    >Home</router-link
                >
            </div>
        </nav>
        <div class="container mt-2">
            <header class="d-inline">
                Bienvenido, {{ userName }}
                <p
                    @click="logout"
                    class="float-right mr-3"
                    style="cursor:pointer"
                >
                    Logout <span class="caret"></span>
                </p>
            </header>
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="jumbotron mt-4">
                        <h1 class="bg--primary-text">
                            Bienvenido a
                            <span class="display-5 text-warning text-uppercase">
                                Admin Noticias!</span
                            >
                        </h1>
                        <router-link
                            :to="{ name: 'read' }"
                            class="btn btn--bg-primary mt-2"
                            >Administrar &rarr;</router-link
                        >
                        <hr />
                        <p class="lead">
                            Presiona aquí debajo para crear una nueva Noticia:
                        </p>
                        <router-link
                            :to="{ name: 'create', params: { userId } }"
                            class="btn btn-secondary text-uppercase bg--primary-text"
                            >New Post</router-link
                        >
                    </div>
                </div>
                <div class="col-md-8 col-sm-6">
                    <router-view></router-view>
                </div>
            </div>
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
