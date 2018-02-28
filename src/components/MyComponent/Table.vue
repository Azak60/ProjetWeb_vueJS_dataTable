<template>
    <div>
        <table class="table table-bordered table-striped">
            <thead>
                <tr class="headTable">
                    <th @click="filterByCol('id')">Id</th>
                    <th @click="filterByCol('title')">Title</th>
                    <th @click="filterByCol('msgIntervention')">Résumé</th>
                    <th @click="filterByCol('affectedTo')">Affected To</th>
                    <th @click="filterByCol('client')">Client</th>
                    <th @click="filterByCol('state')">State</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                    <LineOfTable v-for="(intervention, index) in filteredInterventions" :intervention="intervention" :key="index"></LineOfTable>
            </tbody>
            <tfoot>
            </tfoot>
        </table>

        <!-- Pagination-->
        <div
                id="pagination"
                v-for="pageNumber in totalPages"
                v-if="Math.abs(pageNumber - currentPage) < 2 || pageNumber === totalPages || pageNumber === 1"
        >
            <button
                    class="numPages btn btn-info"
                    :key="pageNumber"
                    @click="setPage(pageNumber)"
                    :class="{current: currentPage === pageNumber, last: (pageNumber === totalPages && Math.abs(pageNumber - currentPage) > 3), first:(pageNumber === 1 && Math.abs(pageNumber - currentPage) > 3)}"
            >
                {{ pageNumber }}
            </button>
        </div>

    </div>
</template>

<script>
    import axios from 'axios';
    import LineOfTable from './LineOfTable.vue';

    import fichier from '../../../lib/fichier.json';

    export default {
        name: "Table",
        props: {
            msg: String,
            newIntervention: '',
            updatedIntervention: '',
            idUpdatedIntervention: ''
        },
        components: {
            LineOfTable,
        },

        data() {
            return {
                fichier,

                id: 0,
                title: '',
                msgIntervention: '',
                affectedTo: '',
                client: '',
                state: '',

                dataInterventions: [],

                // Pour le tri des colonnes
                order: "ASC",
                orderBy: "id",

                // Pour la pagination
                nbRows:0,
                currentPage: 1,
                itemsPerPage: 10,
                indexRow: 0

            }
        },

        watch: {
            // Récupère de manière dynamique le denier id (le dernier élément) dans le tableau
            // Ceci car certains éléments peuvent avoir été supprimés, donc récupérer uniquement le nombre total d'éléments n'est pas pertinent
            // Puis transmission de l'id pour incrémentation
            dataInterventions: function(){
                let lastid = this.dataInterventions.length;
                this.$parent.$emit('incrementId', lastid);

                // Pour la pagination
                this.nbRows = this.dataInterventions.length;

                //  Récupère la liste des interventions pour établir la pagination
                this.$parent.$emit('interventionsList', this.dataInterventions);


            },

            // Dès qu'une intervention est créée, on l'ajoute dans le tableau
            newIntervention: function(){
                this.dataInterventions.push(this.newIntervention);

                // Transmission intervention a créer + Incrément ID
                // this.$parent.$emit('incrementId', this.dataInterventions.length);
                // console.log(this.dataInterventions.length + ' après le push');
            },

            // Dès qu'une intervention est modifiée, le tableau se met à jour
            updatedIntervention: function(){
                this.dataInterventions[this.idUpdatedIntervention] = this.updatedIntervention
            }
        },

        computed: {
            // Pour la pagination
            totalPages: function () {
                return Math.ceil(this.nbRows / this.itemsPerPage)
            },

            // Filtrer les données
            filteredInterventions() {
                let compare = function (filter) {
                    return function (a,b) { //closure
                        let c = a[filter],
                            d = b[filter];

                        if (c < d) {
                            return -1;
                        } else if (c > d) {
                            return 1;
                        } else {
                            return 0;
                        }
                    };
                };

                let filter = compare(this.orderBy); //set filter

                let data = this.dataInterventions.sort(filter);

                // Pour la pagination : détermine l'index de la première ligne à afficher sur chaque "page" du tableau
                this.indexRow = this.currentPage * this.itemsPerPage - this.itemsPerPage;

                if (this.order === "ASC") {
                    // Retourne le tableau des interventions (affichant uniquement le nombre de ligne indiqué dans itemsPerPage)
                    return data.slice(this.indexRow, this.indexRow + this.itemsPerPage)
                } else {
                    // Retourne le tableau des interventions filtré. Affichant toujours le nombre de ligne indiqué dans itemsPerPage
                    return data.reverse().slice(this.indexRow, this.indexRow + this.itemsPerPage)
                }
            }
        },

        methods: {
            // Pour la pagination
            setPage: function(pageNumber) {
                this.currentPage = pageNumber
            },


            // Récupérer les données depuis le fichier JSON
            fetchData() {
                this.dataInterventions = fichier;



                // axios.get('https://raw.githubusercontent.com/mdubourg001/datatable_vuejs/master/src/assets/MOCK_DATA.json')
                //     .then((response) => {
                //         this.dataInterventions = response.data;
                //
                //         // this.$parent.$emit('newData', (response.data));
                //     })
                //     .catch(function (error) {
                //         console.log(error)
                //     })
            },

            filterByCol(col) {
                if (this.orderBy === col) {
                    if (this.order === "ASC") {
                        this.order = "DESC"
                    } else {
                        this.order = "ASC"
                    }
                } else {
                    this.order = "ASC";
                    this.orderBy = col
                }
            }
        },

        mounted() {
            this.fetchData()

            // Modification d'une intervention
            this.$on('update', (updatedIntervention, index)=> {
                this.dataInterventions[index] = updatedIntervention;
            })

            // Suppression d'une intervention
            this.$on('delete', (idIntervention) => {
                this.dataInterventions.splice(idIntervention, 1)
            })
        }
    }
</script>

<style src="../../stylesheet/stylesheet.css" scoped></style>