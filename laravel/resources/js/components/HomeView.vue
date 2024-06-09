<template>
    <div id="home" class="scrollable">
        <div id="logo">
            <img src="../../svg/logo.svg" alt="logo">
        </div>

        <section>
            <h1 v-if="user">Bienvenue, {{ user.firstname }}</h1>
            <h1 v-else>Bienvenue</h1>
            <h4>
                Explore les merveilles du Canton de Vaud. Tout près de chez toi, découvre des coins incroyables
                et partage ces aventures avec tes proches.
            </h4>
        </section>

        <img class="section-img" src="../../img/accueil_1.png" alt="Image de présentation">

        <!-- <ImageSlider /> -->

        <section>
            <h1>Balade coup de &#x2665 du jour</h1>
            <h4>
                Laisse-toi surprendre en découvrant le patrimoine vaudois, riche en histoire et lieux
                emblématiques pour un moment sympas avec ceux que tu aimes.
            </h4>
        </section>

        <img class="section-img" src="../../img/accueil_2.png" alt="Image de présentation">

        <!-- <SentierCoeur /> -->

        <section>
            <h1>VDiscover</h1>
            <h4>
                Profite des richesses culturelles de notre magnifique région via nos parcours ludiques conçus pour
                toutes et tous. Que tu sois passionné-e par la gastronomie, la plage, l'architecture, l'histoire ou
                le street art, nos sentiers t'invite à l'aventure, la vraie !
            </h4>
        </section>

        <img class="section-img" src="../../img/accueil_3.png" alt="Image de présentation">

        <!-- <slot name="vdiscover-image"></slot> -->

        <section>
            <h1>Aventures locales</h1>
            <h4>
                Sois émerveillé,-e par la beauté et l'histoire du Canton, de ces villages pittoresques aux
                monuments citadins de la belle époque. Explore notre carte interactive pour trouver le sentier idéal.
            </h4>

            <CustomButton text="Découvre la région" link="#carte" color="#A1C9BB">
                <template #icon>
                    <img src="../../svg/accueil_carte.svg">
                </template>
            </CustomButton>
        </section>

        <img class="section-img" src="../../img/accueil_4.png" alt="Image de présentation">

        <!-- <slot name="aventures-locales-image"></slot> -->

        <section>
            <h1>À ton rythme</h1>
            <h4>
                Vis des aventures uniques ! Que tu sois grand,-e sportif,-ve, parents de deux enfants surexcités
                ou retraité,-e passionné,-e par la nature, notre app t'offre le sentier que tu recherches.
                N'hésite pas à utiliser nos filtres pour trouver le parcours qui te conviendra le mieux.
            </h4>

            <CustomButton text="Parcours les chemins vaudois" link="#sentiers" color="#254A3D">
                <template #icon>
                    <img src="../../svg/accueil_sentiers.svg">
                </template>
            </CustomButton>
        </section>

        <img class="section-img" src="../../img/accueil_5.png" alt="Image de présentation">

        <section>
            <h1>Proche de chez toi</h1>
            <h4>
                Envie de prendre l'air et se promener près de chez toi ? Trouve les plus jolies balades,
                accessible à seulement quelques minutes à pieds. L'occasion de découvrir les merveilleuses anecdotes qui
                se cachent au coins de chaque rue et colline de ta région.
            </h4>

            <CustomButton text="Trouve ta commune" color="#99442A" :city="city">
                <template #icon>
                    <img src="../../svg/accueil_location.svg">
                </template>
            </CustomButton>
        </section>

        <img class="section-img" src="../../img/accueil_6.png" alt="Image de présentation">

        <!-- <slot name="proche-de-chez-toi-image"></slot> -->

        <section>
            <h1>Tes parcours au même endroit</h1>
            <h4>
                Enregistre tes sentiers préférés pour les retrouver facilement. Via notre app, crée une liste
                personnalisée de parcours à explorer. Pour que chaque sortie soit un moment agréable, ajoute ta
                prochaine escapade culturelle en un clic !
            </h4>

            <CustomButton text="Planifie ta prochaine aventure" color="#CD9349" link="#favoris">
                <template #icon>
                    <img src="../../svg/accueil_favoris.svg">
                </template>
            </CustomButton>
        </section>

        <img class="section-img" src="../../img/accueil_7.png" alt="Image de présentation">

        <!-- <slot name="tes-parcours-image"></slot> -->

        <section>
            <h1>Bon pour la santé et le bien-être</h1>
            <h4>
                Transforme chaque balade en une opportunité de progresser ! Grâce à ton dashboard personnalisé,
                suis les distances parcourues et les sentiers explorés. Ainsi atteint tes objectifs personnels, partage
                tes exploits et enregistre les informations sur l'historique de tes sentiers. Fait de chaque promenade
                une étape vers un mode de vie actif, motivant et enrichissant !
            </h4>

            <CustomButton text="Progresse vers tes objectifs" link="#profil" color="#F18A5C">
                <template #icon>
                    <img src="../../svg/accueil_profil.svg">
                </template>
            </CustomButton>
        </section>

        <!-- <slot name="sante-bien-etre-image"></slot> -->
    </div>
</template>

<script setup>
import { onMounted, inject } from 'vue';
import { getNavHeight } from '../composable/navHeight';
import CustomButton from './CustomButton.vue';

const user = inject('user');

onMounted(() => {
    document.getElementById('home').style.maxHeight = `calc(100vh - ${getNavHeight()}px)`;
})
</script>

<style scoped>
div#home {
    display: flex;
    flex-direction: column;
    align-items: center;
}

#logo {
    margin: 3rem 0;
}

section {
    width: 85vw;
}

/* section:not(section:last-child) {
    margin-bottom: 5rem;
} */

h1 {
    color: var(--Sapin-1, #254A3D);
    font-family: Arimo, sans-serif;
    font-size: 1.7rem;
    font-weight: 600;
}

h4 {
    color: var(--sapin_1);
    font-family: Inter, sans-serif;
    font-size: 1rem;
    font-style: normal;
    font-weight: 450;
    line-height: 155%;
    text-align: justify;
}

.section-img {
    width: 85vw;
    margin: 2.5rem 0;
}

.sentier1 {
    background: var(--sentier-1);
}

.sapin2 {
    background: var(--sapin-2);
}

.sapin1 {
    background: var(--sapin-1);
}

.argile1 {
    background: var(--argile-1);
}

.argile2 {
    background: var(--argile-2);
}

.textbutton {
    font-family: Inter;
    font-size: 16px;
    font-style: normal;
    color: #FFFAF5;
    font-weight: 600;
    line-height: 24px;
    text-decoration: none;
}

.iconbutton {
    display: flex;
    width: 24px;
    height: 24px;
    justify-content: center;
    align-items: center;
    flex-shrink: 0;
}

@media(min-width: 500px) {
    section {
        width: 50vw;
    }
}
</style>
