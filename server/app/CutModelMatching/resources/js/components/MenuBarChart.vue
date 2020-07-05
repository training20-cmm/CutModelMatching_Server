<script>
import ajax from "../ajax";
import { Bar } from "vue-chartjs";
export default {
    extends: Bar,
    name: "MenuBarChart",
    created() {
        ajax.get("/menus/count_by_menu_treatment_id").then(response => {
            const names = response.data.map(d => d.menuTreatmentName);
            const data = response.data.map(d => d.count);
            const barData = {
                labels: names,
                datasets: [
                    {
                        data,
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
                        ]
                    }
                ]
            };
            this.renderChart(barData, {});
        });
    }
};
</script>
