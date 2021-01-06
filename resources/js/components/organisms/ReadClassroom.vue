<template>
    <div id="classrooms" class="md:flex md:flex-wrap mt-4">
        <div
            class="card flex flex-col border p-3 my-4 mr-2" style="height: 150px; width:255px;"
            v-for="classroom in classrooms"
            :key="classroom.id"
        >
            <h3 class="font-normal text-xl py-2 -ml-5 mb-3 border-l-4 border-accent-light pl-4">
                {{ classroom.title }}
            </h3>
            <footer class="flex content-end justify-end mb-2 text-muted">
                <button
                    class="p-1 mx-3 text-sm font-bold text-grey-700"
                    type="button"
                    @click="deleteClasroom(classroom.id)"
                >
                    Borrar
                </button>
                <!-- <router-link
                    :to="{ name: 'update-course', params: { courseId: course.id } }"
                >
                    <button class="p-1 mx-3 text-sm font-bold text-green-600" type="button">
                        Editar
                    </button>
                </router-link> -->

            </footer>
        </div>

        <div class="">
            <button
                class="m-3 button bg-grey-400"
                type="button"
                v-if="next"
                @click="navigate(next)"
            >
                Siguiente
            </button>
            <button
                class="m-3 button bg-grey-400"
                type="button"
                v-if="prev"
                @click="navigate(prev)"
            >
                Anterior
            </button>
        </div>
    </div>
</template>
<script>
export default {
    mounted() {
        this.getClassrooms();
    },
    data() {
        return {
            classrooms: {},
            next: null,
            prev: null
        };
    },
    methods: {
        getClassrooms(address) {
            axios.get(address ? address : "/api/classrooms").then(response => {
                this.classrooms = response.data.data;
                this.prev = response.data.links.prev;
                this.next = response.data.links.next;
            });
        },
        deleteClasroom(id) {
            axios.delete("/api/classrooms/" + id).then(
                response => this.getClassrooms(),
                swal({
                    title: "Borrada!",
                    text: "Este clase ha sido eliminada",
                    icon: "success",
                    closeOnClickOutside: false,
                    closeOnEsc: false
                })
            );
        },
        navigate(address) {
            this.getClassrooms(address);
        }
    }
}
</script>
