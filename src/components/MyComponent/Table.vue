<template>
    <table>
        <thead>
            <HeaderTable></HeaderTable>
        </thead>

        <tbody class="row">
            <LineOfTable v-for="intervention in dataInterventions" :intervention="intervention"
                     :key="dataInterventions.id"
                     :v-on:addLigne="addIntervention"></LineOfTable>
        </tbody>
        <tfoot class="row">

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
            }
        },
        mounted() {
            this.fetchData()
        }
    }
</script>

<style scoped>

</style>