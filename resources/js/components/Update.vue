<template>
    <div class="mb-4 md:w-8/12 md:mx-auto">
        <form action class="card py-12 px-16 rounded shadow">
            <div class="field">
                <div
                    :class="[
                        'control m-1 p-3',
                        successfull ? 'bg-green-200 rounded' : ''
                    ]"
                >
                    <span v-if="successfull" class="text-green-600"
                        >Noticia actualizada!</span
                    >
                </div>
                <div
                    :class="[
                        'control m-1 p-3',
                        error ? 'bg-red-200 rounded' : ''
                    ]"
                >
                    <span v-if="errors.title" class="text-red-600">{{
                        errors.title[0]
                    }}</span>
                    <span v-if="errors.subtitle" class="text-red-600">{{
                        errors.subtitle[0]
                    }}</span>
                    <span v-if="errors.body" class="text-red-600">{{
                        errors.body[0]
                    }}</span>
                </div>
            </div>

            <div class="field mb-6">
                <div class="control">
                    <label for="title" class="text-default py-2"
                        >Título de la Noticia</label
                    >
                    <input
                        type="title"
                        ref="title"
                        class="bg-transparent border border-muted-light rounded p-2 text-sm text-muted w-full"
                        id="title"
                        placeholder="Ingresa el título"
                        required
                    />
                </div>
            </div>
            <div class="field mb-6">
                <div class="control">
                    <label for="subtitle" class="text-default py-2"
                        >Subtítulo</label
                    >
                    <input
                        type="subtitle"
                        ref="subtitle"
                        class="bg-transparent border border-muted-light rounded p-2 text-sm text-muted w-full"
                        id="subtitle"
                        placeholder="Ingresa el subtítulo"
                        required
                    />
                </div>
            </div>
            <div class="field mb-6">
                <div class="control">
                    <label for="body" class="text-default py-2"
                        >Contenido</label
                    >
                    <textarea
                        id="body"
                        ref="body"
                        rows="15"
                        cols="12"
                        class="bg-transparent border border-muted-light rounded p-2 text-sm text-muted w-full"
                        placeholder="Ingresa el texto de la noticia aquí.."
                        required
                    ></textarea>
                </div>
            </div>
            <div class="field mb-6">
                <button
                    class="button block"
                    type="submit"
                    @click.prevent="update"
                >
                    Actualizar &rarr;
                </button>
            </div>
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
