<template>
    <table >
        <thead >
            <tr>
                    <th @click="filter('id')">Id</th>
                    <th>Title</th>
                    <th>Résumé</th>
                    <th>Affected To</th>
                    <th>Client</th>
                    <th>State</th>
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
    import LineOfTable from './LineOfTable';
    import HeaderTable from './HeaderTable';

    export default {
        name: "Table",
        props: {
            msg: String
        },
        components: {
            HeaderTable,
            LineOfTable
        },
        data() {
            return {
                id: '',
                title: '',
                msgIntervention: '',
                affectedTo: '',
                client: '',
                state: '',

                dataInterventions: [],

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

                let filter = compare("id"); //set filter

                return this.dataInterventions.sort(filter)
            }
        },
        methods: {
            fetchData() {
                axios.get('https://raw.githubusercontent.com/mdubourg001/datatable_vuejs/master/src/assets/MOCK_DATA.json')
                    .then((response) => {
                        console.log(this);
                        this.dataInterventions = response.data
                    })
                    .catch(function (error) {
                        console.log(error)
                    })
            },
            addIntervention() {
                const simpleIntervention = {
                    id: this.id,
                    title: this.title,
                    msgIntervention: this.msgIntervention,
                    affectedTo: this.affectedTo,
                    client: this.client,
                    state: this.state
                };

                this.dataInterventions.push(simpleIntervention)
            },
            filter(col) {

            }
        },
        mounted() {
            this.fetchData()
        }
    }
</script>

<style scoped>

</style>