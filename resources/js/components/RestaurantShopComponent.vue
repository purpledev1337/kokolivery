<template>
    <div>
        <a href="/">Link alla home</a>
        <div>
            Numero Carrello ({{cart.length}})
        </div>
        <h3>Restaurants Shop:</h3>

        <div id="restaurants_box">
            <div class="restaurant_card" v-for="dish in dishes" :key="dish.id">
                <img :src="`storage/${dish.image_path}`" alt="">
                <h2>{{ dish.name }}</h2>
                <h3>Prezzo: {{ dish.price }}</h3>
                <h3>{{ dish.description }}</h3>
                <span>({{ dish.category }})</span>
                <div @click="addToCart(dish)">+</div>
                <div @click="removeFromCart(dish.id)" v-if="cart.some(item => item.id === dish.id)">-</div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {

            return {
                url: null,
                dishes: [],
                cart:[]
            };
        },
        mounted() {
            // salvo l'url
            this.url = window.location.pathname;
            this.getData();
        },

        methods: {
            async getData() {
                let res = await axios.get(`/view${this.url}`)
                // .then(r => this.dishes = r.data)
                .catch(e => console.error(e));
                this.dishes = res.data;
                console.log("array piatti", this.dishes);
            },
            addToCart(item) {
                this.cart.push(item);
                console.log(this.cart);
            },
            removeFromCart(dishID) {

                const dishIndex = this.cart.findIndex(object => {

                return object.id === dishID;
                })
                
                this.cart.splice(dishIndex, 1);                
            }
        }
    }
</script>
