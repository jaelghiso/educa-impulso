<template>
  <div>
    <nav class="navbar navbar-expand-md shadow-sm bg--dark-blue">
      <a class="navbar-brand">
        <img :src="logo_src" alt="logo-impulso" class="logo--setup-header" />
      </a>
      <div class="navbar-nav ml-auto">
        <!-- <router-link
                    :to="{ name: 'home' }"
                    class="nav-item p-2 text-uppercase text-secondary"
                    >Home</router-link
        >-->
        <router-link :to="{ name: 'login' }" class="nav-item p-2 text-uppercase text-white">Acceder</router-link>
        <router-link
          :to="{ name: 'register' }"
          class="nav-item p-2 text-uppercase text-white"
        >Registrarse</router-link>
      </div>
    </nav>

    <div class="container">
      <router-view></router-view>
    </div>
    <footer>
      <nav id="navbar" class="navbar navbar-expand-md shadow-sm">
        <div class="container">
          <div class="col-md-3 col-sm-12">
            <img :src="logo_src" alt="logo-impulso" class="logo--setup" />
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
<style>
* {
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}
#navbar {
  color: #0e1753;
  width: 100%;
  height: auto;
  padding: 20px;
  background-color: #ffc907;
}
.bg--dark-blue {
  background-color: #0e1753;
}
.card--bg-grey {
  background-color: #f5f5f5;
}
.bg--primary-text {
  color: #0e1753;
}
.bg--purple-text {
  color: #422c6b;
}
.btn--bg-primary {
  background-color: #422c6b;
  padding: 8px 18px;
  border-radius: 4px;
  color: #f5f5f5;
}
.logo--setup {
  height: 80px;
  padding: 10px;
}
.logo--setup-header {
  height: 100px;
  padding: 10px;
}
</style>
<script>
export default {
  data() {
    return {
      logo_src: "images/logo-impulso.png"
    };
  }
};
</script>
