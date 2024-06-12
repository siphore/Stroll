import { ref } from "vue";

export const formStore = ref({
    name: "",
    description: "",
    image: null,
    duration: "",
    // distance: "",
    radius: 0,
    level: "",
    season: [],
    public: [],
    accessibility: [],
    equipment: [],
    district: [],
});
