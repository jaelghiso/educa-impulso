<template>
    <div class="container my-5">
        <div class="jumbotron col-md-6 offset-md-3 mt-5">
            <h1 class="mt-3 text-center">EducaImpulso</h1>
            <p class="form-text text-muted mb-4 text-center">
                Registra tu cuenta aquí!
            </p>
            <div class="card-body">
                <form method="POST" action="/register">
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input
                            id="name"
                            type="text"
                            class="form-control"
                            v-model="name"
                            required
                            autofocus
                        />
                        <p v-if="errors.name" class="alert-danger p-2 m-1">
                            {{ errors.name[0] }}
                        </p>
                    </div>
                    <div class="form-group">
                        <label for="email">E-Mail</label>
                        <input
                            id="email"
                            type="email"
                            class="form-control"
                            v-model="email"
                            required
                        />
                        <p v-if="errors.email" class="alert-danger p-2 m-1">
                            {{ errors.email[0] }}
                        </p>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input
                            id="password"
                            type="password"
                            class="form-control"
                            v-model="password"
                            required
                        />
                        <p v-if="errors.password" class="alert-danger p-2 m-1">
                            {{ errors.password[0] }}
                        </p>
                    </div>
                    <div class="form-group">
                        <label for="password-confirm">Confirm Password</label>
                        <input
                            id="password-confirm"
                            type="password"
                            class="form-control"
                            v-model="password_confirmation"
                            required
                        />
                        <p
                            v-if="errors.password_confirmation"
                            class="alert-danger p-2 m-1"
                        >
                            {{ errors.password_confirmation[0] }}
                        </p>
                    </div>

                    <div class="text-center">
                        <button
                            type="submit"
                            class="btn btn--bg-primary"
                            @click.prevent="registro"
                        >
                            Register
                        </button>
                    </div>
                </form>
            </div>
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
