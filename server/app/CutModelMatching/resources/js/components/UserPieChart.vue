<script>
import ajax from "../ajax";
import { Pie } from "vue-chartjs";

export default {
    extends: Pie,
    name: "UserPieChart",
    created() {
        const hairdresserPromise = ajax.get("/hairdressers/count");
        const modelPromise = ajax.get("/models/count");
        Promise.all([hairdresserPromise, modelPromise]).then(responses => {
            const labels = ["美容師", "カットモデル"];
            const datasets = [
                {
                    data: [responses[0].data, responses[1].data],
                    backgroundColor: ["#7986cb", "#ff8a65"]
                }
            ];
            const pieData = {
                labels,
                datasets
            };
            this.renderChart(pieData);
        });
    }
};
</script>
