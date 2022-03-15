<template>
  <div v-if="dishes.length" id="shop">
    <div id="dashboard_box" class="row m-5">
      <div class="col-xs-12 col-md-3" id="dashboard_img">
        <img class="rounded"
          :src="`../../storage/${restaurantData.image}`"
        />
      </div>
      <div class="col-xs-12 col-md-9" id="dashboard_cont">
        <h1>{{ restaurantData.brand_name }}</h1>
        <h3>{{ restaurantData.description }}</h3>
        <h3>
          Valutazione: <strong>{{ restaurantData.rating }}</strong> ({{
            restaurantData.num_rating
          }})
        </h3>
        <h4>{{ restaurantData.address }}</h4>
        <h5>Minimo ordine: €{{ restaurantData.order_min }}</h5>
        <h5>Consegna a €{{ restaurantData.delivery_price }}</h5>
      </div>
    </div>

    <div class="d-flex flex-wrap justify-content-center align-items-center my-3">
      <a
        class="btn mx-xs-5 mx-md-3"
        v-for="(category, i) in arrayCategories"
        :key="i"
        :href="`#${category}` + `link`"
      >
        {{ category }}
      </a>
    </div>

    <div id="content_box" class="row position-relative">
      <!-- dish cards -->
      <div
        id="dishes_box"
        class="col-xs-12 col-lg-8 d-flex flex-column align-items-around"
      >
        <div id="category_section"
          class="w-100 d-flex flex-wrap justify-content-around"
          v-for="(category, i) in arrayCategories"
          :key="i"
          :class="{
            ant: category == 'Antipasto',
            pri: category == 'Primi Piatti',
            sec: category == 'Secondi Piatti',
            piz: category == 'Pizza',
            des: category == 'Dessert',
            bib: category == 'Bibite',
          }"
        >
          <span class="category_title" :id="`${category}` + `link`">{{ category }}</span>
            {{ setCat(category) }}
          <!-- class="dish_box col-xs-11 col-lg-5" -->
          <div
            class="col-12 p-3 m-3"
            v-for="(dish, k) in arrayCategoryDishes"
            :key="k"
          >
            <div class="dish_card row p-3">
              <div class="col-7">
                <h2>{{ dish.name }}</h2>
                <hr>
                <h5>{{ dish.description }}</h5>
                <h3>{{ dish.price }} €</h3>
                <br />

                <span
                  class="btn btn-orange"
                  v-if="cart.some((item) => item.id === dish.id)"
                  @click="addToCart(dish)"
                >
                  +
                </span>

                <span class="btn btn-orange" v-else @click="addToCart(dish)">
                  Aggiungi al carrello
                </span>

                <span
                  class="btn btn-secondary"
                  @click="removeFromCart(dish)"
                  v-if="cart.some((item) => item.id === dish.id)"
                >
                  -
                </span>
              </div>

              <div class="col-5 img-responsive d-flex align-items-center">
                <img :src="`../../storage/${dish.image_path}`" alt=""/>
              </div>
            </div>
          </div>
        </div>

        <div v-if="this.addMessageOpened" class="cart-message cart-add">
          "{{ selectedDish.name }}" è stato aggiunto al carrello!
        </div>
        <div v-if="this.removeMessageOpened" class="cart-message cart-remove">
          "{{ selectedDish.name }}" è stato rimosso al carrello!
        </div>
      </div>

      <!-- cart icon -->
      <div
        :class="cart.length == 0 ? 'd-none' : ''"
        class="d-lg-none"
        @click="isCartOpen = !isCartOpen"
        id="icon-cart"
      >
        <div id="cont_icon">
          <i class="fa-solid fa-cart-shopping"></i>
          <div v-if="cart.length > 0" id="count">
            {{ quantityTotal }}
          </div>
        </div>
      </div>

      <div
        :class="!isCartOpen || !cart.length > 0 ? 'd-none' : ''"
        class="
          col-lg-4
          d-lg-inline-block d-flex
          flex-column
          justify-content-between
          p-2
          w-lg-100
          rounded
        "
        id="cart-box"
      >
        <div class="row p-3 border_bottom">
          <div class="col-12">
            <i class="fa-solid fa-cart-shopping"></i>
            <span class="h4">Il tuo ordine</span>
          </div>
        </div>
        <div class="row my-3" v-for="(item, i) in cart" :key="item.id + i">
          <!-- <div class="col-1">
          </div> -->
          <!-- <div class="col-3"> -->
            <div class="ms-2 add_remove rounded d-flex justify-content-center align-items-center" @click="removeFromCart(item)">
                <div class="p-3">-</div>
            </div>
            <div class="add_remove rounded-circle d-flex justify-content-center align-items-center" @click="addToCart(item)">
                <div class="p-3">+</div>
            </div>
          <!-- </div> -->
          <div class="col-2 align-self-center">{{ item.quantity }}x</div>
          <div class="col-4 align-self-center text-truncate">{{ item.name }}</div>
          <div class="col-3 align-self-center">{{ item.price }} €</div>
        </div>
        <div class="row my-3">
          <div class="offset-2 col-8 my-3">
            <h3>
              Totale: <b>€ {{ cartTotal }}</b>
            </h3>
          </div>
          <div class="offset-3 col-6">
            <a
              :class="!cart.length ? 'disabled' : ''"
              class="btn btn-orange"
              :href="route"
              >Procedi con l'acquisto</a
            >
          </div>
        </div>

        <!-- @click="sendCart" -->
      </div>
    </div>
  </div>
  <div v-else id="loading">
    <span></span>
    <span></span>
    <span></span>
    <span></span>
  </div>
  <!-- <div id="loading_screen" v-else>
    <h1>...Loading screen...</h1>
  </div> -->
</template>

<script>
import VueSessionStorage from "vue-sessionstorage";
Vue.use(VueSessionStorage);
Vue.config.productionTip = false;
export default {
  data() {
    return {
      url: null,
      dishes: [],
      restaurantData: "",
      arrayCategories: [],
      // sortedArrayCategories: [],
      arrayCategoryDishes: [],
      // sortCategories: ['Antipasto', 'Primi Piatti', 'Secondi Piatti', 'Pizza', 'Dessert', 'Bibite'],
      // catAntipasto: [],
      // catPrimiPiatti: [],
      // catSecondiPiatti: [],
      // catDessert: [],
      // catBibite: [],
      // catPizza: [],
      cart: [],
      isCartOpen: false,
      addMessageOpened: false,
      removeMessageOpened: false,
      selectedDish: { name: null },
    };
  },
  props: {
    route: {
      route: String,
      required: true,
    },
  },
  mounted() {
    // salvo l'url
    this.url = window.location.pathname;
    this.getDishes();
  },

  methods: {
    // chiamata axios che mi torna tutti i piatti
    async getDishes() {
      let res = await axios
        .get(`/api/view${this.url}`)
        .catch((e) => console.error(e));
      // salvo i piatti
      this.dishes = res.data["dishes"];
      this.restaurantData = res.data["restaurant"];
      // push del piatto nella rispettiva categoria
      // this.dishes.forEach(dish => {
      //   this.popolateDishCategory(dish,'Antipasto',this.catAntipasto);
      //   this.popolateDishCategory(dish,'Primi Piatti',this.catPrimiPiatti);
      //   this.popolateDishCategory(dish,'Secondi Piatti',this.catSecondiPiatti);
      //   this.popolateDishCategory(dish,'Dessert',this.catDessert);
      //   this.popolateDishCategory(dish,'Bibite',this.catBibite);
      //   this.popolateDishCategory(dish,'Pizza',this.catPizza);
      // });
      // console.log(this.catAntipasto,this.catPrimiPiatti,this.catSecondiPiatti,this.catDessert,this.catBibite,this.catPizza);
      this.dishes.forEach((dish) => {
        if (!this.arrayCategories.includes(dish.category)) {
          this.arrayCategories.push(dish.category);
        }
      });

      // this.sortCategories.forEach(function (key) {
      //   let found = false;
      //   this.arrayCategories.filter(function (cat) {
      //     if (!found && cat == key) {
      //       this.sortedArrayCategories.push(cat);
      //       found = true;
      //       return false;
      //     } else
      //       return true;
      //   })
      // })
    },

    async sendCart() {
      let cart = {
        tot: this.cartTotal,
        cartDishes: this.cart,
      };

      await axios.post("stripe/save/cart", cart).catch((e) => console.error(e));
    },

    // func per aggiungere al carrello i piatti
    addToCart(item) {
      // se c'e' un allert aperto lo chiudo
      clearTimeout(this.closeRemoveMessage());
      // cerco nel carrello il piatto che ho cliccato
      const piatto = this.cart.find((dish) => dish.id == item.id);

      // Se la ricerca mi torna il piatto
      if (piatto) {
        // cerco nel cart la posizione del piatto
        const index = this.cart.findIndex((elem) => elem.id === piatto.id);
        // aggiungo 1 alla quantita' gia' presente
        this.cart[index].quantity++;
      } else {
        // altrimenti pusho nel cart un nuovo oggetto con i dati di cui ho bisogno

        this.cart.push({
          id: item.id,
          name: item.name,
          quantity: 1,
          price: item.price,
        });
      }

      this.selectedDish = item;

      this.addMessageOpened = true;

      // mando il carrello aggiornato al server
      this.sendCart();
      setTimeout(() => {
        this.closeAddMessage();
      }, 1500);
    },

    // func per rimuovere dal carrello i piatti
    removeFromCart(item) {
      // se c'e' un allert aperto lo chiudo
      clearTimeout(this.closeAddMessage());
      // cerchiamo il primo piatto selezionato nel cart
      const index = this.cart.findIndex((elem) => elem.id === item.id);
      // faccio -1 all'attuale quantita' del piatto che si trova all'indice che mi sono trovato
      this.cart[index].quantity--;
      // se quantity e' uguale a 0 (false)
      if (!this.cart[index].quantity) {
        // rimuoviamo il piatto selezionato
        this.cart.splice(index, 1);
      }

      this.selectedDish = item;

      this.removeMessageOpened = true;

      // mando il carrello aggiornato al server
      this.sendCart();
      setTimeout(() => {
        this.closeRemoveMessage();
      }, 1500);
    },

    // func per chiudere l'allert dell'aggiunta del piatto
    closeAddMessage() {
      this.addMessageOpened = false;
    },

    // func per chiudere l'allert della rimozione del piatto
    closeRemoveMessage() {
      this.removeMessageOpened = false;
    },
    // category.toLowerCase().replace(/ /g, "")
    popolateDishCategory(dish, category, dishArray) {
      if (dish.category == category) {
        dishArray.push(dish);
      }
    },

    setCat(cat) {
      this.arrayCategoryDishes = [];
      this.dishes.forEach((dish) => {
        if (dish.category === cat) {
          this.arrayCategoryDishes.push(dish);
        }
      });
    },

    // checkCategory(){

    //   return this.dishes.forEach(dish => {

    //     if (this.categoryLooped === dish.category) {

    //       this.arrayCategoryDishes.push(dish);
    //     }
    //   })
    //   // console.log("piatti dentro categoria",this.arrayCategoryDishes);
    //   // return this.ArrayCategoryDishes;
    // }
  },

  computed: {
    cartTotal: function () {
      // salvo la variabile con il totale con default zero
      let total = 0;

      // faccio un foreach del carrello
      this.cart.forEach((dish) => {
        // alla variabile total sommo il valore di ogni prezzo del piatto(ad ogni iterazione)
        total += Number(dish.price * dish.quantity);
      });
      // mi faccio tornare il totale dei vari prezzi
      return Number(total).toFixed(2);
    },

    quantityTotal: function () {
      // salvo la variabile con il totale con default zero
      let total = 0;

      // faccio un foreach del carrello
      this.cart.forEach((dish) => {
        // alla variabile total sommo il valore di ogni quantita del piatto(ad ogni iterazione)
        total += dish.quantity;
      });
      console.log(total);
      // mi faccio tornare il totale delle varie quantita'
      return Number(total);
    },

    // categoryDishes: function() {

    //   console.log("categoria attuale",this.categoryLooped);

    //   this.dishes.filter(this.checkCategory());

    //   console.log("this.arrayCategoryDishes:", this.arrayCategoryDishes);

    //   return this.arrayCategoryDishes;
    // }
  },
};

$(function () {
  var cart = $(".cart_position");
  $(window).scroll(function () {
    var scroll = $(window).scrollTop();
    if (scroll >= 30) {
      cart.addClass("scrollEffect");
    } else {
      cart.removeClass("scrollEffect");
    }
  });
});
</script>
