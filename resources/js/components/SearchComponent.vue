<template>
  <div class="verkoko hoverkoko centratura">
    <div class="position-relative">
      <input
        class="form-control"
        @keyup.enter.prevent="searchRestaurantsFromCity"
        type="text"
        placeholder="Inserisci La Citta'"
        v-model="city"
      />
      <i @click.prevent="searchRestaurantsFromCity" class="fa-solid fa-magnifying-glass"></i>
      <!-- <button @click.prevent="searchRestaurantsFromCity" class="btn">
        CERCA
      </button> -->
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      city: "",
    };
  },
  props: {
    // topRestaurants: Object,
  },
  methods: {
    searchRestaurantsFromCity() {
      let cityChoose = this.city.toLowerCase();
      this.city = "";
      window.location.href = `/restaurants/${cityChoose}`;
    },
  },
};
$(function () {
  var koko = $(".verkoko");
  var bottone = $(".btn");
  $(window).scroll(function () {
    var scroll = $(window).scrollTop();
    if (scroll >= 50) {
      bottone.addClass("btnBlue");
      bottone.addClass("btnNavScesa");
      koko.removeClass("hoverkoko");
    } else {
      koko.addClass(" hoverkoko");
      bottone.removeClass("btnBlue");
       bottone.removeClass("btnNavScesa");
    }
  });
});
</script>