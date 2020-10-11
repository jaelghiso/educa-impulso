<template>
    <div class="mt-4">
        <div class="my-5 mx-auto">
            <router-link
                :to="{ name: 'news' }"
                class="float-left ml-3 mt-2 button text-white"
                >&larr; Volver</router-link
            >
            <div class="jumbotron">
                <h3 class="text-center text-bold text-2xl mt-4 bg--purple-text">
                    {{ post.title }}
                </h3>
                <span class="lead">por {{ postAuhor }}</span>
                <h6 class="my-2 text-secondary">{{ post.subtitle }}</h6>
                <hr class="py-3" />
                <div class="text-muted py-3">
                    Posteado {{ post.created_at | date }}
                    <span class="text-primary"></span>
                </div>
                <hr />
                <div>
                    <img
                        :src="
                            post.image
                                ? '/uploads/posts/' + post.image
                                : post_image
                        "
                        alt="post image"
                        class="card-img-top"
                    />
                    <p class="mt-5 py-4">{{ post.body }}</p>
                </div>
                <hr class="py-3" />
            </div>
        </div>
    </div>
</template>
<script>
export default {
    mounted() {
        this.getPost();
    },
    props: {
        postId: {
            type: Number,
            required: true
        },
        userName: {
            type: String,
            required: true
        },
        postAuhor: {
            type: String,
            required: true
        }
    },
    data() {
        return {
            post: {},
            post_image: "https://place-hold.it/750x350.png",
            logo_src: "images/logo-impulso.png"
        };
    },
    methods: {
        getPost() {
            axios.get("/api/posts/" + this.postId).then(response => {
                this.post = response.data.data;
            });
        }
    }
};
</script>
