import { ref } from "vue";
import axios from "axios";

export const runs = ref([]);

export async function fetchRuns() {
    try {
        const response = await axios.get("/api/runs");
        runs.value = response.data;
    } catch (error) {
        console.error("Error fetching runs:", error);
    }
}
