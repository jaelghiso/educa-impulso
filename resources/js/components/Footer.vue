<template>
    <footer>
        <nav class="navbar shadow">
            <div class="mx-auto px-4">
                <div class="flex justify-around item-center">
                    <div class="flex flex-col justify-start py-3">
                        <img
                            :src="logo_src"
                            alt="logo-impulso"
                            class="logo--setup"
                        />
                        <p class="m-2 bg--primary-text">
                            Avda. Gral. San Martín 4722 Esq. Gilberto Bellini,
                            CP. 12300.
                        </p>
                        <p class="m-2 bg--primary-text">Montevideo, Uruguay</p>
                        <p class="m-2 bg--primary-text">
                            Teléfono: (+598) 2216 0050
                        </p>
                    </div>
                    <div class="flex justify-between item-center py-3">
                        <ul class="flex flex-col justify-start px-4">
                            <li class="p-1 bg--primary-text">
                                Inicio
                            </li>
                            <li class="p-1 bg--primary-text">
                                Inscripciones
                            </li>
                            <li class="p-1 bg--primary-text">
                                Contacto
                            </li>
                        </ul>
                        <ul class="flex flex-col justify-start px-4">
                            <li class="p-1 bg--primary-text">
                                Institución
                            </li>
                            <li class="p-1 bg--primary-text">
                                Fundación
                            </li>
                        </ul>
                        <ul class="flex flex-col justify-start px-4">
                            <li class="p-1 bg--primary-text">Testimonios</li>
                            <li class="p-1 bg--primary-text">
                                Newsletter
                            </li>
                        </ul>
                    </div>
                    <div class="flex justify-around item-center py-3">
                        <div class="flex flex-col">
                            <div class="flex justify-start">
                                <a class="p-2 bg--primary-text" href>
                                    <font-awesome-icon
                                        :icon="['fab', 'instagram']"
                                        size="lg"
                                    />
                                </a>
                                <a class="p-2 bg--primary-text" href>
                                    <font-awesome-icon
                                        :icon="['fab', 'twitter']"
                                        size="lg"
                                    />
                                </a>
                                <a class="p-2 bg--primary-text" href>
                                    <font-awesome-icon
                                        :icon="['fab', 'facebook-f']"
                                        size="lg"
                                    />
                                </a>
                                <a class="p-2 bg--primary-text" href>
                                    <font-awesome-icon
                                        :icon="['fas', 'globe']"
                                        size="lg"
                                    />
                                </a>
                            </div>
                            <div class="flex flex-col justify-start mt-2">
                                <input
                                    type="text"
                                    class="form-control"
                                    placeholder="Ingresa tu email"
                                />
                                <p class="p-1 bg--primary-text">
                                    Permanece en contacto con nosotros para<br />
                                    conocer las últimas noticias!
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <div class="py-2 bg-header">
            <div class="container mx-auto">
                <p class="m-0 text-center text-white">
                    Copyright &copy; Great Idea South 2020
                </p>
            </div>
        </div>
    </footer>
</template>
<script>
export default {
    data() {
        return {
            logo_src: "images/logo-impulso.png"
        };
    }
};
</script>
