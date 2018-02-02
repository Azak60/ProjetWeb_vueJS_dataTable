<template>
    <table>

        <thead class="row">
        <tr>
            <th class="col-sm-4">Id</th>
            <th class="col-sm-4">Title</th>
            <th class="col-sm-4">Résumé</th>
            <th class="col-sm-4">Affected To</th>
            <th class="col-sm-4">Client</th>
            <th class="col-sm-4">State</th>
        </tr>
        </thead>

        <tbody class="row">
        <tr class="row" v-for="intervention in interventions" :key="intervention.id">
            <td>{{intervention.id}}</td>
            <td>{{intervention.title}}</td>
            <td>{{intervention.msgIntervention}}</td>
            <td>{{intervention.affectedTo}}</td>
            <td>{{intervention.state}}</td>
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
            interventions: Object(Array)
        },
        components: {
            lineOfTable
        },
        /*data() {
            return {}
        },*/
        data() {
            return {
                oneIntervention: lineOfTable,
                dataInterventions: []
            }
        },
        methods: {
            fetchData() {
                axios.get('https://raw.githubusercontent.com/mdubourg001/datatable_vuejs/master/src/assets/MOCK_DATA.json')
                    .then((response) => {
                        console.log(this);
                        this.dataInterventions = response
                        // console.log(response)
                    })
                    .catch(function (error) {
                        console.log(error)
                    })
            },
            save() {

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