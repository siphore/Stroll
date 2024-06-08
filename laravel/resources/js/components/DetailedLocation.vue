<template>
    <div class="detailed-location">
        <div class="header">
            <button @click="goBack" class="back-button">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>
            <!-- pour le super user, car il peut modifier et supprimer le point d'intérêt
             <div class="menu-container"> 
                <button @click="toggleMenu" class="menu-button">⋮</button>
                <div v-if="menuVisible" class="dropdown-menu">
                    <button @click="editLocation">Modifier</button>
                    <button @click="deleteLocation">Supprimer</button>
                </div>
            </div> -->
        </div>
        <img class="main-image" :src="mainImage" alt="Cathédrale de Lausanne">
        <div class="title-container">
            <h3 class="location-title">Cathédrale de Lausanne</h3>
            <svg xmlns="http://www.w3.org/2000/svg" width="31" height="32" viewBox="0 0 31 32" fill="none">
                <path
                    d="M15.3165 17.3333V9.33333M11.4874 13.3333L19.1457 13.3333M24.2512 28V10.4C24.2512 8.15979 24.2512 7.03968 23.8338 6.18404C23.4667 5.43139 22.8809 4.81947 22.1604 4.43597C21.3413 4 20.2691 4 18.1246 4L12.5085 4C10.3639 4 9.29169 4 8.47259 4.43597C7.75209 4.81947 7.1663 5.43139 6.79919 6.18404C6.38184 7.03968 6.38184 8.15979 6.38184 10.4V28L15.3165 22.6667L24.2512 28Z"
                    stroke="#254A3D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </div>
        <div class="location-info">
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="none">
                    <path
                        d="M11.3291 1.5V3.1M4.4291 10H2.8291M6.2803 4.95137L5.14893 3.82M16.3789 4.95137L17.5103 3.82M19.8291 10H18.2291M7.32917 10.0001C7.32917 7.79093 9.12004 6.00007 11.3292 6.00007C12.8352 6.00007 14.1468 6.83235 14.8292 8.06206M6.8291 22C4.61996 22 2.8291 20.2091 2.8291 18C2.8291 15.7909 4.61996 14 6.8291 14C7.29329 14 7.73901 14.0791 8.15353 14.2245C8.86971 12.3396 10.693 11 12.8291 11C14.9652 11 16.7885 12.3396 17.5047 14.2245C17.9192 14.0791 18.3649 14 18.8291 14C21.0382 14 22.8291 15.7909 22.8291 18C22.8291 20.2091 21.0382 22 18.8291 22C14.1888 22 10.7083 22 6.8291 22Z"
                        stroke="#254A3D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                20°C
            </span>
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path
                        d="M12 22C13 17 20 16.4183 20 10C20 5.58172 16.4183 2 12 2C7.58172 2 4 5.58172 4 10C4 16.4183 11 17 12 22Z"
                        stroke="#254A3D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <path
                        d="M12 13C13.6569 13 15 11.6569 15 10C15 8.34314 13.6569 7 12 7C10.3431 7 9 8.34315 9 10C9 11.6569 10.3431 13 12 13Z"
                        stroke="#254A3D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                Pl. de la Cathédrale 1, 1005 Lausanne
            </span>
        </div>
        <div class="description">
            <h4>Description</h4>
            <p>
                La cathédrale de Lausanne, située en Suisse, est un chef-d'œuvre de l'architecture gothique. Consacrée
                en 1275, elle est célèbre pour sa façade imposante, ses vitraux colorés, et son portail peint. Dominant
                la ville depuis la colline de la Cité, la cathédrale offre une vue panoramique sur le lac Léman et les
                Alpes. Elle abrite également l'un des plus grands orgues de Suisse et continue de jouer un rôle central
                dans la vie religieuse et culturelle de Lausanne.
            </p>
        </div>
        <div class="practical-info">
            <h4>Informations pratiques</h4>
            <div class="info-item">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path
                        d="M12 22C13 17 20 16.4183 20 10C20 5.58172 16.4183 2 12 2C7.58172 2 4 5.58172 4 10C4 16.4183 11 17 12 22Z"
                        stroke="#254A3D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <path
                        d="M12 13C13.6569 13 15 11.6569 15 10C15 8.34314 13.6569 7 12 7C10.3431 7 9 8.34315 9 10C9 11.6569 10.3431 13 12 13Z"
                        stroke="#254A3D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                Pl. de la Cathédrale 1, 1005 Lausanne
            </div>
            <div class="info-item">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path
                        d="M8.38028 8.85335C9.07627 10.303 10.0251 11.6616 11.2266 12.8632C12.4282 14.0648 13.7869 15.0136 15.2365 15.7096C15.3612 15.7694 15.4235 15.7994 15.5024 15.8224C15.7828 15.9041 16.127 15.8454 16.3644 15.6754C16.4313 15.6275 16.4884 15.5704 16.6027 15.4561C16.9523 15.1064 17.1271 14.9316 17.3029 14.8174C17.9658 14.3864 18.8204 14.3864 19.4833 14.8174C19.6591 14.9316 19.8339 15.1064 20.1835 15.4561L20.3783 15.6509C20.9098 16.1824 21.1755 16.4481 21.3198 16.7335C21.6069 17.301 21.6069 17.9713 21.3198 18.5389C21.1755 18.8242 20.9098 19.09 20.3783 19.6214L20.2207 19.779C19.6911 20.3087 19.4263 20.5735 19.0662 20.7757C18.6667 21.0001 18.0462 21.1615 17.588 21.1601C17.1751 21.1589 16.8928 21.0788 16.3284 20.9186C13.295 20.0576 10.4326 18.4332 8.04466 16.0452C5.65668 13.6572 4.03221 10.7948 3.17124 7.76144C3.01103 7.19699 2.93092 6.91477 2.9297 6.50182C2.92833 6.0436 3.08969 5.42311 3.31411 5.0236C3.51636 4.66357 3.78117 4.39876 4.3108 3.86913L4.46843 3.7115C4.99987 3.18006 5.2656 2.91433 5.55098 2.76999C6.11854 2.48292 6.7888 2.48292 7.35636 2.76999C7.64174 2.91433 7.90747 3.18006 8.43891 3.7115L8.63378 3.90637C8.98338 4.25597 9.15819 4.43078 9.27247 4.60655C9.70347 5.26945 9.70347 6.12403 9.27247 6.78692C9.15819 6.96269 8.98338 7.1375 8.63378 7.4871C8.51947 7.60142 8.46231 7.65857 8.41447 7.72538C8.24446 7.96281 8.18576 8.30707 8.26748 8.58743C8.29048 8.66632 8.32041 8.72866 8.38028 8.85335Z"
                        stroke="#254A3D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                +412 38 58 17
            </div>
            <div class="info-item">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path
                        d="M12 6V12L16 14M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12Z"
                        stroke="#254A3D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                Lun - Dim 9h - 19h
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'DetailedLocation',
    data() {
        return {
            mainImage: new URL('/assets/sentier-cite.png', import.meta.url).href,
            menuVisible: false
        };
    },
    methods: {
        goBack() {
            this.$router.go(-1);
        },
        toggleMenu() {
            this.menuVisible = !this.menuVisible;
        },
        editLocation() {
            // Logique pour éditer l'emplacement
            console.log('Modifier l\'emplacement');
        },
        deleteLocation() {
            // Logique pour supprimer l'emplacement
            console.log('Supprimer l\'emplacement');
        }
    }
}
</script>

<style scoped>
.detailed-location {
    font-family: Arial, sans-serif;
    padding: 16px;
    color: #254A3D;
}

.header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    color: #254A3D;
}

.back-button {
    background: var(--Sapin-1, #254A3D);
    border: none;
    border-radius: 0.625rem;
    width: 2.5rem;
    height: 2.5rem;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    cursor: pointer;
}

.back-button svg {
    width: 1.5rem;
    height: 1.5rem;
}

.menu-container {
    position: relative;
}

.menu-button {
    background: none;
    border: none;
    font-size: 1.5rem;
    color: #CD9349;
    cursor: pointer;
}

.dropdown-menu {
    position: absolute;
    top: 1.875rem;
    right: 0;
    background: #FFF;
    border: 0.0625rem  solid #CD9349;
    border-radius: 0.5rem;
    box-shadow: 0 0.125rem 0.625rem rgba(0, 0, 0, 0.1);
    display: flex;
    flex-direction: column;
}

.dropdown-menu button {
    background: none;
    border: none;
    padding: 0.5rem 1rem;
    color: #254A3D;
    cursor: pointer;
    text-align: left;
}

.dropdown-menu button:hover {
    background: #FFFAF5;
}

.main-image {
    width: 100%;
    height: auto;
    border-radius: 0.5rem;
    margin-top: 1rem;

}

.title-container {
    display: flex;
    align-items: center;
    gap: 0.5rem;
}


.location-title {
    font-size: 1.5rem;
    color: #254A3D;
    margin-right: 5rem;
}

.location-info {
    display: flex;
    gap: 0.5rem;
    margin-top: 0.5rem;
    color: #254A3D;
}

.description,
.practical-info {
    margin-top: 1rem;
    color: #254A3D;
}

.description p {
    color: #000000;
}

.practical-info .info-item {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    margin-bottom: 0.5rem;
    color: #254A3D;
}
</style>