<template>
    <div>
        <v-container>
            <v-row>
                <v-col cols="3">
                    <v-card>
                        <v-card-title>
                            男女比
                        </v-card-title>
                        <v-divider class="ma-0"></v-divider>
                        <v-card-text>
                            <gender-pie-chart />
                        </v-card-text>
                    </v-card>
                    <v-card class="mt-3">
                        <v-card-title>
                            ユーザ比
                        </v-card-title>
                        <v-divider class="ma-0"></v-divider>
                        <v-card-text>
                            <user-pie-chart />
                        </v-card-text>
                    </v-card>
                </v-col>
                <v-col>
                    <v-card>
                        <v-card-title>
                            施術内容ごとのメニュー数
                        </v-card-title>
                        <v-divider class="ma-0"></v-divider>
                        <v-card-text>
                            <menu-bar-chart :height="289" />
                        </v-card-text>
                    </v-card>
                </v-col>
            </v-row>
        </v-container>
    </div>
</template>

<script>
// import { Bar } from "vue-chartjs";

// export default {
//     extends: Bar,
//     name: "chart",
//     data() {
//         return {
//             data: {
//                 labels: [
//                     "January",
//                     "February",
//                     "March",
//                     "April",
//                     "May",
//                     "June"
//                 ],
//                 datasets: [
//                     {
//                         label: "Bar Dataset",
//                         data: [10, 20, 30, 40, 50, 30],
//                         backgroundColor: [
//                             "rgba(255, 99, 132, 0.2)",
//                             "rgba(54, 162, 235, 0.2)",
//                             "rgba(255, 206, 86, 0.2)",
//                             "rgba(75, 192, 192, 0.2)",
//                             "rgba(153, 102, 255, 0.2)",
//                             "rgba(255, 159, 64, 0.2)"
//                         ],
//                         borderColor: [
//                             "rgba(255, 99, 132, 1)",
//                             "rgba(54, 162, 235, 1)",
//                             "rgba(255, 206, 86, 1)",
//                             "rgba(75, 192, 192, 1)",
//                             "rgba(153, 102, 255, 1)",
//                             "rgba(255, 159, 64, 1)"
//                         ],
//                         borderWidth: 1
//                     },
//                     {
//                         label: "Line Dataset",
//                         data: [10, 50, 20, 30, 30, 40],
//                         borderColor: "#CFD8DC",
//                         fill: false,
//                         type: "line",
//                         lineTension: 0.3
//                     }
//                 ]
//             },
//             options: {
//                 scales: {
//                     xAxes: [
//                         {
//                             scaleLabel: {
//                                 display: true,
//                                 labelString: "Month"
//                             }
//                         }
//                     ],
//                     yAxes: [
//                         {
//                             ticks: {
//                                 beginAtZero: true,
//                                 stepSize: 10
//                             }
//                         }
//                     ]
//                 }
//             }
//         };
//     },
//     mounted() {
//         this.renderChart(this.data, this.options);
//     }
// };
</script>

<style>
/* .gender-pie-chart-card {
    width: 256px;
    height: 312px;
} */
</style>
