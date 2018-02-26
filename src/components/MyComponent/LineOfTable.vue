<template>
    <tr>
        <td># {{intervention.id}}</td>
        <td>{{intervention.title}}</td>
        <td>{{intervention.msgIntervention}}</td>
        <td>{{intervention.affectedTo}}</td>
        <td>{{intervention.client}}</td>
        <td>{{intervention.state}}</td>
        <td><img src="/node_modules/octicons/build/svg/trashcan.svg" /><input type="button" value="Supprimer" @click="deleteIntervention(intervention.id)"/></td>
    </tr>
</template>

<script>

    import AddData from './AddData.vue'

    export default {
        name: "line-of-table",
        props: {
            intervention: {
                id: Number,
                title: String,
                msgIntervention: String,
                affectedTo: String,
                client: String,
                state: Boolean
            }
        },
        data() {
            return {
                id: 0,
                title: '',
                msgIntervention: '',
                affectedTo: '',
                client: '',
                state: '',
                isClicked: ''
            }
        },
        methods: {
            sendParentInfo() {
                // this.$emit('toto', this.value)
            }
        }
    }
</script>

<style scoped>

</style>