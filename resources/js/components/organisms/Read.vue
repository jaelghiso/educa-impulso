<template>
    <div id="posts" class="md:flex md:flex-wrap mt-4">
        <div
            class="card flex flex-col border p-3 my-4 mr-2" style="height: 200px; width:255px;"
            v-for="post in posts"
            :key="post.id"
        >
            <h3 class="font-normal text-xl py-2 -ml-5 mb-3 border-l-4 border-accent-light pl-4">
                {{ post.title }}
            </h3>
            <p class="text-sm text-muted mb-3">{{ post.subtitle }}</p>
            <footer class="flex content-end justify-end mb-2 text-muted">
                <button
                    class="p-1 mx-3 text-sm font-bold text-grey-700"
                    type="button"
                    @click="deletePost(post.id)"
                >
                    Borrar
                </button>
                <router-link
                    :to="{ name: 'update', params: { postId: post.id } }"
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
