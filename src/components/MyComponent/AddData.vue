<template>
    <div :v-if="'this.data.showComponent=true'" :default="false">
        <form method="post" action="#" id="formAddData"
        @submit.prevent="saveData()">

            <h2>Ajouter une intervention</h2>
            <input type="text" placeholder="Objet de l'intervention ..." name="txtTitleInput" id="titleInput" :v-model="this.ToolData.titleInput" />
            <input type="text" placeholder="Message de l'intervention ..." name="txtMsgInterventionInput" id="msgInterventionInput" :v-model="this.ToolData.msgInterventionInput" />
            <input type="text" placeholder="Affecté à ..." name="txtAffectedToInput" id="AffectedToInput" :v-model="this.ToolData.affectedToInput" />
            <input type="text" placeholder="Client" name="txtClientInput" id="clientInput" :v-model="this.ToolData.titleInput" />
            <input type="text" placeholder="Etat" name="txtStateInput" id="stateInput" :v-model="this.ToolData.stateInput" />

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
                showComponent: false,
                ToolData: {
                    idInput: '',
                    titleInput: '',
                    msgInterventionInput: '',
                    affectedToInput: '',
                    clientInput: '',
                    stateInput: ''
                }
            }
        },
        methods: {
            sendParentInfo() {
                this.$emit('addIntervention', this.ToolData)
            },
            saveData() {
                this.dataInterventions.push();
                this.newname = ''
            }
        }
    }
</script>

<style scoped>

</style>