<script setup>
import { useRouter } from 'vue-router';

const router = useRouter();

function redirectToLogin() {
    router.push('/login');
}
</script>

<template>
    <main>
        <div id="profile">
            <section class="informations">
                <img src="../../svg/pp.svg" alt="Photo de profil">
                <h2>Jean-Michel <svg width="20" height="20" viewBox="0 0 22 22" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M1.5 20.5001L7.04927 18.3657C7.40421 18.2292 7.58168 18.161 7.74772 18.0718C7.8952 17.9927 8.0358 17.9013 8.16804 17.7987C8.31692 17.6831 8.45137 17.5487 8.72028 17.2798L20 6.00006C21.1046 4.89549 21.1046 3.10463 20 2.00006C18.8955 0.895489 17.1046 0.895488 16 2.00006L4.72028 13.2798C4.45138 13.5487 4.31692 13.6831 4.20139 13.832C4.09877 13.9643 4.0074 14.1049 3.92823 14.2523C3.83911 14.4184 3.77085 14.5959 3.63433 14.9508L1.5 20.5001ZM1.5 20.5001L3.55812 15.149C3.7054 14.7661 3.77903 14.5746 3.90534 14.4869C4.01572 14.4103 4.1523 14.3813 4.2843 14.4065C4.43533 14.4354 4.58038 14.5804 4.87048 14.8705L7.12957 17.1296C7.41967 17.4197 7.56472 17.5648 7.59356 17.7158C7.61877 17.8478 7.58979 17.9844 7.51314 18.0947C7.42545 18.2211 7.23399 18.2947 6.85107 18.442L1.5 20.5001Z"
                            stroke="#254A3D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </h2>
            </section>

            <section class="dashboard">
                <h2>Dashboard</h2>
            </section>

            <section class="dashboard">
                <h2>Vos succès</h2>
            </section>

            <section class="auth-section">
                <button @click="redirectToLogin" class="auth-button">S'authentifier</button>
            </section>
        </div>
    </main>
</template>

<style scoped>
#profile {
    padding: 5vw;
}

section {
    margin-bottom: 8vh;
}

.auth-section {
    display: flex;
    justify-content: center;
}

.auth-button {
    background-color: #254A3D;
    color: white;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    border-radius: 5px;
    cursor: pointer;
}

.auth-button:hover {
    background-color: #1e3a2f;
}
</style>
