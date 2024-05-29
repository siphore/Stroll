export function fitToLocation(map) {
    document.getElementById("fit").addEventListener("click", () => {
        map.fitBounds([
            [32.958984, -5.353521],
            [43.50585, 5.615985],
        ]);
    });
}
