<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">
                        <h5 class="title">Api Token</h5>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>This is your Api token(Press Generate if it's empty)</label>
                                        <label class="form-control">{{api_token}}</label>
                                        <button class="btn btn-info" v-on:click="change">Generate</button>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col">
                                    <h5 class="title">adafruit Key</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Enter your adafruit Key</label>
                                        <input type="text" class="form-control" placeholder="Acces Key"
                                               v-model="adafruit_key">
                                        <button class="btn btn-info" v-on:click="setkey">Enter</button>
                                    </div>
                                </div>
                            </div>
                        </form>
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
            let self = this;
            self.api_token = localStorage.getItem("api_token");
        },

        methods: {
            change: async function (event) {
                event.preventDefault();
                let res = await axios.post('/set_api_token');
                this.api_token = res.data.token;
                localStorage.api_token = res.data.token;
            },
            setkey: async function (event) {
                event.preventDefault();
                let res = await axios.post('/set_adafruit_key', {
                    adafruit_key: this.adafruit_key
                });
                let {data} = res.data;
                localStorage.adafruit_key = this.adafruit_key;
            }
        }
    }

    async function getApiToken(self) {
        let res = await axios.get('/get_api_token');
        if (res.data === '' || res.data === null) {

        } else {
            self.api_token = res.data;
        }
    }

</script>
