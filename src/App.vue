<template>
    <div id="app" class="container">
        <img src="./assets/societeLogo.jpg">

        <AddData :newid="newid"></AddData>

        <InterventionsList
                :newIntervention="newIntervention">
        </InterventionsList>

        <Pagination :nbRows="nbRows"></Pagination>

    </div>
</template>

<script>
    import Table from './components/MyComponent/Table';
    import AddData from './components/MyComponent/AddData';
    import Pagination from './components/MyComponent/Pagination';

    export default {
        name: 'app',
        components: {
            InterventionsList:Table,
            AddData,
            Pagination
        },

        data(){
            return {
                newIntervention: '',

                updatedIntervention: "",
                idUpdtedIntervention: "",

                newid: '',

                rows: '',
                nbRows:''

            }
        },


        methods: {
            bindEvents() {
                // Récupérer le nombre d'intervention pour déterminer l'id qu'aura la prochaine intervention créée
                this.$on('newData', (interventionsList) => {
                    this.rows = interventionsList.length;
                    this.newid = this.rows++;
                    this.nbRows = interventionsList.length;
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
