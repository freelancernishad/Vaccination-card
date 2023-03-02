<template>
    <div>

        <div class="breadcrumbs-area">
            <h3>আবেদনের তালিকা</h3>
            <ul>
                <li>
                    <router-link :to="{name:'Dashboard'}">ড্যাশবোর্ড</router-link>
                </li>
                <li>আবেদনের তালিকা</li>
            </ul>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">


                            <div class="row">
                                <div class="col-md-12">
                                    <h5 class="card-title">ওয়ার্ডের তালিকা</h5>

                                </div>
                                <div class="col-md-2 col-sm-3 col-4">
                                    <router-link :to="{name:'applicationlist',params:{word:1,type:$route.params.type}}" class="btn btn-info btn-lg">১নং
                                        ওয়ার্ড</router-link>
                                </div>

                                <div class="col-md-2 col-sm-3 col-4">
                                    <router-link :to="{name:'applicationlist',params:{word:2,type:$route.params.type}}" class="btn btn-info btn-lg">২নং
                                        ওয়ার্ড</router-link>
                                </div>

                                <div class="col-md-2 col-sm-3 col-4">
                                    <router-link :to="{name:'applicationlist',params:{word:3,type:$route.params.type}}" class="btn btn-info btn-lg">৩নং
                                        ওয়ার্ড</router-link>
                                </div>

                                <div class="col-md-2 col-sm-3 col-4">
                                    <router-link :to="{name:'applicationlist',params:{word:4,type:$route.params.type}}" class="btn btn-info btn-lg">৪নং
                                        ওয়ার্ড</router-link>
                                </div>

                                <div class="col-md-2 col-sm-3 col-4">
                                    <router-link :to="{name:'applicationlist',params:{word:5,type:$route.params.type}}" class="btn btn-info btn-lg">৫নং
                                        ওয়ার্ড</router-link>
                                </div>

                                <div class="col-md-2 col-sm-3 col-4">
                                    <router-link :to="{name:'applicationlist',params:{word:6,type:$route.params.type}}" class="btn btn-info btn-lg">৬নং
                                        ওয়ার্ড</router-link>
                                </div>


                                <div class="col-md-2 col-sm-3 col-4">
                                    <router-link :to="{name:'applicationlist',params:{word:7,type:$route.params.type}}" class="btn btn-info btn-lg">৭নং
                                        ওয়ার্ড</router-link>
                                </div>


                                <div class="col-md-2 col-sm-3 col-4">
                                    <router-link :to="{name:'applicationlist',params:{word:8,type:$route.params.type}}" class="btn btn-info btn-lg">৮নং
                                        ওয়ার্ড</router-link>
                                </div>


                                <div class="col-md-2 col-sm-3 col-4">
                                    <router-link :to="{name:'applicationlist',params:{word:9,type:$route.params.type}}" class="btn btn-info btn-lg">৯নং
                                        ওয়ার্ড</router-link>
                                </div>

<!--
                                <div class="col-md-2 col-sm-3 col-4">
                                    <a :href="'/holding/tax/invoice/all/list?unioun='+this.$localStorage.getItem('unioun')" class="btn btn-info btn-lg">অপরিশোধিত ট্যাক্স</a>
                                </div> -->












                            </div>
                        </div>
                    </div>
                </div>

            </div>
            </div>
            </div>
</template>

<style scoped>
    a.btn.btn-info.btn-lg {
        font-size: 26px;
        margin: 4px;
    }

    </style>
