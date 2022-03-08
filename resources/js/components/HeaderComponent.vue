<template>
  <section>
      <div id="search_home">
          <div id="cont-logo">
              <div id="cont-img-home">
                  <img id="float-img" src="storage/asset/kokolivery-logo.svg" alt="">
              </div>
              <h1 id="float-title">
                  Kokolivery
              </h1> 
          </div>
          <div>
              <input type="text" placeholder="Inserisci La Via, La Citta' E La Provincia" v-model="city">
              <a :href="`/restaurant_list/${city}`" class="btn btn-primary" >SEARCH</a>
          </div>
          
      </div>
      <img id="banner_svg" src="storage/asset/banner_home4.svg" alt="">
  </section>
</template>

<script>
export default {
    data() {
        return {
            city: '',
        }
    },
    props: {
        // topRestaurants: Object,
    },
    methods: {
    },
}
</script>