import { ref } from "vue";
import axios from "axios";

export const types = ref([]);

export async function fetchTypes() {
    try {
        const response = await axios.get("/api/types");
        const defaultData= {
            id: 0,
            name: "Tout",
            descr: "Tous les sentiers du canton de Vaud",
        };
        types.value = [defaultData, ...response.data];
    } catch (error) {
        console.error("Error fetching types:", error);
    }
}
