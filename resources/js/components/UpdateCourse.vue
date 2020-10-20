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
                        >Curso actualizado!</span
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
                    <span v-if="errors.description" class="text-red-600">{{
                        errors.description[0]
                    }}</span>
                </div>
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
                </div>
            </div>
            <div class="field mb-6">
                <div class="control">
                    <label for="description" class="text-default py-2"
                        >Breve descripción del Curso</label
                    >
                    <markdown-editor
                        class="bg-transparent border border-muted-light rounded p-2 text-sm text-default w-full"
                        ref="description"
                        id="description"
                        rows="15"
                        required
                        toolbar="bold italic heading | image link | numlist bullist code quote | preview fullscreen"
                    ></markdown-editor>
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
        this.getCourse();
    },
    props: {
        courseId: {
            type: Number,
            required: true
        }
    },
    data() {
        return {
            error: false,
            successfull: false,
            errors: [],
        };
    },
    methods: {
        update() {
            let title = this.$refs.title.value;
            let body = this.$refs.description.value;

            axios
                .put("/api/courses/" + this.courseId, { title, description })
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
        getCourse() {
            axios.get("/api/courses/" + this.courseId).then(response => {
                this.$refs.title.value = response.data.data.title;
                this.$refs.description.value = response.data.data.description;
            });
        }
    }
};
</script>
