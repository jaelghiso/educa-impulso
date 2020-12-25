<template>
    <modal name="new-guided-practice" classes=" p-10 bg-card rounded-lg" height="auto">
        <h1 class="font-normal mb-16 text-center text-2xl">
            Área Práctica Guiada
        </h1>
        <form @submit.prevent="submit">
            <div class="flex">
                <div class="flex-1 mr-2">
                    <div class="mb-4">
                        <label
                            for="title"
                            class="text-default text-sm block mb-2"
                            >Introduce el título:</label
                        >
                        <input
                            type="text"
                            id="title"
                            class="bg-card border border-muted-light text-sm text-muted py-2 px-2 block w-full rounded"
                        />
                        <span
                            class="text-xs text-red-600"
                        ></span>
                    </div>
                    <div class="mb-4">
                        <label
                            for="description"
                            class="text-default text-sm block mb-2"
                            >Texto Práctica Guiada</label
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
                    <div class="mb-4">
                        <label class="text-default text-sm block mb-2"
                            >¿Necesitas agregar imágenes?</label
                        >
                        <input
                            type="file"
                            ref="image"
                            name="image"
                            class="bg-transparent border border-muted-light rounded p-2 text-sm text-muted"
                            id="image"
                            required
                        />
                        <label class="px-3">Seleccionar archivo...</label>
                        <span
                            class="text-xs text-red-600"
                        ></span>
                    </div>
                    <button
                        type="button"
                        class="inline-flex items-center"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="18"
                            height="18"
                            viewBox="0 0 18 18"
                            class="mr-2"
                        >
                            <g fill="none" fill-rule="evenodd" opacity=".307">
                                <path
                                    stroke="#000"
                                    stroke-opacity=".012"
                                    stroke-width="0"
                                    d="M-3-3h24v24H-3z"
                                ></path>
                                <path
                                    fill="#000"
                                    d="M9 0a9 9 0 0 0-9 9c0 4.97 4.02 9 9 9A9 9 0 0 0 9 0zm0 16c-3.87 0-7-3.13-7-7s3.13-7 7-7 7 3.13 7 7-3.13 7-7 7zm1-11H8v3H5v2h3v3h2v-3h3V8h-3V5z"
                                ></path>
                            </g>
                        </svg>
                        <span class="text-xs text-muted"
                            >Agregar nueva imagen
                        </span>
                    </button>
                    <div class="mb-4">
                        <label
                            for="title"
                            class="text-default text-sm block mb-2"
                            >Introduce la url del video:</label
                        >
                        <input
                            type="text"
                            id="title"
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
                    @click.prevent="$modal.hide('new-guided-practice')"
                >
                    Cancelar
                </button>
                <button class="button">Ingresar Práctica Guiada</button>
            </footer>
        </form>
    </modal>
</template>
<script>
export default {
    
}
</script>