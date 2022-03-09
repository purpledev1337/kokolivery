<template>

      <div id="" class="verkoko">
              <input @keyup.enter.prevent="searchRestaurantsFromCity" type="text" placeholder="Inserisci La Via, La Citta' E La Provincia" v-model="city">
              <button @click.prevent="searchRestaurantsFromCity"  class="btn btn-primary" >SEARCH</button>
      </div>

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