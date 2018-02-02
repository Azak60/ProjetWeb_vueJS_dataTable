<template>
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Resume</th>
                    <th>Affected To</th>
                    <th>Client</th>
                    <th>State</th>
                </tr>
            </thead>

            <tbody>
            <tr v-for="intervention in interventions" :key="intervention.id">
                <td>{{intervention.id}}</td>
                <td>{{intervention.title}}</td>
                <td>{{intervention.resume}}</td>
                <td>{{intervention.affectedTo}}</td>
                <td>{{intervention.state}}</td>
            </tr>
            </tbody>
            <tfoot></tfoot>
        </table>

</template>

<script>
    import axios from 'axios';

    export default {
        name: "Table",
        props: {
            msg: String,
            interventions: Object(Array)

            },
        data() {
            return {
                dataInterventions: []
            }
        },
        methods: {
            fetchData() {
                axios.get('https://raw.githubusercontent.com/mdubourg001/datatable_vuejs/master/src/assets/MOCK_DATA.json')
                    .then((response) => {
                        console.log(this);
                        this.dataInterventions = response
                        // console.log(this);
                        // console.log(response)
                    })
            .catch(function (error) {
                    console.log(error)
                })
            }
        },
        mounted() {
            this.fetchData()
        }
    }
</script>

<style scoped>

</style>