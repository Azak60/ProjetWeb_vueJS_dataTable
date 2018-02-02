<template>
    <div id="app">
        <Table :interventions=this.interventions></Table>

        <!--<HelloWorld msg="Welcome to Your Vue.js App"/>-->
    </div>
</template>

<script>
    // import HelloWorld from './components/HelloWorld.vue';
    import Table from './components/MyComponent/Table';


    export default {
        name: 'app',
        components: {
            Table
        },
        data() {
            return {
                id: '',
                title: '',
                resume: '',
                affectedTo: '',
                client: '',
                state: '',
                interventions: [
                    {
                        id: '1',
                        title: 'Correction de bug',
                        resume: 'Correction d\'un bug impactant les serveurs back-end.',
                        affectedTo: 'Nicolas',
                        client: 'CGI',
                        state: false
                    },
                    {
                        id: '2',
                        title: 'Réparation de PC',
                        resume: 'Répération de la carte graphique défaillante',
                        affectedTo: 'Cyril',
                        client: 'CGI',
                        state: false
                    }
                ]
            }
        }
    }
</script>

<style>
    #app {
        font-family: 'Avenir', Helvetica, Arial, sans-serif;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        text-align: center;
        color: #2c3e50;
        margin-top: 60px;
    }
</style>
