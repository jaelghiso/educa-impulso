<template>
    <div class="container">
        <div class="jumbotron col-md-6 offset-md-3 mt-5">
            <h1 class="mt-3 text-center">EducaImpulso</h1>
            <p class="form-text text-muted mb-4 text-center">
                Bienvenido Editor! Ingresa a tu cuenta
            </p>
            <div class="card">
                <div class="card-body">
                    <form action="" id="formLogin">
                        <div class="form-group">
                            <label for="inputEmail">Usuario</label>
                            <input
                                type="email"
                                v-model="user"
                                class="form-control"
                                id="inputEmail"
                                aria-describedby="emailHelp"
                                placeholder="Ingresa tu email"
                            />
                            <p v-if="errors.email" class="alert-danger p-2 m-1">
                                {{ errors.email[0] }}
                            </p>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword">Contraseña</label>
                            <input
                                type="password"
                                v-model="pass"
                                class="form-control"
                                id="inputPassword"
                                placeholder="Ingresa tu contraseña"
                            />
                            <p
                                v-if="errors.password"
                                class="alert-danger p-2 m-1"
                            >
                                {{ errors.password[0] }}
                            </p>
                        </div>
                        <div class="form-group form-check">
                            <input
                                type="checkbox"
                                class="form-check-input"
                                id="inputCheck"
                            />
                            <label for="inputCheck" class="form-check-label"
                                >Recordarme</label
                            >
                        </div>
                        <div class="text-center">
                            <button
                                class="btn btn--bg-primary"
                                type="submit"
                                @click.prevent="iniciarSesion"
                            >
                                Entrar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            user: "",
            pass: "",
            error: false,
            errors: []
        };
    },
    methods: {
        iniciarSesion() {
            axios
                .post("/login", {
                    email: this.user,
                    password: this.pass
                })
                .then(() => {
                    swal({
                        title: "Has iniciado sesión",
                        text: this.user,
                        icon: "success",
                        closeOnClickOutside: false,
                        closeOnEsc: false
                    }).then(selected => {
                        if (selected) {
                            window.location = "/";
                        }
                    });
                })
                .catch(error => {
                    if (!_.isEmpty(error.response)) {
                        if ((error.response.status = 422)) {
                            this.errors = error.response.data.errors;
                            this.error = true;
                        }
                    }
                });
            this.user = "";
            this.pass = "";
        }
    }
};
</script>
