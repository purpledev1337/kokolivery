<template>
  <div class="verkoko hoverkoko centratura">
    <input
      @keyup.enter.prevent="searchRestaurantsFromCity"
      type="text"
      placeholder="Inserisci La Via, La Citta' E La Provincia"
      v-model="city"
    />
    <button @click.prevent="searchRestaurantsFromCity" class="btn">
      CERCA
    </button>
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