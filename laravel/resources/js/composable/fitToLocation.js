export function fitToLocation(map) {
    document.getElementById("fit").addEventListener("click", () => {
        map.fitBounds([
            [5.957039, 45.818028],
            [10.49205, 47.80845],
        ]);
    });
}
