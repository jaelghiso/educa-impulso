<template>
    <modal name="new-wwbat" classes="p-10 bg-card rounded-lg" height="auto">
        <h1 class="font-normal mb-16 text-center text-2xl">
            Wwbat Area
        </h1>
        <form @submit.prevent="submit">
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
            <div class="flex">
                <div class="flex-1 mr-4">
                    <div class="mb-4">
                        <label
                            for="description"
                            class="text-default text-sm block mb-2"
                            >Descripción</label
                        >
                        <vue-simplemde
                        class="bg-transparent border border-muted-light rounded p-2 text-sm text-default w-full"
                        ref="markdownEditor"
                        id="description"
                        v-model="content"
                        placeholder="Ingresa la descripción aquí"
                        rows="15"
                        col="10"
                        required
                        />
                        <span
                            v-if="errors.description"
                            class="text-xs text-red-600"
                        >{{ errors.description[0] }}</span>
                    </div>
                </div>
            </div>
            <footer class="flex justify-end">
                <button
                    type="button"
                    class="button is-default mr-4"
                    @click.prevent="$modal.hide('new-wwbat')"
                >
                    Cancelar
                </button>
                <button class="button"
                @click.prevent="create"
                >Ingresar Wwbat Area</button>
            </footer>
        </form>
    </modal>
</template>
<script>
export default {
    props: {
        userId: {
            type: Number,
            required: true
        },
        classId: {
            type: Number,
            required: true
        },
    },
    data() {
        return {
            error: false,
            successful: false,
            errors: [],
            value: '',
        };
    },
    computed: {
        simplemde() {
            return this.$refs.markdownEditor.simplemde;
        },
    },
    mounted(){
        this.simplemde.toTextArea();
    },
    methods: {
        create() {
            const formData = new FormData();
            formData.append("user_id", this.userId);
            formData.append("class_id", this.classId);
            formData.append("description", this.$refs.simplemde.value);


            axios
                .post("/api/wwbat-areas", formData)
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

            this.$refs.simplemde.value = "";

        }
    }
}
</script>
