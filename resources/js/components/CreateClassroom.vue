<template>
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

        <new-wwbat-modal></new-wwbat-modal>
        <new-bigwords-modal></new-bigwords-modal>
        <new-schedule-modal></new-schedule-modal>
        <new-donow-modal></new-donow-modal>
        <new-guided-practice-modal></new-guided-practice-modal>
        <new-individual-practice-modal></new-individual-practice-modal>
        <new-exitticket-modal></new-exitticket-modal>
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
    components: { 
        NewWwbatModal, 
        NewBigwordsModal, 
        NewDonowModal,
        NewScheduleModal,
        NewGuidedPracticeModal,
        NewIndividualPracticeModal,
        NewExitticketModal  
    }
}
</script>
<style >
    
</style>