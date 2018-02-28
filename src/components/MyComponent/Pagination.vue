<template>
    <!--<div id=pagination>-->
        <!--<p>La pagination est ici</p>-->

        <!--<ul v-if="display">-->
            <!--<li v-for="intervention in paginate">{{ intervention.id }}</li>-->
        <!--</ul>-->

        <!--<ul>-->
            <!--<li v-for="pageNumber in totalPages" v-if="Math.abs(pageNumber - currentPage) < 3 || pageNumber === totalPages || pageNumber === 1">-->
                <!--<a :key="pageNumber"-->
                    <!--href="#"-->
                    <!--@click="setPage(pageNumber)"-->
                    <!--:class="{current: currentPage === pageNumber, last: (pageNumber === totalPages && Math.abs(pageNumber - currentPage) > 3), first:(pageNumber === 1 && Math.abs(pageNumber - currentPage) > 3)}"-->
                    <!--&gt;-->
                        <!--{{ pageNumber }}-->
                <!--</a>-->
            <!--</li>-->
        <!--</ul>-->
    <!--</div>-->




    <div class="row">
        <div class="col-md-12 center">
            <ul class="pager">
                <li>
                    <button @click="paginate('previous')" :disabled="start <= 0">
                        Previous
                    </button>
                </li>
                <li>
                    <button @click="paginate('next')" :disabled="limit >= total">
                        Next
                    </button>
                </li>
            </ul>
        </div>
    </div>

</template>

<script>
    export default {
        name: "pagination",

        props:{
            nbRow:'',
            allInterventions:''
        },

        data(){
            return {
                start: 0,
                limit: null,
                paginationTable: null,
                total: this.allInterventions.length
            }
        },

        created: function() {
            this.limit = parseInt(this.paginationTable);
        },

        watch: {
            paginationTable: function() {
                this.limit = parseInt(this.paginationTable);

                if(this.limit !== this.start && this.start > 0)
                    this.start = parseInt(this.paginationTable);
                this.limit = this.start + parseInt(this.paginationTable);
            }
        },

        methods: {
            paginate: function(direction) {
                if(direction === 'next') {
                    this.start += parseInt(this.paginationTable);
                    this.limit += parseInt(this.paginationTable);
                }
                else if(direction === 'previous') {
                    this.limit -= parseInt(this.paginationTable);
                    this.start -= parseInt(this.paginationTable);
                }
            },
        },

        filters: {
            paginate: function(array, start, limit) {
                return array.slice(start, limit);
            }
        }

























        // data () {
        //     return {
        //         display: false,
        //
        //         searchKey: '',
        //         currentPage: 1,
        //         itemsPerPage: 10,
        //         resultCount: 0
        //     }
        // },
        //
        // computed: {
        //     totalPages: function () {
        //         return Math.ceil(this.resultCount / this.itemsPerPage)
        //     },
        //
        //     paginate: function () {
        //         if (!this.allInterventions || this.allInterventions.length !== this.allInterventions.length) {
        //             return
        //         }
        //         this.resultCount = this.allInterventions.length;
        //
        //         if (this.currentPage >= this.totalPages) {
        //             this.currentPage = this.totalPages
        //         }
        //         let index = this.currentPage * this.itemsPerPage - this.itemsPerPage;
        //         return this.allInterventions.slice(index, index + this.itemsPerPage)
        //     },
        // },
        //
        // methods: {
        //     setPage: function(pageNumber) {
        //         this.currentPage = pageNumber
        //     }
        // }

    }



</script>

<style src="../../stylesheet/stylesheet.css" scoped></style>