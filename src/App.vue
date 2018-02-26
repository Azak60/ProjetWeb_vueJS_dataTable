<template>
    <div id="app" class="container">
        <img src="./assets/logo.png">

        <AddData :newid="newid"></AddData>

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
            AddData
        },

        data(){
            return {
                newIntervention: '',

                updatedIntervention: "",
                idUpdtedIntervention: "",

                column: '',
                newid: '',

            }
        },


        methods: {
            bindEvents() {
                // Récupérer le nombre d'intervention pour déterminer l'id qu'aura la prochaine intervention créée
                this.$on('newData', (interventionsList) => {
                    this.newid = interventionsList.length + 1;
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

<style>
    #app {
        font-family: 'Avenir', Helvetica, Arial, sans-serif;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        text-align: center;
        color: #2c3e50;
        margin-top: 60px;
    }
</style>
