<template>
    <div class="mb-4">
        <form action class="md:mx-auto card py-12 px-16 rounded shadow">
            <div
                :class="[
                    'control m-1 p-3',
                    successful ? 'bg-green-200 rounded' : ''
                ]"
            >
                <span v-if="successful" class="text-green-600"
                    >Noticia publicada!</span
                >
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
                    <p
                        v-if="errors.title"
                        class="bg-red-300 text-red-600 rounded p-2 m-1"
                    >
                        {{ errors.title[0] }}
                    </p>
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
                    <p
                        v-if="errors.subtitle"
                        class="bg-red-300 text-red-600 rounded p-2 m-1"
                    >
                        {{ errors.subtitle[0] }}
                    </p>
                </div>
            </div>
            <div class="field mb-6">
                <div class="control">
                    <label for="body" class="text-default py-2"
                        >Contenido</label
                    >
                    <vue-simplemde
                        class="bg-transparent border border-muted-light rounded p-2 text-sm text-default w-full"
                        ref="body"
                        id="body"
                        v-model="value"
                        rows="15"
                        col="10"
                        placeholder="Ingresa el texto del artículo aquí"
                        required
                    />
                    <p
                        v-if="errors.body"
                        class="bg-red-300 text-red-600 rounded p-2 m-1"
                    >
                        {{ errors.body[0] }}
                    </p>
                </div>
            </div>
            <div class="field mb-6">
                <div class="control">
                    <label for="image" class="text-default py-2"
                        >Imagen de Portada</label
                    >
                    <div class="border mb-3">
                        <input
                            type="file"
                            ref="image"
                            name="image"
                            class="bg-transparent border border-muted-light rounded p-2 text-sm text-muted"
                            id="image"
                            required
                        />
                        <label class="px-3">Seleccionar archivo...</label>
                    </div>
                    <p
                        v-if="errors.image"
                        class="bg-red-300 text-red-600 rounded p-2 m-1"
                    >
                        {{ errors.image[0] }}
                    </p>
                </div>
            </div>
            <div class="fied mb-6">
                <button
                    type="submit"
                    @click.prevent="create"
                    class="button block"
                >
                    Publicar &rarr;
                </button>
            </div>
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
            errors: [],
            value: '',
            options: {
                className: "button text-white text-sm"
            }
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
