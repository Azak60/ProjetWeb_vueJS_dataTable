<template>
    <table class="col-12">
        <thead class="row">
            <tr class="col-12">
                    <th class="col-6">Id</th>
                    <th class="col-6">Title</th>
                    <th class="col-6">Résumé</th>
                    <th class="col-6">Affected To</th>
                    <th class="col-6">Client</th>
                    <th class="col-6">State</th>
            </tr>
        </thead>

        <tbody class="row">
            <LineOfTable v-for="intervention in dataInterventions" :intervention="intervention" :key="dataInterventions.id"></LineOfTable>
        </tbody>
        <tfoot class="row">

        </tfoot>
    </table>
</template>

<script>
    import axios from 'axios';
    import LineOfTable from './LineOfTable';

    export default {
        name: "Table",
        props: {
            msg: String
        },
        components: {
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
                dataInterventions: []
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
            save() {
                const simpleIntervention = {
                    id: this.id,
                    title: this.title,
                    msgIntervention: this.msgIntervention,
                    affectedTo: this.affectedTo,
                    client: this.client,
                    state: this.state
                };

                this.dataInterventions.push(oneIntervention)
            }
        },
        mounted() {
            this.fetchData()
        }
    }
</script>

<style scoped>

</style>