<template>
    <div id="summaries" class="md:flex md:flex-wrap mt-4">
        <div
            class="card flex flex-col border p-3 my-4 mr-2" style="height: 150px; width:255px;"
            v-for="summary in summaries"
            :key="summary.id"
        >
            <h3 class="font-normal text-xl py-2 -ml-5 mb-3 border-l-4 border-accent-light pl-4">
                {{ summary.title }}
            </h3>
            <footer class="flex content-end justify-end mb-2 text-muted">
                <button
                    class="p-1 mx-3 text-sm font-bold text-grey-700"
                    type="button"
                    @click="deleteSummary(summary.id)"
                >
                    Borrar
                </button>
                <router-link
                    :to="{ name: 'update-summary', params: { summaryId: summary.id } }"
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
