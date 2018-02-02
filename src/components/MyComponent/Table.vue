<template>
    <b-row :name="mainTable" id="mainTable">
        <table>
            <thead>
            <tr>
                <b-col-sm><th>Id</th></b-col-sm>
                <b-col-sm><th>Title</th></b-col-sm>
                <b-col-sm><th>Resume</th></b-col-sm>
                <b-col-sm><th>Affected To</th></b-col-sm>
                <b-col-sm>Client</b-col-sm>
                <b-col-sm>State</b-col-sm>
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
    </b-row>
</template>

<script>
    export default {
        name: "Table",
        props: {
            msg: String,
            interventions: Array()
        },
        data() {
            return {}
        }
    }
</script>

<style scoped>

</style>