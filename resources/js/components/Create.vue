<template>
    <div class="container mb-4">
        <form>
            <div
                :class="[
                    'form-group m-1 p-3',
                    successful ? 'alert-success' : ''
                ]"
            >
                <span v-if="successful" class="label label-sucess"
                    >Noticia publicada!</span
                >
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
                <p v-if="errors.title" class="alert-danger p-2 m-1">
                    {{ errors.title[0] }}
                </p>
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
                <p v-if="errors.subtitle" class="alert-danger p-2 m-1">
                    {{ errors.subtitle[0] }}
                </p>
            </div>

            <div class="form-group">
                <label for="body" class="bg--primary-text">Contenido</label>
                <textarea
                    class="form-control"
                    ref="body"
                    id="body"
                    placeholder="Ingresa el texto del artículo aquí"
                    rows="8"
                    required
                ></textarea>
                <p v-if="errors.body" class="alert-danger p-2 m-1">
                    {{ errors.body[0] }}
                </p>
            </div>
            <div class="form-group">
                <label for="image" class="bg--primary-text"
                    >Imagen de Portada</label
                >
                <div class="custom-file mb-3">
                    <input
                        type="file"
                        ref="image"
                        name="image"
                        class="custom-file-input"
                        id="image"
                        required
                    />
                    <label class="custom-file-label"
                        >Seleccionar archivo...</label
                    >
                </div>
                <p v-if="errors.image" class="alert-danger p-2 m-1">
                    {{ errors.image[0] }}
                </p>
            </div>

            <button
                type="submit"
                @click.prevent="create"
                class="btn btn--bg-primary block"
            >
                Publicar &rarr;
            </button>
        </form>
    </div>
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
            error: false,
            successful: false,
            errors: []
        };
    },
    methods: {
        create() {
            const formData = new FormData();
            formData.append("title", this.$refs.title.value);
            formData.append("subtitle", this.$refs.subtitle.value);
            formData.append("body", this.$refs.body.value);
            formData.append("user_id", this.userId);
            formData.append("image", this.$refs.image.files[0]);

            axios
                .post("/api/posts", formData)
                .then(response => {
                    this.successful = true;
                    this.error = false;
                    this.errors = [];
                })
                .catch(error => {
                    if (!_.isEmpty(error.response)) {
                        if ((error.response.status = 422)) {
                            this.errors = error.response.data.errors;
                            this.successful = false;
                            this.error = true;
                        }
                    }
                });

            this.$refs.title.value = "";
            this.$refs.subtitle.value = "";
            this.$refs.body.value = "";
        }
    }
};
</script>
