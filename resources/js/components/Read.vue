<template>
    <div id="posts" class="mt-4">
        <div
            class="flex flex-row justify-between border p-3 my-4"
            v-for="post in posts"
            :key="post.id"
        >
            <p class="flex justify-around mr-4">
                {{ post.title }}
            </p>
            <div class="flex justify-around">
                <router-link
                    :to="{ name: 'update', params: { postId: post.id } }"
                >
                    <button class="p-1 mx-3 bg-grey-400" type="button">
                        Editar News
                    </button>
                </router-link>
                <button
                    class="p-1 mx-3 bg-red-500"
                    type="button"
                    @click="deletePost(post.id)"
                >
                    Borrar News
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
        this.getPosts();
    },
    data() {
        return {
            posts: {},
            next: null,
            prev: null
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
        deletePost(id) {
            axios.delete("/api/posts/" + id).then(
                response => this.getPosts(),
                swal({
                    title: "Borrada!",
                    text: "Esta noticia ha sido eliminada",
                    icon: "success",
                    closeOnClickOutside: false,
                    closeOnEsc: false
                })
            );
        },
        navigate(address) {
            this.getPosts(address);
        }
    }
};
</script>
