<template>
    <tr >
        <td># {{intervention.id}}</td>
        <td>{{intervention.title}}</td>
        <td>{{intervention.msgIntervention}}</td>
        <td>{{intervention.affectedTo}}</td>
        <td>{{intervention.client}}</td>
        <td>{{intervention.state}}</td>
    </tr>
</template>

<script>
    export default {
        name: "line-of-table",
        props: {
            intervention: {
                id: String,
                title: String,
                msgIntervention: String,
                affectedTo: String,
                client: String,
                state: Boolean
            }
        },
        data() {
            return {
                id: '',
                title: '',
                msgIntervention: '',
                affectedTo: '',
                client: '',
                state: '',
                isClicked: ''
            }
        }
    }
</script>

<style scoped>

</style>