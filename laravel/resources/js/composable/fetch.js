import axios from "axios";

export async function fetch(url) {
    try {
        const response = await axios.get(url);
        return response.data;
    } catch (error) {
        console.error("There was an error fetching the runs:", error);
    }
}
