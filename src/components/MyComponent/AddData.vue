<template>
    <div class="row">
        <form method="post" action="#" id="formAddData" @submit.prevent="saveData()">
            <!--<form method="post" action="#" id="formAddData" @submit.prevent="addIntervention()">-->

            <h2>Ajouter une intervention</h2>
            <input type="text" placeholder="Objet de l'intervention ..." name="txtTitleInput" id="titleInput" v-model="titleInput" />
            <input type="text" placeholder="Message de l'intervention ..." name="txtMsgInterventionInput" id="msgInterventionInput" v-model="msgInterventionInput" />
            <input type="text" placeholder="Affecté à ..." name="txtAffectedToInput" id="AffectedToInput" v-model="affectedToInput" />
            <input type="text" placeholder="Client" name="txtClientInput" id="clientInput" v-model="clientInput" />
            <input type="text" placeholder="Etat" name="txtStateInput" id="stateInput" v-model="stateInput" />

            <input type="submit" value="Ajouter Intervention" />
        </form>
    </div>
</template>

<script>
    import LineOfTable from './LineOfTable'

    export default {

        name: "add-data",
        component: LineOfTable,

        props: [
          "dataInterventions"
        ],

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
                },
                // idInput: 0,
                titleInput: '',
                msgInterventionInput: '',
                affectedToInput: '',
                clientInput: '',
                stateInput: '',

                // Pour incrémenter l'id
                count: 0,

                oneIntervention: {
                    id: "",
                    title: "",
                    msgIntervention: "",
                    affectedTo: "",
                    client: "",
                    state: ""
                }
            }
        },
        methods: {
            saveData() {
                // J'incrémente count, donc l'id
                this.count++;


                const item = {
                    id: this.count,
                    title: this.titleInput,
                    msgIntervention: this.msgInterventionInput,
                    affectedTo: this.affectedToInput,
                    client: this.clientInput,
                    state: this.stateInput
                };
                this.$parent.$emit('create', item);

                // Mettre à zéro nos variables pour la prochaine création d'intervention
                this.titleInput = "";
                this.msgInterventionInput = "";
                this.affectedToInput = "";
                this.clientInput = "";
                this.stateInput = ""
                this.newname = ""
            }
        }
    }
</script>

<style scoped>

</style>