<template>
    <div class="mb-4 mt-3 md:w-8/12 md:mx-auto">
        <form action class="card mt-4 py-12 px-16 rounded shadow">
            <div class="field">
                <div
                    :class="[
                        'control m-1 p-3',
                        successfull ? 'bg-green-200 rounded' : ''
                    ]"
                >
                    <span v-if="successfull" class="text-green-600"
                        >Temario actualizado!</span
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
                        >Título de la Clase o Módulo</label
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
                        >Temas de la Clase o Módulo</label
                    >
                    <textarea
                        class="bg-transparent border border-muted-light rounded p-2 text-sm text-default w-full"
                        ref="description"
                        id="description"
                        rows="15"
                        col="10"
                        required
                    />
                </div>
            </div>
            <div class="flex justify-start field mb-6">
                <router-link :to="{ name: 'read-course'}">
                    <button
                    type="button"
                    class="button is-default mr-4"
                    >
                    Cancelar
                    </button>
                </router-link>
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
        this.getSummary();
    },
    props: {
        summaryId: {
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
                .put("/api/summaries/" + this.summaryId, { title, description })
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
            this.$refs.title.value = "";
            this.$refs.description.value = "";
        },
        getSummary() {
            axios.get("/api/summaries/" + this.summaryId).then(response => {
                this.$refs.title.value = response.data.data.title;
                this.$refs.description.value = response.data.data.description;
            });
        }
    }
};
</script>
