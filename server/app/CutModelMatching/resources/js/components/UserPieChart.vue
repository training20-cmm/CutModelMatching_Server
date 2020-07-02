<script>
import { Pie } from "vue-chartjs";

export default {
    extends: Pie,
    name: "UserPieChart",
    data() {
        return {
            data: {
                labels: ["美容師", "カットモデル"],
                datasets: [
                    {
                        data: [40, 60],
                        backgroundColor: ["#7986cb", "#ff8a65"]
                    }
                ]
            }
        };
    },
    mounted() {
        this.renderChart(this.data, this.options);
    }
};
</script>
