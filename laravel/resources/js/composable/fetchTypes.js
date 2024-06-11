import { ref } from "vue";
import axios from "axios";

export const types = ref([]);

export async function fetchTypes() {
    try {
        const response = await axios.get("/api/types");
        // types.value += {
        //     id: 0,
        //     name: "Tout",
        //     descr: "Tous les sentiers du canton de Vaud",
        // };
        types.value = response.data;
        // console.log(types);
    } catch (error) {
        console.error("Error fetching types:", error);
    }
}
