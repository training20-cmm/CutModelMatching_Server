<script>
import { Bar } from "vue-chartjs";

export default {
    extends: Bar,
    name: "MenuBarChart",
    data() {
        return {
            data: {
                labels: [
                    "カット",
                    "カラー",
                    "パーマ",
                    "縮毛矯正",
                    "エクステ",
                    "シャンプー",
                    "トリートメント",
                    "ヘッドスパ",
                    "ヘアセット"
                ],
                datasets: [
                    {
                        data: [932, 256, 329, 543, 213, 110, 456, 633, 876],
                        backgroundColor: [
                            "#e57373",
                            "#f06292",
                            "#ba68c8",
                            "#9575cd",
                            "#7986cb",
                            "#7986cb",
                            "#4fc3f7",
                            "#4dd0e1",
                            "#4db6ac"
                        ] //,
                        // borderColor: [
                        //     "rgba(255, 99, 132, 1)",
                        //     "rgba(54, 162, 235, 1)",
                        //     "rgba(255, 206, 86, 1)",
                        //     "rgba(75, 192, 192, 1)",
                        //     "rgba(153, 102, 255, 1)",
                        //     "rgba(255, 159, 64, 1)"
                        // ],
                        // borderWidth: 1
                    } //,
                    // {
                    //     label: "Line Dataset",
                    //     data: [10, 50, 20, 30, 30, 40],
                    //     borderColor: "#CFD8DC",
                    //     fill: false,
                    //     type: "line",
                    //     lineTension: 0.3
                    // }
                ]
            } //,
            // options: {
            //     scales: {
            //         xAxes: [
            //             {
            //                 scaleLabel: {
            //                     display: true,
            //                     labelString: "Month"
            //                 }
            //             }
            //         ],
            //         yAxes: [
            //             {
            //                 ticks: {
            //                     beginAtZero: true,
            //                     stepSize: 10
            //                 }
            //             }
            //         ]
            //     }
            // }
        };
    },
    mounted() {
        this.renderChart(this.data, this.options);
    }
};
</script>
