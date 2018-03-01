<template>
    <div class="row justify-content-center formAddIntervention">
        <form method="post" action="#" id="formAddData" @submit.prevent="addIntervention()">

            <h2>Ajouter une intervention</h2>
            <input required type="text" placeholder="Objet de l'intervention..." name="txtTitleInput" id="titleInput" v-model="titleInput" />
            <input type="text" placeholder="Message de l'intervention..." name="txtMsgInterventionInput" id="msgInterventionInput" v-model="msgInterventionInput" />
            <input required type="text" placeholder="Affecté à..." name="txtAffectedToInput" id="AffectedToInput" v-model="affectedToInput" />

            <br/>

            <input required type="text" placeholder="Client" name="txtClientInput" id="clientInput" v-model="clientInput" />
            <input type="text" placeholder="Etat" name="txtStateInput" id="stateInput" v-model="stateInput" />

            <br/>

            <input type="submit" class="form-control" value="Ajouter une intervention" />
        </form>
    </div>
</template>

<script>
    export default {

        name: "add-data",

        props: {
            newid: Number
        },

        data() {
            return {
                id: 0,
                titleInput: '',
                msgInterventionInput: '',
                affectedToInput: '',
                clientInput: '',
                stateInput: '',

                // Pour incrémenter l'id
                count: 0
            }
        },

        methods: {
            addIntervention() {

                // Affectation des valeurs input
                const newIntervention ={
                    id: this.newid,
                    title: this.titleInput,
                    msgIntervention: this.msgInterventionInput,
                    affectedTo: this.affectedToInput,
                    client: this.clientInput,
                    state: this.stateInput
                };

                // Transmission intervention a créer + Incrément ID
                this.$parent.$emit('create', newIntervention);

                // Mettre à zéro nos variables pour la prochaine création d'intervention
                this.titleInput = "";
                this.msgInterventionInput = "";
                this.affectedToInput = "";
                this.clientInput = "";
                this.stateInput = ""
            }
        }
    }
</script>

<style src="../../stylesheet/stylesheet.css" scoped></style>