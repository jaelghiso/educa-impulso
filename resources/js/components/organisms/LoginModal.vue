<template>
    <modal name="login-modal" classes="flex flex-wrap bg-card rounded-lg" height="auto" width="60%">
        <div class="md:w-1/2">
            <img :src="illustration_src"
                alt="illustration-login"
                class=""/>
        </div>
        <div class="md:w-1/2 md:mx-auto mt-6">
            <div class="flex justify-center mt-4">
                <img
                    :src="logo_src"
                    alt="logo-impulso"
                    class=" logo--setup-header"
                />
            </div>
            <h1 class="text-3xl font-normal mb-10 text-hero font-bold text-center">
                EducaImpulso
            </h1>
            <p class="text-muted mb-4 text-center">
                Bienvenido Editor! Ingresa a tu cuenta
            </p>
            <form
                action=""
                id="formLogin"
                class="card py-12 px-16"
            >
                <div class="field mb-6">
                    <div class="control">
                        <label for="inputEmail" class="text-muted pb-2"
                            >Usuario</label
                        >
                        <input
                            type="email"
                            v-model="user"
                            class="bg-transparent border border-muted-light rounded p-2 text-sm text-muted w-full"
                            id="inputEmail"
                            aria-describedby="emailHelp"
                            placeholder="Ingresa tu email"
                        />
                        <p
                            v-if="errors.email"
                            class="bg-red-300 text-red-600 rounded p-2 m-1"
                        >
                            {{ errors.email[0] }}
                        </p>
                    </div>
                </div>
                <div class="field mb-6">
                    <div class="control">
                        <label for="inputPassword" class="text-muted pb-2"
                            >Contraseña</label
                        >
                        <input
                            type="password"
                            v-model="pass"
                            class="bg-transparent border border-muted-light rounded p-2 text-sm text-muted w-full"
                            id="inputPassword"
                            placeholder="Ingresa tu contraseña"
                        />
                        <p
                            v-if="errors.password"
                            class="red-300 text-red-600 p-2 m-1"
                        >
                            {{ errors.password[0] }}
                        </p>
                    </div>
                </div>
                <div class="field mb-6">
                    <div class="control">
                        <input
                            type="checkbox"
                            class="form-check-input"
                            id="inputCheck"
                        />
                        <label for="inputCheck" class="text-sm"
                            >Recordarme</label
                        >
                    </div>
                </div>
                <div class="flex justify-center field mb-6">
                    <div class="col-md-8 offset-md-4 text-center">
                        <button
                            class="button mr-2"
                            type="submit"
                            @click.prevent="iniciarSesion"
                        >
                            Entrar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </modal>
</template>
<script>
export default {
    props: {
        userId: {
            type: Number,
            required: true
        }
    },
    data() {
        return {
            logo_src: "./images/logo-impulso.png",
            illustration_src: "./images/illustration-login.png",
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
                .then(response => {
                    console.log(response);
                    swal({
                        title: "Has iniciado sesión",
                        text: this.user,
                        closeOnClickOutside: true,
                        closeOnEsc: true
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
