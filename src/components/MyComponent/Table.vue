<template>
    <table>
        <thead class="row">
            <tr>
                <th class="col-2">Id</th>
                <th class="col-2">Title</th>
                <th class="col-2">Résumé</th>
                <th class="col-2">Affected To</th>
                <th class="col-2">Client</th>
                <th class="col-2">State</th>
            </tr>
        </thead>

        <tbody class="row">
            <tr class="row" v-for="intervention in dataInterventions" :key="dataInterventions.id">
                <td class="col-2"># {{intervention.id}}</td>
                <td class="col-2">{{intervention.title}}</td>
                <td class="col-2">{{intervention.msgIntervention}}</td>
                <td class="col-2">{{intervention.affectedTo}}</td>
                <td class="col-2">{{intervention.client}}</td>
                <td class="col-2">{{intervention.state}}</td>
            </tr>
        </tbody>
        <tfoot class="row">

        </tfoot>
    </table>
</template>

<script>
    import axios from 'axios';
    import lineOfTable from './../../components/MyComponent/lineOfTable';

    export default {
        name: "Table",
        props: {
            msg: String,
            // interventions: Object(Array)
        },
        components: {
            lineOfTable
        },
        /*data() {
            return {}
        },*/
        data() {
            return {
                id: '',
                title: '',
                msgIntervention: '',
                affectedTo: '',
                client: '',
                state: '',

                // oneIntervention: lineOfTable,
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
                }

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