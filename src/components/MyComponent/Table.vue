<template>
    <table>
        <thead class="row">
            <tr>
                <th class="col">Id</th>
                <th class="col">Title</th>
                <th class="col">Résumé</th>
                <th class="col">Affected To</th>
                <th class="col">Client</th>
                <th class="col">State</th>
            </tr>
        </thead>

        <tbody>
            <tr class="row" v-for="intervention in dataInterventions" :key="dataInterventions.id">
                <td scope="col"># {{intervention.id}}</td>
                <td class="col">{{intervention.title}}</td>
                <td class="col">{{intervention.resume}}</td>
                <td class="col">{{intervention.affectedTo}}</td>
                <td class="col">{{intervention.client}}</td>
                <td class="col">{{intervention.state}}</td>
            </tr>
        </tbody>
        <tfoot class="row">

        </tfoot>
    </table>
</template>

<script>
    import axios from 'axios';
    import lineOfTable from './../../components/MyComponent/lineOfTable';
    import deleteTable from './../../components/MyComponent/deleteTable';

    export default {
        name: "Table",
        props: {
            msg: String,
            // interventions: Object(Array)
        },
        components: {
            lineOfTable,
            deleteTable
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