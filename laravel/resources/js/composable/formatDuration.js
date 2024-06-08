export function formatDuration(duration) {
    const hours = String(Math.floor(duration / 60)).padStart(2, "0");
    const minutes = String(duration % 60).padStart(2, "0");
    return `${hours}h${minutes}`;
}
