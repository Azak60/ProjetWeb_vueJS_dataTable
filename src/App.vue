<template>
    <div id="app" class="container">
        <img src="./assets/societeLogo.jpg" class="logo">

        <AddData :newid="newid"></AddData>

        <!-- Ajout d'une ligne horizontale -->
        <hr>

        <h1 class="tableTitle">Tableau des interventions</h1>

        <InterventionsList
                :newIntervention="newIntervention">
        </InterventionsList>

    </div>
</template>

<script>
    import Table from './components/MyComponent/Table';
    import AddData from './components/MyComponent/AddData';

    export default {
        name: 'app',
        components: {
            InterventionsList:Table,
            AddData,
        },

        data(){
            return {
                newIntervention: '',

                // Id pour une nouvelle intervention créée
                newid: 0,

                // Récupère toutes les interventions pour l'envoyer au composant Pagination
                allInterventions:[],

            }
        },

        methods: {
            bindEvents() {
                // Récupérer le nombre d'intervention pour déterminer l'id qu'aura la prochaine intervention créée
                    this.$on('incrementId', (lastid) => {
                        this.newid = lastid + 1;



        // ###############################################################
                        // this.$on('newData', (interventionsList) => {

                    // // Si newid est inférieur à la longueur du tableau initial (Jeu de données obtenu via le fichier JSON)
                    // // Alors newid sera égal à la longueur de ce tableau + 1
                    // if(this.newid < interventionsList.length){
                    //     this.newid = interventionsList.length + 1;
                    //
                    // // Sinon on récupère la longueur du nouveau tableau (avec les interventions créées / "pushées")
                    // // Alors newid sera égal à cette longueur de tableau
                    //     this.$on('incrementId', (updatedListLength) => {
                    //         console.log(updatedListLength + ' 1er tour');
                    //         this.newid = updatedListLength;
                    //     });
                    // } else {
                    //     this.$on('incrementId', (updatedListLength) => {
                    //         console.log(updatedListLength + ' 2nd tour');
                    //         this.newid = updatedListLength + 1;
                    //     });
                    // }

                    // Utile pour la pagination
                    // this.nbRows = interventionsList.length;
        // ###############################################################

                });

                // Création d'une intervention
                this.$on('create', (createdIntervention) => {
                    this.newIntervention = createdIntervention;
                });

            }
        },

        mounted() {
            this.bindEvents()
        }
    }
</script>

<style src="./stylesheet/stylesheet.css" scoped></style>