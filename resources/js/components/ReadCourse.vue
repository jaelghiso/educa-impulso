<template>
    <div id="courses" class="mt-4">
        <div
            class="flex flex-row justify-between border p-3 my-4"
            v-for="course in courses"
            :key="course.id"
        >
            <p class="flex justify-around mr-4">
                {{ course.title }}
            </p>
            <div class="flex justify-around">
                <router-link
                    :to="{ name: 'update-course', params: { courseId: course.id } }"
                >
                    <button class="p-1 mx-3 bg-grey-400" type="button">
                        Editar Curso
                    </button>
                </router-link>
                <button
                    class="p-1 mx-3 bg-red-500"
                    type="button"
                    @click="deleteCourse(course.id)"
                >
                    Borrar Curso
                </button>
            </div>
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
