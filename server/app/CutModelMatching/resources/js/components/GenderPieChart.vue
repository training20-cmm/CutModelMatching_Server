<script>
import { Pie } from "vue-chartjs";

export default {
    extends: Pie,
    name: "GenderPieChart",
    data() {
        return {
            data: {
                labels: ["男", "女"],
                datasets: [
                    {
                        data: [10, 90],
                        backgroundColor: ["#4fc3f7", "#f06292"]
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
