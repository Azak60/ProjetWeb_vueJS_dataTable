<template>
    <div>
        <footer>
            <p>Suis-je fou ? Page n° {{total}}</p>
        </footer>
        <p>Vous êtes en page : {{currentPage}}</p>
    </div>
</template>

<script>
    export default {
        name: "pagination",

        props:{
            nbRow:'',
        },

        data () {
            return {
                currentPage: 1,
                total: "",
            }
        },

        watch: {
            nbRows(){
                this.total = this.nbRows;
            }
        }



    }



</script>

<style scoped>

</style>