<template>
    <div>
        <div class="mb-4">
            <label
                for="classId"
                class="text-default text-sm block mb-2"
                >Título de la Clase</label
            >
            <input
                type="text"
                id="classId"
                ref="classId"
                class="bg-card border border-muted-light text-sm text-muted py-2 px-2 block w-3/4 rounded"
            />
        </div>
        <div class="md:flex md:flex-wrap mt-4">

            <div
                class="card flex flex-col border p-3 my-4 mr-2" style="height: 200px; width:255px;"
            >
                <h3 class="font-normal text-xl py-2 -ml-5 mb-3 border-l-4 border-accent-light pl-4">
                    Wwbat Area
                </h3>
                <div class="flex content-end justify-end mb-2 text-muted">
                    <button class="p-1 mx-3 text-sm font-bold text-green-600" type="button"
                            @click.prevent="$modal.show('new-wwbat')"
                    >
                        Agregar
                    </button>
                </div>
            </div>
            <div
                class="card flex flex-col border p-3 my-4 mr-2" style="height: 200px; width:255px;"
            >
                <h3 class="font-normal text-xl py-2 -ml-5 mb-3 border-l-4 border-accent-light pl-4">
                    Big Words Area
                </h3>
                <div class="flex content-end justify-end mb-2text-muted">
                    <button class="p-1 mx-3 text-sm font-bold text-green-600" type="button"
                            @click.prevent="$modal.show('new-bigwords')"
                    >
                        Agregar
                    </button>
                </div>
            </div>
            <div
                class="card flex flex-col border p-3 my-4 mr-2" style="height: 200px; width:255px;"
            >
                <h3 class="font-normal text-xl py-2 -ml-5 mb-3 border-l-4 border-accent-light pl-4">
                    Agenda Area
                </h3>
                <div class="flex content-end justify-end mb-2 text-muted">
                    <button class="p-1 mx-3 text-sm font-bold text-green-600" type="button"
                            @click.prevent="$modal.show('new-schedule')"
                    >
                        Agregar
                    </button>
                </div>
            </div>
            <div
                class="card flex flex-col border p-3 my-4 mr-2" style="height: 200px; width:255px;"
            >
                <h3 class="font-normal text-xl py-2 -ml-5 mb-3 border-l-4 border-accent-light pl-4">
                    Do Now Area
                </h3>
                <div class="flex content-end justify-end mb-2 text-muted">
                    <button class="p-1 mx-3 text-sm font-bold text-green-600" type="button"
                            @click.prevent="$modal.show('new-donow')"
                    >
                        Agregar
                    </button>
                </div>
            </div>
            <div
                class="card flex flex-col border p-3 my-4 mr-2" style="height: 200px; width:255px;"
            >
                <h3 class="font-normal text-xl py-2 -ml-5 mb-3 border-l-4 border-accent-light pl-4">
                    Practica Guiada Area
                </h3>
                <div class="flex content-end justify-end mb-2 text-muted">
                    <button class="p-1 mx-3 text-sm font-bold text-green-600" type="button"
                            @click.prevent="$modal.show('new-guided-practice')"
                    >
                        Agregar
                    </button>
                </div>
            </div>
            <div
                class="card flex flex-col border p-3 my-4 mr-2" style="height: 200px; width:255px;"
            >
                <h3 class="font-normal text-xl py-2 -ml-5 mb-3 border-l-4 border-accent-light pl-4">
                    Practica Independiente Area
                </h3>
                <div class="flex content-end justify-end mb-2 text-muted">
                    <button class="p-1 mx-3 text-sm font-bold text-green-600" type="button"
                            @click.prevent="$modal.show('new-individual-practice')"
                    >
                        Agregar
                    </button>
                </div>
            </div>
            <div
                class="card flex flex-col border p-3 my-4 mr-2" style="height: 200px; width:255px;"
            >
                <h3 class="font-normal text-xl py-2 -ml-5 mb-3 border-l-4 border-accent-light pl-4">
                    Exit Ticket Area
                </h3>
                <div class="flex content-end justify-end mb-2 text-muted">
                    <button class="p-1 mx-3 text-sm font-bold text-green-600" type="button"
                            @click.prevent="$modal.show('new-exitticket')"
                    >
                        Agregar
                    </button>
                </div>
            </div>

            <new-wwbat-modal :userId="userId"></new-wwbat-modal>
            <new-bigwords-modal></new-bigwords-modal>
            <new-schedule-modal></new-schedule-modal>
            <new-donow-modal></new-donow-modal>
            <new-guided-practice-modal></new-guided-practice-modal>
            <new-individual-practice-modal></new-individual-practice-modal>
            <new-exitticket-modal></new-exitticket-modal>
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
                    class="button block"
                >
                    Enviar &rarr;
                </button>
            </div>
    </div>

</template>
<script>
import NewWwbatModal from "./molecules/NewWwbatModal.vue";
import NewBigwordsModal from "./molecules/NewBigwordsModal.vue";
import NewScheduleModal from "./molecules/NewScheduleModal.vue";
import NewDonowModal from "./molecules/NewDonowModal.vue";
import NewGuidedPracticeModal from "./molecules/NewGuidedPracticeModal.vue";
import NewIndividualPracticeModal from "./molecules/NewIndividualPracticeModal.vue";
import NewExitticketModal from "./molecules/NewExitticketModal.vue";

export default {
    props: {
        userId: {
            type: Number,
            required: true
        },
        summaryId: {
            type: Number
        },
        summaryTitle: {
            type: Number
        }
    },
    components: {
        NewWwbatModal,
        NewBigwordsModal,
        NewDonowModal,
        NewScheduleModal,
        NewGuidedPracticeModal,
        NewIndividualPracticeModal,
        NewExitticketModal
    },
    methods: {
        getSummaries(address) {
            axios.get(address ? address : "/api/summaries").then(response => {
                this.summaries = response.data.data;
                this.prev = response.data.links.prev;
                this.next = response.data.links.next;
            });
        },
    },
}
</script>
<style >

</style>
