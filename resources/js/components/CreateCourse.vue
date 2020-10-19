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
                    >Curso publicado!</span
                >
            </div>
            <div class="field mb-6">
                <div class="control">
                    <label for="title" class="text-default py-2"
                        >Título del Curso</label
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
                    <label for="body" class="text-default py-2"
                        >Breve descripción del Curso</label
                    >
                    <!-- <textarea> </textarea> -->
                    <markdown-editor
                        class="bg-transparent border border-muted-light rounded p-2 text-sm text-default w-full"
                        ref="body"
                        id="body"
                        placeholder="Ingresa la descripción aquí"
                        rows="8"
                        required
                        toolbar="bold italic heading | image link | numlist bullist code quote | preview fullscreen"
                    ></markdown-editor>
                    <p
                        v-if="errors.description"
                        class="bg-red-300 text-red-600 rounded p-2 m-1"
                    >
                        {{ errors.description[0] }}
                    </p>
                </div>
            </div>
            <div class="fied mb-6">
                <button
                    type="submit"
                    @click.prevent="create"
                    class="button block"
                >
                    Enviar &rarr;
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
            errors: []
        };
    },
    methods: {
        create() {
            const formData = new FormData();
            formData.append("title", this.$refs.title.value);
            formData.append("description", this.$refs.description.value);
            formData.append("user_id", this.userId);

            axios
                .post("/api/courses", formData)
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
            this.$refs.description.value = "";
        }
    }
};
</script>
