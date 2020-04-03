<template>
    <div class="container mb-4">
        <form action>
            <div
                :class="[
                    'form-group m-1 p-3',
                    successfull ? 'alert-success' : ''
                ]"
            >
                <span v-if="successfull" class="label label-sucess"
                    >Noticia actualizada!</span
                >
            </div>
            <div :class="['form-group m-1 p-3', error ? 'alert-danger' : '']">
                <span v-if="errors.title" class="label label-danger">{{
                    errors.title[0]
                }}</span>
                <span v-if="errors.subtitle" class="label label-danger">{{
                    errors.subtitle[0]
                }}</span>
                <span v-if="errors.body" class="label label-danger">{{
                    errors.body[0]
                }}</span>
            </div>

            <div class="form-group">
                <label for="title" class="bg--primary-text"
                    >Título de la Noticia</label
                >
                <input
                    type="title"
                    ref="title"
                    class="form-control"
                    id="title"
                    placeholder="Ingresa el título"
                    required
                />
            </div>
            <div class="form-group">
                <label for="subtitle" class="bg--primary-text">Subtítulo</label>
                <input
                    type="subtitle"
                    ref="subtitle"
                    class="form-control"
                    id="subtitle"
                    placeholder="Ingresa el subtítulo"
                    required
                />
            </div>
            <div class="form-group">
                <label for="body" class="bg--primary-text">Contenido</label>
                <textarea
                    id="body"
                    ref="body"
                    rows="15"
                    class="form-control"
                    placeholder="Ingresa el texto de la noticia aquí.."
                    required
                ></textarea>
            </div>

            <button
                class="btn btn--bg-primary"
                type="submit"
                @click.prevent="update"
            >
                Actualizar &rarr;
            </button>
        </form>
    </div>
</template>

<script>
export default {
    mounted() {
        this.getPost();
    },
    props: {
        postId: {
            type: Number,
            required: true
        }
    },
    data() {
        return {
            error: false,
            successfull: false,
            errors: []
        };
    },
    methods: {
        update() {
            let title = this.$refs.title.value;
            let subtitle = this.$refs.subtitle.value;
            let body = this.$refs.body.value;

            axios
                .put("/api/posts/" + this.postId, { title, subtitle, body })
                .then(response => {
                    this.successfull = true;
                    this.error = false;
                    this.errors = [];
                })
                .catch(error => {
                    if (!_.isEmpty(error.response)) {
                        if ((error.response.status = 422)) {
                            this.errors = error.response.data.errors;
                            this.successfull = false;
                            this.error = true;
                        }
                    }
                });
        },
        getPost() {
            axios.get("/api/posts/" + this.postId).then(response => {
                this.$refs.title.value = response.data.data.title;
                this.$refs.subtitle.value = response.data.data.subtitle;
                this.$refs.body.value = response.data.data.body;
            });
        }
    }
};
</script>
