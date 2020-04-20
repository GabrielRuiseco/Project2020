<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">
                        <h5 class="title">Adafruit</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-3">Sequence1</div>
                            <div class="col-3">Sequence2</div>
                            <div class="col-3">Sequence3</div>
                            <div class="col-3">First Stage</div>
                        </div>
                        <div class="row">
                            <div class="col-3"><Button class="btn btn-info" v-on:click="mix1">Select</Button></div>
                            <div class="col-3"><Button class="btn btn-info" v-on:click="mix2">Select</Button></div>
                            <div class="col-3"><Button class="btn btn-info" v-on:click="mix3">Select</Button></div>
                            <div class="col-3">Select one</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                api_token: null,
                adafruit_key: null
            }
        },
        mounted() {
        },
        methods: {
            mix1:  async function (event) {
                event.preventDefault();
                axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.api_token;
                let res = await axios.get('/api/mix1');
            },
            mix2:  async function (event) {
                event.preventDefault();
                axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.api_token;
                let res = await axios.get('/api/mix2');
            },
            mix3:  async function (event) {
                event.preventDefault();
                axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.api_token;
                let res = await axios.get('/api/mix3');
            },
        }
    }
</script>
