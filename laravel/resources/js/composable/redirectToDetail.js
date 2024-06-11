export function redirectToDetail(runData) {
    localStorage.setItem("runData", JSON.stringify(runData));
    window.location.hash = "#details-sentier";
}
