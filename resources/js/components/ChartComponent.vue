<template>
    <!-- resources/assets/js/components -->
    <div>
        <canvas id="canvas"></canvas>
    </div>
</template>

<script>
    // import {Chart} from 'Chart.js';
    export default {
        // props: {
        //     labels: String,
        //     dataProp: String,
        //     colors: String,
        // },
        data(){
            return{
                // dataChart: null,
                labels: null,
                dataProp: null,
                colors: null,
            }
        },
        methods: {
            async getDataChart(){
                let res = await axios.get('/charts')
                .catch(error => console.error(error));
                // this.dataChart = res.data;
                this.labels = res.data.labels;
                this.dataProp = res.data.dataset;
                this.colors = res.data.colours;
                console.log(res.data);
                console.log('labels',this.labels);
                console.log('dataset',this.dataProp);
                console.log('color',this.colors);
                this.renderChart();
            },
            renderChart() {
                new Chart(document.getElementById('canvas').getContext('2d'), {
                    type: 'polarArea',
                    data: {
                        labels: this.labels,
                        datasets: [{
                            label: "I 10 piatti piu' venduti",
                            data: this.dataProp,
                            backgroundColor: this.colors
                        }]
                    },
                    options: {
                        title: {
                            display: true,
                            fontSize: 22,
                            text: "I 10 piatti piu' venduti"
                        }
                    }
                });
            }
        },
        mounted() {
            // console.log(JSON.parse(this.labels));
            // console.log('data',JSON.parse(this.dataProp));
            // this.renderChart();
            this.getDataChart();
        }
    }
</script>
