import { ref } from "vue";
import axios from "axios";

export const locations = ref([]);

export async function fetchRuns() {
    try {
        const response = await axios.get("/api/locations");
        locations.value = response.data;
    } catch (error) {
        console.error("Error fetching locations:", error);
    }
}
