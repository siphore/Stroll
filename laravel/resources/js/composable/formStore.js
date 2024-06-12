import { ref } from "vue";

export const formStore = ref({
    name: "",
    descr: "",
    img: null,
    duration: "",
    // distance: "",
    radius: 0,
    level: "",
    departure: "",
    arrival: "",
    season: [],
    public: [],
    accessibility: [],
    equipment: [],
    district: [],
});
