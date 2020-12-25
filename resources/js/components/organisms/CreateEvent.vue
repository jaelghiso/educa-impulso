<template>
    <div class="mb-4 mt-3">
        <form action class="md:mx-auto card mt-4 py-12 px-16 rounded shadow">
            <div
                :class="[
                    'control m-1 p-3',
                    successful ? 'bg-green-200 rounded' : ''
                ]"
            >
                <span v-if="successful" class="text-green-600"
                    >Evento publicado!</span
                >
            </div>
            <!-- <div class="field mb-6">
                <div class="control">
                    <label for="courseId" class="text-default py-2"
                        >Identificador del Curso</label
                    >
                    <input
                        type="courseId"
                        ref="courseId"
                        class="bg-transparent border border-muted-light rounded p-2 text-sm text-muted w-full"
                        id="courseId"
                        placeholder="Ingresa el título"
                        required
                    />
                    <p
                        v-if="errors.courseId"
                        class="bg-red-300 text-red-600 rounded p-2 m-1"
                    >
                        {{ errors.courseId[0] }}
                    </p>
                </div>
            </div> -->
            <div class="field mb-6">
                <label for="time" class="text-default py-2 mb-2"
                        >Elige el dia</label
                    >
                <datepicker ref="date" name="eventDate" mondayFirst :inline="true"></datepicker>
            </div>
            <div class="field mb-6">
                <div class="control">
                    <label for="time" class="text-default py-2"
                        >Elige la hora</label
                    >
                    <input
                        type="time"
                        ref="time"
                        class="bg-transparent border border-muted-light rounded p-2 text-sm text-muted w-full"
                        id="time"
                        placeholder="Ingresa la hora del evento"
                        required
                    />
                    <p
                        v-if="errors.time"
                        class="bg-red-300 text-red-600 rounded p-2 m-1"
                    >
                        {{ errors.time[0] }}
                    </p>
                </div>
            </div>
            <div class="field mb-6">
                <div class="control">
                    <label for="title" class="text-default py-2"
                        >Título del evento</label
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
                    <label for="description" class="text-default py-2"
                        >Descripción del evento</label
                    >
                    <input
                        type="description"
                        ref="description"
                        class="bg-transparent border border-muted-light rounded p-2 text-sm text-muted w-full"
                        id="description"
                        placeholder="Ingresa la descripción aquí"
                        required
                    />
                    <p
                        v-if="errors.description"
                        class="bg-red-300 text-red-600 rounded p-2 m-1"
                    >
                        {{ errors.description[0] }}
                    </p>
                </div>
            </div>
            <div class="field mb-6">
                <div class="control">
                    <label for="priority" class="text-default py-2"
                        >¿Que importancia tiene para la asignatura?</label
                    >
                    <input
                        type="priority"
                        ref="priority"
                        class="bg-transparent border border-muted-light rounded p-2 text-sm text-muted w-full"
                        id="priority"
                        placeholder="Ingresa el nivel de prioridad"
                        required
                    />
                    <p
                        v-if="errors.priority"
                        class="bg-red-300 text-red-600 rounded p-2 m-1"
                    >
                        {{ errors.priority[0] }}
                    </p>
                </div>
            </div>
            <div class="field mb-6">
                <div class="control">
                    <label for="tags" class="text-default py-2"
                        >Tags</label
                    >
                    <input
                        type="tags"
                        ref="tags"
                        class="bg-transparent border border-muted-light rounded p-2 text-sm text-muted w-full"
                        id="tags"
                        placeholder="Ingresa alguna tag aqui (opcional)"
                        required
                    />
                    <p
                        v-if="errors.tags"
                        class="bg-red-300 text-red-600 rounded p-2 m-1"
                    >
                        {{ errors.tags[0] }}
                    </p>
                </div>
            </div>
            <div class="field mb-6">
                <div class="control">
                    <label for="topics" class="text-default py-2"
                        >Temas a tratar</label
                    >
                    <vue-simplemde
                        class="bg-transparent border border-muted-light rounded p-2 text-sm text-default w-full"
                        ref="topics"
                        id="topics"
                        v-model="topics"
                        placeholder="Ingresa los temas a tratar"
                        rows="15"
                        col="10"
                        required
                    />
                    <p
                        v-if="errors.topics"
                        class="bg-red-300 text-red-600 rounded p-2 m-1"
                    >
                        {{ errors.topics[0] }}
                    </p>
                </div>
            </div>
            <div class="flex justify-start field mb-6">
                <router-link :to="{ name: 'home'}">
                    <button
                    type="button"
                    class="button is-default mr-4"
                    >
                    Cancelar
                    </button>
                </router-link>
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
import Datepicker from 'vuejs-datepicker';

export default {
    props: {
        userId: {
            type: Number,
            required: true
        }
    },
    components: { Datepicker },
    data() {
        return {
            error: false,
            successful: false,
            errors: [],
        };
    },
    methods: {
        create() {
            const formData = new FormData();
            formData.append("event_date", this.$refs.date.value);
            formData.append("event_time", this.$refs.time.value);
            formData.append("title", this.$refs.title.value);
            formData.append("description", this.$refs.description.value);
            formData.append("priority", this.$refs.priority.value);
            formData.append("tags", this.$refs.tags.value);
            formData.append("topics", this.$refs.topics.value);
            formData.append("user_id", this.userId);

            axios
                .post("/api/events", formData)
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

            this.$refs.date.value = "";
            this.$refs.time.value = "";
            this.$refs.title.value = "";
            this.$refs.description.value = "";
            this.$refs.priority.value = "";
            this.$refs.tags.value = "";
            this.$refs.topics.value = "";
        }
    }
};
</script>
