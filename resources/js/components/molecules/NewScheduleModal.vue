<template>
    <modal name="new-schedule" classes="p-10 bg-card rounded-lg" height="auto">
        <h1 class="font-normal mb-16 text-center text-2xl">
            Agenda Area
        </h1>
        <form @submit.prevent="submit">
            <div class="flex">
                <div class="flex-1 mr-4">
                    <div class="mb-4">
                        <label
                            for="description"
                            class="text-default text-sm block mb-2"
                            >Description</label
                        >
                        <vue-simplemde
                            rows="6"
                            id="description"
                            class="bg-card border border-muted-light text-sm text-muted py-2 px-2 block w-full rounded"
                        />
                        <span
                            class="text-xs text-red-600"
                        ></span>
                    </div>
                </div>
            </div>
            <footer class="flex justify-end">
                <button
                    type="button"
                    class="button is-default mr-4"
                    @click.prevent="$modal.hide('new-schedule')"
                >
                    Cancelar
                </button>
                <button class="button">Ingresar Wwbat Area</button>
            </footer>
        </form>
    </modal>
</template>
<script>
export default {
    
}
</script>