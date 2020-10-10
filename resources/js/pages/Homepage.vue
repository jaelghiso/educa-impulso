<template>
  <div>
    <nav class="navbar navbar-expand-md shadow-sm bg--dark-blue">
      <a class="navbar-brand">
        <img :src="logo_src" alt="logo-impulso" height="80px;" />
      </a>
      <div class="navbar-nav ml-auto">
        <li class="nav-item p-2 text-uppercase text-light">Áreas</li>
        <li class="nav-item p-2 text-uppercase text-light">Cursos</li>
        <li class="nav-item p-2 text-uppercase text-light">Clases</li>
        <router-link :to="{ name: 'news' }" class="nav-item p-2 text-uppercase text-white">Noticias</router-link>
      </div>
    </nav>
    <div class="container mt-2">
      <header class="d-inline">
        Bienvenido, {{ userName }}
        <a
          @click="logout"
          class="float-right mr-3 btn btn-secondary text-white"
          style="cursor:pointer"
        >Logout</a>
      </header>
    </div>
    <div class="container">
      <router-view :userName="userName" :postAuthor="postAuthor"></router-view>
    </div>
    <footer>
      <nav id="navbar" class="navbar navbar-expand-md shadow-sm">
        <div class="container">
          <div class="col-md-3 col-sm-12">
            <img :src="logo_src" alt="logo-impulso" height="80px;" />
            <p class="m-2 bg--primary-text">
              Avda. Gral. San Martín 4722 Esq. Gilberto Bellini,
              CP. 12300.
            </p>
            <p class="m-2 bg--primary-text">Montevideo, Uruguay</p>
            <p class="m-2 bg--primary-text">Teléfono: (+598) 2216 0050</p>
          </div>
          <div class="col-md-6 col-sm-12 d-flex justify-content-around">
            <ul class="nav flex-column">
              <li class="nav-item p-1 bg--primary-text">Inicio</li>
              <li class="nav-item p-1 bg--primary-text">Inscripciones</li>
              <li class="nav-item p-1 bg--primary-text">Contacto</li>
            </ul>
            <ul class="nav flex-column">
              <li class="nav-item p-1 bg--primary-text">Institución</li>
              <li class="nav-item p-1 bg--primary-text">Fundación</li>
            </ul>
            <ul class="nav flex-column">
              <li class="nav-item p-1">Testimonios</li>
              <li class="nav-item p-1 bg--primary-text">Newsletter</li>
            </ul>
          </div>
          <div class="col-md-3 col-sm-12">
            <div class="d-inline">
              <a class="p-2 bg--primary-text" href>
                <font-awesome-icon :icon="['fab', 'instagram']" size="lg" />
              </a>
              <a class="p-2 bg--primary-text" href>
                <font-awesome-icon :icon="['fab', 'twitter']" size="lg" />
              </a>
              <a class="p-2 bg--primary-text" href>
                <font-awesome-icon :icon="['fab', 'facebook-f']" size="lg" />
              </a>
              <a class="p-2 bg--primary-text" href>
                <font-awesome-icon :icon="['fas', 'globe']" size="lg" />
              </a>
            </div>
            <div class="form-group mt-2">
              <input type="text" class="form-control" placeholder="Ingresa tu email" />
              <p class="p-1 bg--primary-text">
                Permanece en contacto con nosotros para conocer
                las últimas noticias!
              </p>
            </div>
          </div>
        </div>
      </nav>
      <div class="py-2 bg--dark-blue">
        <div class="col-md-12 col-sm-12">
          <p class="m-0 text-center text-white">Copyright &copy; Great Idea South 2020</p>
        </div>
      </div>
    </footer>
  </div>
</template>

<script>
export default {
  props: {
    userId: {
      type: Number,
      required: true
    },
    userName: {
      type: String,
      required: true
    },
    postAuthor: {
      type: String,
      required: true
    }
  },
  data() {
    return {
      logo_src: "images/logo-impulso.png"
    };
  },
  methods: {
    logout() {
      axios.post("/logout").then(() => {
        window.location = "/";
      });
    }
  }
};
</script>
