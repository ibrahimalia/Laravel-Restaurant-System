<template>


                    <div>
                        <form @submit="formSubmit">
                            <input type="text" class="form-control" v-model="name" hidden>
                            <button v-on:click="info()" style="position: absolute" v-bind:class="attribute"  class="btn"><i class="fa fa-thumbs-up"></i>like</button>
                        </form>
                        <pre style="display: none">
                        {{output}}
                        </pre>
                    </div>

</template>

<script>
    export default {
        props: ['id'],
        mounted() {
            console.log('Component mounted.')
        },
        data() {
            return {
                attribute:'',
                name:1,
                output: '',
                x: this.id
            };
        },
        methods: {
            formSubmit(e) {
                e.preventDefault();
                let currentObj = this;
                axios.post('/add', {
                    name: this.name,
                    x:this.id

                })
                    .then(function (response) {
                        currentObj.output = response.data;
                    })
                    .catch(function (error) {
                        currentObj.output = error;
                    });
            },
            'info':function () {
               this.attribute='Disabled';
            }
        }
    }
</script>
