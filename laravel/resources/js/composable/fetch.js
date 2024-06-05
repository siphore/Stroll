export async function fetchRuns(url) {
    try {
        const response = await axios.get(url);
        return await response.data.json;
    } catch (error) {
        console.error("There was an error fetching the runs:", error);
    }
}
