<template>
    <table >
        <thead >
            <tr>
                <th @click="filterByCol('id')">Id</th>
                <th @click="filterByCol('title')">Title</th>
                <th @click="filterByCol('msgIntervention')">Résumé</th>
                <th @click="filterByCol('affectedTo')">Affected To</th>
                <th @click="filterByCol('client')">Client</th>
                <th @click="filterByCol('state')">State</th>

                <!--<th v-for="column in colName">{{column}}</th>-->
            </tr>
        </thead>

        <tbody>
                <LineOfTable v-for="intervention in filteredInterventions" :intervention="intervention" :key="dataInterventions.id"></LineOfTable>
        </tbody>
        <tfoot>

        </tfoot>
    </table>
</template>

<script>
    import axios from 'axios';
    import LineOfTable from './LineOfTable.vue';
    import AddData from './AddData.vue';

    export default {
        name: "Table",
        props: {
            msg: String,
            newintervention: ''
        },
        components: {
            LineOfTable
        },

        watch: {
            newintervention(){
                this.dataInterventions.push(this.newintervention)
            },


        },

        data() {
            return {
                id: 0,
                title: '',
                msgIntervention: '',
                affectedTo: '',
                client: '',
                state: '',

                dataInterventions: [],
                // intervention: {},

                order: "ASC",
                orderBy: "id"
            }
        },
        computed: {

            filteredInterventions() {
                let compare = function (filter) {
                    return function (a,b) { //closure
                        let c = a[filter],
                            d = b[filter];

                        if (c < d) {
                            return -1;
                        }else if (c > d) {
                            return 1;
                        } else {
                            return 0;
                        }
                    };
                };

                let filter = compare(this.orderBy); //set filter

                var data = this.dataInterventions.sort(filter);

                if (this.order == "ASC") {
                    return data
                } else {
                    return data.reverse()
                }
            },

            // getLastId(){
            //     return this.intervention[this.intervention.length - 1].id;
            // }
        },

        methods: {
            fetchData() {
                axios.get('https://raw.githubusercontent.com/mdubourg001/datatable_vuejs/master/src/assets/MOCK_DATA.json')
                    .then((response) => {
                        console.log(this);
                        this.dataInterventions = response.data;

                        this.$parent.$emit('newData', (response.data));
                    })
                    .catch(function (error) {
                        console.log(error)
                    })
            },

            filterByCol(col) {
                if (this.orderBy == col) {
                    if (this.order == "ASC") {
                        this.order = "DESC"
                    } else {
                        this.order = "ASC"
                    }
                } else {
                    this.order = "ASC"
                    this.orderBy = col
                }
            }
        },
        mounted() {
            this.fetchData()
        }
    }
</script>

<style scoped>

</style>