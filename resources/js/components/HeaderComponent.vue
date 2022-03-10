<template>
  <section>
      <div id="search_home">
          <div id="cont-logo">
              <div id="cont-img-home">
                  <img class="kokohover" id="float-img" src="storage/asset/kokolivery-logo.svg" alt="">
              </div>
              <h1 class="kokohover" id="float-title">
                  Kokolivery
              </h1> 
          </div>
          <div class="kokohover">
              <input @keyup.enter.prevent="searchRestaurantsFromCity" type="text" placeholder="Inserisci La Via, La Citta' E La Provincia" v-model="city">
              <button @click.prevent="searchRestaurantsFromCity"  class="btn btn-primary" >CERCA</button>
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
        searchRestaurantsFromCity(){
            let cityChoose = this.city.toLowerCase();
            this.city = '';
            window.location.href = `/restaurants/${cityChoose}`;   
        },
    },
}
$(function() {
    var koko = $(".kokohover");
    
    $(window).scroll(function() {    
        var scroll = $(window).scrollTop();
        if (scroll >= 50) {
            //header.addClass("navbar-dark bg-primary");
           
            koko.addClass("hoverkoko");
            
        } else {
            koko.removeClass(" hoverkoko");
           
        }
    });
});
</script>