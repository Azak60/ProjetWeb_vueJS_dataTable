<template>
    <tr class="row">
        <td class="col-2"># {{intervention.id}}</td>
        <td class="col-2">{{intervention.title}}</td>
        <td class="col-2">{{intervention.msgIntervention}}</td>
        <td class="col-2">{{intervention.affectedTo}}</td>
        <td class="col-2">{{intervention.client}}</td>
        <td class="col-2">{{intervention.state}}</td>
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