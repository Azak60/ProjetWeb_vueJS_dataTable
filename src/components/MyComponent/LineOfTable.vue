<template>
    <tr>
        <!--// NE PAS FAIRE DE CHANGEMENT SUR L'ID-->

        <td class="align-middle">
           #{{intervention.id}}
        </td>

        <td class="align-middle">
            <input type="text" @keyup.enter='saveEdit()' class="form-control" v-if='editState' v-model='title'>
            <span v-else>{{intervention.title}}</span>
        </td>

        <td class="align-middle">
            <input type="text" @keyup.enter='saveEdit()' class="form-control" @keyup.escape="switchEdit()" v-if='editState' v-model='msgIntervention'>
            <span v-else>{{intervention.msgIntervention}}</span>
        </td>

        <td class="align-middle">
            <input type="text" @keyup.enter='saveEdit()' class="form-control" @keyup.escape="switchEdit()" v-if='editState' v-model='affectedTo'>
            <span v-else>{{intervention.affectedTo}}</span>
        </td>

        <td class="align-middle">
            <input type="text" @keyup.enter='saveEdit()' class="form-control" @keyup.escape="switchEdit()" v-if='editState' v-model='client'>
            <span v-else>{{intervention.client}}</span>
        </td>

        <td class="align-middle">
            <input type="text" @keyup.enter='saveEdit()' class="form-control" @keyup.escape="switchEdit()" v-if='editState' v-model='state'>
            <span v-else>{{intervention.state}}</span>
        </td>

        <td class="align-middle">
            <!-- Bouton pour modifier la ligne -->
            <button type="button" class="btn btn-info buttonLine" @click="switchEdit()"><i class="fas fa-edit"></i></button><br/>

            <!-- Bouton pour supprimer la ligne -->
            <button type="button" class="btn btn-danger buttonLine" @click="deleteIntervention()"><i class="fas fa-trash-alt"></i></button>

            <!--<button type="button" class="btn btn-info" @click="switchEdit()">Modifier</button>-->



            <!-- Button pour activer le modal -->
            <!--<div class="input-group-prepend">-->
                <!--<button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</button>-->
                <!--<div class="dropdown-menu">-->
                    <!--<a class="dropdown-item" href="#">Action</a>-->
                    <!--<a class="dropdown-item" href="#">Another action</a>-->
                    <!--<a class="dropdown-item" href="#">Something else here</a>-->
                    <!--<div role="separator" class="dropdown-divider"></div>-->
                    <!--<a class="dropdown-item" href="#">Separated link</a>-->
                <!--</div>-->
            <!--</div>-->
            <!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">-->
                <!--Voir plus...-->
            <!--</button>-->
        </td>
    </tr>
</template>

<script>

    export default {
        name: "line-of-table",

        props: {
            intervention: {
                id: Number,
                title: String,
                msgIntervention: String,
                affectedTo: String,
                client: String,
                state: String,
            }
        },

        data() {
            return {
                // Les données initiales
                id: this.intervention.id,
                title: this.intervention.title,
                msgIntervention: this.intervention.msgIntervention,
                affectedTo: this.intervention.affectedTo,
                client: this.intervention.client,
                state: this.intervention.state,

                // // Les inputs ont comme valeur par défaut les valeurs de l'intervention
                // idUpdated: this.intervention.id,
                // titleUpdated: this.intervention.title,
                // msgInterventionUpdated: this.intervention.msgIntervention,
                // affectedToUpdated: this.intervention.affectedTo,
                // clientUpdated: this.intervention.client,
                // stateUpdated: this.intervention.state,

                editState: false

            }
        },

        methods:{
            switchEdit(){
                this.editState = !this.editState;
            },

            saveEdit() {
                const updatedIntervention = {
                    id: this.intervention.id,
                    title: this.title,
                    msgIntervention: this.msgIntervention,
                    affectedTo: this.affectedTo,
                    client: this.client,
                    state: this.state
                };

                let idToChange = this.intervention.id - 1;

                this.$parent.$emit('update', updatedIntervention, idToChange);

                // Mettre à zéro nos variables pour la prochaine création d'intervention
                // this.id = '';
                // this.title = '';
                // this.msgIntervention = '';
                // this.affectedTo = '';
                // this.client = '';
                // this.state = '';

                // Remise à true de edit pour revenir à une valeur du tableau non modificable
                this.editState = !this.editState;
            },

            deleteIntervention () {
                if ( this.id >= 0 ) {
                    let idToDelete = this.id - 1;
                    this.$parent.$emit('delete', idToDelete)
                }
            }
        }
    }
</script>

<style src="../../stylesheet/stylesheet.css" scoped></style>