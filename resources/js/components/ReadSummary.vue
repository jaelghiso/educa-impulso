<template>
    <div id="summaries" class="mt-4">
        <div
            class="flex flex-row justify-between border p-3 my-4"
            v-for="summary in summaries"
            :key="summary.id"
        >
            <p class="flex justify-around mr-4">
                {{ summary.title }}
            </p>
            <div class="flex justify-around">
                <router-link
                    :to="{ name: 'update-summary', params: { summaryId: summary.id } }"
                >
                    <button class="p-1 mx-3 bg-grey-400" type="button">
                        Editar Temario
                    </button>
                </router-link>
                <button
                    class="p-1 mx-3 bg-red-500"
                    type="button"
                    @click="deleteSummary(summary.id)"
                >
                    Borrar Temario
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
        this.getSummaries();
    },
    data() {
        return {
            summaries: {},
            next: null,
            prev: null
        };
    },
    methods: {
        getSummaries(address) {
            axios.get(address ? address : "/api/summaries").then(response => {
                this.summaries = response.data.data;
                this.prev = response.data.links.prev;
                this.next = response.data.links.next;
            });
        },
        deleteSummary(id) {
            axios.delete("/api/summaries/" + id).then(
                response => this.getSummaries(),
                swal({
                    title: "Borrada!",
                    text: "Este temario ha sido eliminado",
                    icon: "success",
                    closeOnClickOutside: false,
                    closeOnEsc: false
                })
            );
        },
        navigate(address) {
            this.getSummaries(address);
        }
    }
};
</script>
