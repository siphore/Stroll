<script setup>
import axios from "../composable/axios.js";
import MonthlyHikesChart from '@/components/MonthlyHikesChart.vue';
import { inject } from 'vue';

function redirectToLogin() {
    window.location.href = "/login";
}

function redirectToRegister() {
    window.location.href = "/register";
}

function viewHistory() {
    window.location.href = '#historique';
}

async function logout() {
    try {
        await axios.post('/logout');
        window.location.href = '/';
    } catch (error) {
        console.error('Error logging out:', error);
    }
}

const isAuthenticated = inject('isAuthenticated');
const user = inject('user');
</script>

<template>
    <main>
        <!-- Déconnecté -->
        <div id="profile" class="scrollable" v-if="!isAuthenticated">
            <h1>Mon profil</h1>
            <p>
                Identifie-toi pour visualiser les résultats de tes parcours de sentier et suivre tes progrès.
            </p>
            <img class="cover"
                src="https://images.unsplash.com/photo-1595202761821-57d3a4e5dc9f?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8c2VudGllciUyMGRlJTIwcmFuZG9ubiVDMyVBOWV8ZW58MHx8MHx8fDA%3D"
                alt="">
            <div class="buttons">
                <button @click="redirectToLogin" class="btn-primary">S'authentifier</button>
                <button @click="redirectToRegister" class="btn-secondary">Créer un compte</button>
            </div>
        </div>

        <!-- Connecté -->
        <div id="profile" class="scrollable">
            <section class="informations">
                <h1>Mon profil</h1>
                <img src="../../svg/pp.svg" alt="Photo de profil">
                <h2 v-if="user">
                    {{ `${user.firstname} ${user.lastname}` }}
                    <!-- <svg width="20" height="20" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M1.5 20.5001L7.04927 18.3657C7.40421 18.2292 7.58168 18.161 7.74772 18.0718C7.8952 17.9927 8.0358 17.9013 8.16804 17.7987C8.31692 17.6831 8.45137 17.5487 8.72028 17.2798L20 6.00006C21.1046 4.89549 21.1046 3.10463 20 2.00006C18.8955 0.895489 17.1046 0.895488 16 2.00006L4.72028 13.2798C4.45138 13.5487 4.31692 13.6831 4.20139 13.832C4.09877 13.9643 4.0074 14.1049 3.92823 14.2523C3.83911 14.4184 3.77085 14.5959 3.63433 14.9508L1.5 20.5001ZM1.5 20.5001L3.55812 15.149C3.7054 14.7661 3.77903 14.5746 3.90534 14.4869C4.01572 14.4103 4.1523 14.3813 4.2843 14.4065C4.43533 14.4354 4.58038 14.5804 4.87048 14.8705L7.12957 17.1296C7.41967 17.4197 7.56472 17.5648 7.59356 17.7158C7.61877 17.8478 7.58979 17.9844 7.51314 18.0947C7.42545 18.2211 7.23399 18.2947 6.85107 18.442L1.5 20.5001Z"
                            stroke="#254A3D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg> -->
                </h2>
            </section>

            <section class="dashboard">
                <h2>Dashboard</h2>
                <div class="dashboard-grid">
                    <div class="dashboard-frame">
                        <div class="dashboard-content">100 km</div>
                        <div class="dashboard-label">Distance parcourue</div>
                    </div>
                    <div class="dashboard-frame">
                        <div class="dashboard-content">25/100</div>
                        <div class="dashboard-label">Sentiers parcourus</div>
                    </div>

                    <div class="dashboard-frame">
                        <div class="dashboard-content">10'000</div>
                        <div class="dashboard-label">Pas effectués</div>
                    </div>
                    <div class="dashboard-frame">
                        <div class="dashboard-progress-container">
                            <div class="dashboard-progress">
                                <div class="progress-bar" style="width: 50%;"></div>
                            </div>
                            <div class="progress-label">3/6</div>
                        </div>
                        <div class="dashboard-label">Objectif de sentier mensuel</div>
                    </div>
                </div>
            </section>

            <!-- ajouter un graphique nombre de balade par année -->
            <section class="graph">
                <div class="dashboard-frame-graph">
                    <div class="dashboard-content fit-text">Nombre de balades par année</div>
                    <MonthlyHikesChart />
                </div>
            </section>

            <div class="buttons">
                <button @click="viewHistory" class="btn-primary">Historique des sentiers</button>
                <button v-if="isAuthenticated" @click="logout" class="btn-secondary btn-cancel">Se déconnecter</button>
            </div>
        </div>
    </main>
</template>

<style scoped>
@import url('../../css/filtres.css');

body {
    background-color: #F5F5F5;
}

#profile {
    padding: 5vw;
    background-color: #F5F5F5;
    height: 100vh;
    overflow-x: hidden;
}

.informations {
    border: 1px solid black;
    border-radius: .7rem;
    padding: 0 1rem;
    background-color: var(--background-nav);
}

.cover {
    width: 90vw;
    height: 30rem;
    margin: 0;
    padding: 0;
    border-radius: 20px;
    margin-bottom: 3vh;
}

section {
    margin-bottom: 10vh;
}

.buttons {
    margin-bottom: 9rem;
}

.btn-primary,
.btn-secondary {
    width: 80vw;
}

.btn-cancel {
    width: 40vw;
    margin-top: 3rem;
}

/* Dashboard */
.dashboard-frame,
.dashboard-frame-graph {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: center;
    border: 0.0625rem solid var(--sapin-2);
    border-radius: 0.75rem;
    background: #fff;
}

.dashboard-grid {
    display: flex;
    flex-direction: column;
    gap: 3rem;
}

.dashboard-frame {
    justify-content: center;
    gap: .5rem;
    width: 9.5rem;
    height: 8rem;
    color: var(--sapin-1);
    padding: 0 1.25rem;
}

.dashboard-content {
    font-size: 2.5rem;
    font-weight: 700;
}

.dashboard-label {
    font-size: 1rem;
    font-weight: 400;
}

.dashboard-frame-graph {
    justify-content: space-between;
    width: 100%;
    height: 13rem;
    padding: 1.5rem 0;

    position: relative;
}

.dashboard-progress-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 100%;
    padding-top: 0.5rem;
}

.dashboard-progress {
    width: 100%;
    height: 20px;
    background: #A1C9BB;
    border-radius: 10px;
    position: relative;
    overflow: hidden;

}

.progress-bar {
    height: 100%;
    background: var(--sapin-1);
    border-radius: 5px;
}

.progress-label {
    color: var(--sapin-1);
    font-size: 1rem;
    font-weight: 700;
    line-height: 1.5rem;
    text-align: center;
}

.fit-text {
    font-size: 1.5rem;
}

/* Desktop */
@media (min-width: 1000px) {
    .cover {
        width: 24rem;
    }
}
</style>
