<template>
    <div>
        <h1 class="mt-4 text-center text-2xl">Noticias</h1>
        <div class="flex flex-row" id="posts">
            <div class="cardNews" v-for="post in posts" :key="post.id">
                <img
                    :src="
                        post.image ? '/uploads/posts/' + post.image : post_image
                    "
                    alt="post image"
                    class="cardNews-image"
                />
                <div class="">
                    <h3 class="cardNews-titleText">
                        {{ post.title }}
                    </h3>
                    <p class="text-secondary cardNews-descriptionText">
                        {{ post.subtitle }}
                    </p>
                    <router-link
                        :to="{ name: 'single', params: { postId: post.id } }"
                        class="button"
                        >Leer más &rarr;</router-link
                    >
                </div>
                <div class="text-muted p-3">
                    Posteado {{ post.created_at | date }} por
                    <span class="text-primary"></span>
                    <div>
                        <span class="p-2">
                            <font-awesome-icon :icon="['fas', 'heart']" />Likes
                        </span>
                        <span class="p-2">
                            <font-awesome-icon
                                :icon="['fas', 'comment-dots']"
                            />Comentarios
                        </span>
                    </div>
                </div>
            </div>
            <div>
                <button
                    class="m-3 button text-white"
                    type="button"
                    v-if="prev"
                    @click="navigate(prev)"
                >
                    Anterior
                </button>
                <button
                    class="m-3 button text-white"
                    type="button"
                    v-if="next"
                    @click="navigate(next)"
                >
                    Siguiente
                </button>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    mounted() {
        this.getPosts();
    },
    data() {
        return {
            posts: {},
            next: null,
            prev: null,
            post_image: "https://place-hold.it/355x180.png",
            logo_src: "images/logo-impulso.png"
        };
    },
    methods: {
        getPosts(address) {
            axios.get(address ? address : "/api/posts").then(response => {
                this.posts = response.data.data;
                this.prev = response.data.links.prev;
                this.next = response.data.links.next;
            });
        },
        navigate(address) {
            this.getPosts(address);
        }
    }
};
</script>
