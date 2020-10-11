<template>
    <div class="jumbotron">
        <div class="col-md-8 offset-md-4 text-center">
            <h1 class="text-2xl font-normal mb-10 text-muted text-center">
                EducaImpulso
            </h1>
            <p class="text-muted mb-4 text-center">
                Registra tu cuenta aquí!
            </p>
            <form
                method="POST"
                action="/register"
                class="md:w-1/2 md:mx-auto card py-12 px-16 rounded shadow"
            >
                <div class="field mb-6">
                    <label for="name" class="text-default text-sm mb-2 block"
                        >Nombre</label
                    >
                    <input
                        id="name"
                        type="text"
                        class="bg-transparent border border-muted-light rounded p-2 text-xs text-muted w-full"
                        v-model="name"
                        placeholder="John Doe"
                        required
                        autofocus
                    />
                    <p v-if="errors.name" class="alert-danger p-2 m-1">
                        {{ errors.name[0] }}
                    </p>
                </div>
                <div class="field mb-6">
                    <label for="email" class="text-default text-sm mb-2 block"
                        >E-Mail</label
                    >
                    <input
                        id="email"
                        type="email"
                        class="bg-transparent border border-muted-light rounded p-2 text-xs text-muted w-full"
                        v-model="email"
                        placeholder="john.doe@gmail.com"
                        required
                    />
                    <p v-if="errors.email" class="alert-danger p-2 m-1">
                        {{ errors.email[0] }}
                    </p>
                </div>
                <div class="field mb-6">
                    <label
                        for="password"
                        class="text-default text-sm mb-2 block"
                        >Contraseña</label
                    >
                    <input
                        id="password"
                        type="password"
                        class="bg-transparent border border-muted-light rounded p-2 text-xs text-muted w-full"
                        v-model="password"
                        placeholder="Contraseña"
                        required
                    />
                    <p v-if="errors.password" class="alert-danger p-2 m-1">
                        {{ errors.password[0] }}
                    </p>
                </div>
                <div class="field mb-6">
                    <label
                        for="password-confirm"
                        class="text-default text-sm mb-2 block"
                        >Confirmar Contraseña</label
                    >
                    <input
                        id="password-confirm"
                        type="password"
                        class="bg-transparent border border-muted-light rounded p-2 text-xs text-muted w-full"
                        v-model="password_confirmation"
                        placeholder="Confirmar Contraseña"
                        required
                    />
                    <p
                        v-if="errors.password_confirmation"
                        class="alert-danger p-2 m-1"
                    >
                        {{ errors.password_confirmation[0] }}
                    </p>
                </div>
                <div class="field mb-6">
                    <div class="text-center">
                        <button
                            type="submit"
                            class="button is-link mr-2"
                            @click.prevent="registro"
                        >
                            Registrarse
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            name: "",
            email: "",
            password: "",
            password_confirmation: "",
            error: false,
            errors: []
        };
    },
    methods: {
        registro() {
            axios
                .post("/register", {
                    name: this.name,
                    email: this.email,
                    password: this.password,
                    password_confirmation: this.password_confirmation
                })
                .then(() => {
                    swal({
                        title: "Te has registrado!",
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
            this.password = "";
            this.password_confirmation = "";
        }
    }
};
</script>
