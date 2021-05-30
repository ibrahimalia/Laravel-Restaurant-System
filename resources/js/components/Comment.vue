<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form @submit="formSubmit">
                            <strong>Write comment now:</strong>
                            <textarea class="form-control" v-model="description"></textarea>
                            <br>
                            <button class="btn btn-success">Send Comment ....</button>
                        </form>
                        <pre hidden>
                        {{output}}
                        </pre>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:['id'],
        mounted() {
            console.log('Component mounted.')
        },
        data() {
            return {
                description: '',
                output: '',
                time:this.getTime()

            };
        },
        methods: {
            formSubmit(e) {
                e.preventDefault();
                let currentObj = this;
                axios.post('/comment/{id}', {
                    description: this.description,
                    time:this.time,
                    id:this.id
                })
                    .then(function (response) {
                        currentObj.output = response.data;
                    })
                    .catch(function (error) {
                        currentObj.output = error;
                    });
            },
            getTime(){
                let time= new Date();
                return time.getHours()+':'+time.getMinutes();
            },
        }
    }
</script>
