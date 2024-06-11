<script setup>
import axios from "../composable/axios.js";
import MonthlyHikesChart from '@/components/MonthlyHikesChart.vue';
import { inject, onMounted, ref } from 'vue';
import { runs, fetchRuns } from '../composable/fetchRuns.js';

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
        console.error('Erreur lors de la déconnexion:', error);
    }
}

const isAuthenticated = inject('isAuthenticated', ref(false));
const user = inject('user', ref(null));

onMounted(() => {
    fetchRuns();
});
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
        <div id="profile" class="scrollable" v-if="isAuthenticated">
            <section class="informations">
                <h1>Mon profil</h1>
                <img src="../../svg/pp.svg" alt="Photo de profil">
                <h2 v-if="user">
                    {{ `${user.firstname} ${user.lastname}` }}
                </h2>
            </section>

            <section class="dashboard">
                <h2>Dashboard</h2>
                <div class="dashboard-grid">
                    <div class="dashboard-frame">
                        <div class="dashboard-content">{{ user.nb_km_done }} km</div>
                        <div class="dashboard-label">Distance parcourue</div>
                    </div>
                    <div class="dashboard-frame">
                        <div class="dashboard-content">{{ Math.round(user.nb_runs_done) }}/{{ runs.length }}</div>
                        <div class="dashboard-label">Sentiers parcourus</div>
                    </div>

                    <div class="dashboard-frame">
                        <div class="dashboard-content">{{ user.nb_km_done / 0.76 }}</div>
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
