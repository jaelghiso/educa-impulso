<template>
    <div id="courses" class="md:flex md:flex-wrap mt-4">
        <div
            class="card flex flex-col border p-3 my-4 mr-2" style="height: 150px; width:255px;"
            v-for="course in courses"
            :key="course.id"
        >
            <h3 class="font-normal text-xl py-2 -ml-5 mb-3 border-l-4 border-accent-light pl-4">
                {{ course.title }}
            </h3>
            <footer class="flex content-end justify-end mb-2 text-muted">
                <button
                    class="p-1 mx-3 text-sm font-bold text-grey-700"
                    type="button"
                    @click="deleteCourse(course.id)"
                >
                    Borrar
                </button>
                <router-link
                    :to="{ name: 'update-course', params: { courseId: course.id } }"
                >
                    <button class="p-1 mx-3 text-sm font-bold text-green-600" type="button">
                        Editar
                    </button>
                </router-link>
                
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
        this.getCourses();
    },
    data() {
        return {
            courses: {},
            next: null,
            prev: null
        };
    },
    methods: {
        getCourses(address) {
            axios.get(address ? address : "/api/courses").then(response => {
                this.courses = response.data.data;
                this.prev = response.data.links.prev;
                this.next = response.data.links.next;
            });
        },
        deleteCourse(id) {
            axios.delete("/api/courses/" + id).then(
                response => this.getCourses(),
                swal({
                    title: "Borrada!",
                    text: "Este curso ha sido eliminado",
                    icon: "success",
                    closeOnClickOutside: false,
                    closeOnEsc: false
                })
            );
        },
        navigate(address) {
            this.getCourses(address);
        }
    }
};
</script>
