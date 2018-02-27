<template>
    <div id="toolData">
        <div :v-show="add === true">
            <form method="post" action="#" id="formAddData"
                  @submit.prevent="saveData()">

                <h2>Ajouter une intervention</h2>
                <input type="text" placeholder="Objet de l'intervention ..." name="txtTitleInput" id="titleInput"
                       :v-model="Line.title"/>
                <input type="text" placeholder="Message de l'intervention ..." name="txtMsgInterventionInput"
                       id="msgInterventionInput" :v-model="Line.msgInterventionInput"/>
                <input type="text" placeholder="Affecté à ..." name="txtAffectedToInput" id="AffectedToInput"
                       :v-model="Line.affectedToInput"/>
                <input type="text" placeholder="Client" name="txtClientInput" id="clientInput"
                       :v-model="Line.titleInput"/>
                <input type="text" placeholder="Etat" name="txtStateInput" id="stateInput"
                       :v-model="Line.stateInput"/>

                <input type="submit" value="Ajouter l'Intervention"/>
            </form>
        </div>

        <div :v-show="edit === 'true'">
            <form method="post" action="#" id="formEditData"
                  @submit.prevent="saveData()">

                <h2>Editer une intervention</h2>
                <input type="text" placeholder="Objet de l'intervention ..." name="txtTitleInput" id="titleInput"
                       :v-model="Line.title"/>
                <input type="text" placeholder="Message de l'intervention ..." name="txtMsgInterventionInput"
                       id="msgInterventionInput" :v-model="Line.msgInterventionInput"/>
                <input type="text" placeholder="Affecté à ..." name="txtAffectedToInput" id="AffectedToInput"
                       :v-model="Line.affectedToInput"/>
                <input type="text" placeholder="Client" name="txtClientInput" id="clientInput"
                       :v-model="Line.titleInput"/>
                <input type="text" placeholder="Etat" name="txtStateInput" id="stateInput"
                       :v-model="Line.stateInput"/>

                <input type="submit" value="Editer l'Intervention"/>
            </form>
        </div>
    </div>
</template>

<script>
    import LineOfTable from './LineOfTable'

    export default {
        name: "tool-data",
        component: LineOfTable,

        props: {
            LineOfTable: Object(LineOfTable)
        },
        data() {
            return {
                add: false,
                edit: false,
                Line: Object(LineOfTable)
            }
        },
        methods: {
            sendParentInfo() {
                this.$emit('addIntervention', this.ToolData)
            },
            saveData(action) {
                this.$emit('saveData');
                this.newname = ''
            },
        },
        mounted: {
            init: {
                data() {
                    add = true;
                    edit = false;
                }
            }
        }
    }
</script>

<style scoped>

</style>