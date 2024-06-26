import MapView from "../components/MapView.vue";
import SentiersView from "../components/SentiersView.vue";
import HomeView from "../components/HomeView.vue";
import StarredView from "../components/StarredView.vue";
import ProfileView from "../components/ProfileView.vue";
import AddRoute_1 from "../components/AddRoute_1.vue";
import AddRoute_2 from "../components/AddRoute_2.vue";
import AddRoute_3 from "../components/AddRoute_3.vue";
import AddRoute_4 from "../components/AddRoute_4.vue";
import AddRoute_5 from "../components/AddRoute_5.vue";
import AddRoute_6 from "../components/AddRoute_6.vue";
import FiltresView from "../components/FiltresView.vue";
import HistoryView from "../components/HistoryView.vue";
import DetailedRoute from "../components/DetailedRoute.vue";
import DetailedLocation from "../components/DetailedLocation.vue";
import Bienvenue1 from "../components/Bienvenue1.vue";
import Bienvenue2 from "../components/Bienvenue2.vue";
import Bienvenue3 from "../components/Bienvenue3.vue";

export const routes = {
    "#bienvenue-1": {
        component: Bienvenue1,
    },
    "#bienvenue-2": {
        component: Bienvenue2,
    },
    "#bienvenue-3": {
        component: Bienvenue3,
    },
    "#carte": {
        component: MapView,
        label: "Carte",
    },
    "#sentiers": {
        component: SentiersView,
        label: "Sentiers",
    },
    "#accueil": {
        component: HomeView,
        label: "Accueil",
    },
    "#favoris": {
        component: StarredView,
        label: "Enregistré",
    },
    "#profil": {
        component: ProfileView,
        label: "Profil",
    },
    "#ajout-1": {
        component: AddRoute_1,
    },
    "#ajout-2": {
        component: AddRoute_2,
    },
    "#ajout-3": {
        component: AddRoute_3,
    },
    "#ajout-4": {
        component: AddRoute_4,
    },
    "#ajout-5": {
        component: AddRoute_5,
    },
    "#ajout-6": {
        component: AddRoute_6,
    },
    "#filtres": {
        component: FiltresView,
    },
    "#historique": {
        component: HistoryView,
    },
    "#details-sentier": {
        component: DetailedRoute,
    },
    "#details-point-interet": {
        component: DetailedLocation,
    },
};
