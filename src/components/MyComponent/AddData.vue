<template>
    <div class="row">
        <form method="post" action="#" id="formAddData"
        @submit.prevent="saveData()">

            <h2>Ajouter une intervention</h2>
            <input type="text" placeholder="Objet de l'intervention ..." name="txtTitleInput" id="titleInput" :v-model="titleInput" />
            <input type="text" placeholder="Message de l'intervention ..." name="txtMsgInterventionInput" id="msgInterventionInput" :v-model="msgInterventionInput" />
            <input type="text" placeholder="Affecté à ..." name="txtAffectedToInput" id="AffectedToInput" :v-model="affectedToInput" />
            <input type="text" placeholder="Client" name="txtClientInput" id="clientInput" :v-model="titleInput" />
            <input type="text" placeholder="Etat" name="txtStateInput" id="stateInput" :v-model="stateInput" />

            <input type="submit" value="Ajouter Intervention" />
        </form>
    </div>
</template>

<script>
    import LineOfTable from './LineOfTable'
    export default {
        name: "add-data",
        component: LineOfTable,
        data() {
            return {

                idInput: '',
                titleInput: '',
                msgInterventionInput: '',
                affectedToInput: '',
                clientInput: '',
                stateInput: '',
            }
        },
        methods: {
            saveData() {
                this.dataInterventions.push()
                this.newname = ''
            }
        }
    }
</script>

<style scoped>

</style>