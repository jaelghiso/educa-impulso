<template>
    <div id="posts" class="mt-4 mx-auto">
        <p class="border p-3 my-4" v-for="post in posts" :key="post.id">
            {{ post.title }}
            <router-link :to="{ name: 'update', params: { postId: post.id } }">
                <button
                    class="p-1 mx-3 float-right btn btn-light"
                    type="button"
                >
                    Editar News
                </button>
            </router-link>
            <button
                class="p-1 mx-3 float-right btn btn-danger"
                type="button"
                @click="deletePost(post.id)"
            >
                Borrar News
            </button>
        </p>
        <div>
            <button
                class="m-3 btn btn-primary"
                type="button"
                v-if="next"
                @click="navigate(next)"
            >
                Siguiente
            </button>
            <button
                class="m-3 btn btn-primary"
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
