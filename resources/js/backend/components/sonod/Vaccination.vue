<template>
    <div>
        <form @submit.stop.prevent="onSubmit">
            <div class="panel-heading"
                style="font-weight: bold; font-size: 20px;background:#159513;text-align:center;color:white">টিকা প্রদান করুন
            </div>
            <div class="form-pannel">

                    <div class="row">

                        <table class="table">
                            <tr>
                                <td >টিকা কেন্দ্রে আসার তারিখসমূহ</td>
                                <td >টিকার ডোস</td>
                                <td >কর্মী</td>
                                <td >কেন্দ্র</td>
                                <td >তারিখ</td>
                                <td >পরবর্তী টিকা গ্রহনের তারিখ</td>
                            </tr>

                            <tr v-for="(tikalist,index) in tikalists" :key="index">
                                <td>{{ index+1+'. '+tikalist.tikaname }}</td>
                                <td>{{ tikalist.tikadose }}</td>
                                <td>{{ tikalist.kormir_name }}</td>
                                <td>{{ tikalist.kendro_name }}</td>
                                <td>{{ tikalist.tikaDate }}</td>
                                <td>{{ tikalist.nextTikaDate }}</td>
                            </tr>

<!--
                            <tr>
                                <td>১। ১ম বার শিশুকে বিসিজি, পােলিও-১, পেন্টা-১ | (ডিপিটি, হেপা-বি, হিব) টিকা
                                    পাওয়ার তারিখ
                                    (পেন্টা-১ এবং হামের ক্যালেন্ডার থেকে)।</td>
                                <td>{{ form.first_dose }}</td>
                            </tr>
                            <tr>
                                <td>২। ২য় বার শিশুকে পােলিও-২, পেন্টা-২ (ডিপিটি,
                                    হেপা-বি, হিব) টিকা দেয়ার জন্য যে তারিখে টিকা
                                    কেন্দ্রে আনতে হবে (সেশন প্ল্যান থেকে)।</td>
                                <td>{{ form.second_dose }}</td>
                            </tr>
                            <tr>
                                <td>৩। ৩য় বার শিশুকে পােলিও-৩, পেন্টা-৩ (ডিপিটি,
                                    হেপা-বি, হিব) টিকা দেয়ার জন্য যে তারিখে টিকা
                                    কেন্দ্রে আনতে হবে (সেশন প্ল্যান থেকে)।</td>
                                <td>{{ form.third_dose }}</td>
                            </tr>
                            <tr>
                                <td>৪। ৪র্থ বার শিশুকে হাম, পােলিও-৪, এবং ভিটামিন-এ
                                    পাওয়ার তারিখ (পেন্টা-১ এবং হামের ক্যালেন্ডার থেকে)।</td>
                                <td>{{ form.forth_dose }}</td>
                            </tr> -->
                        </table>
                </div>

                <div class="row">

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="" class="labelColor">টিকার নাম </label>

                            <multiselect v-model="vax.tikaname" :options="options" :multiple="true" required></multiselect>




                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="" class="labelColor">কত তম টিকা  </label>
                            <select class="form-control" v-model="vax.tikadose" required>
                                <option value="">নির্বাচন করুন</option>
                                <option value="১ম বার">১ম বার</option>
                                <option value="২য় বার">২য় বার</option>
                                <option value="৩য় বার">৩য় বার</option>
                                <option value="৪র্থ বার">৪র্থ বার</option>
                                <option value="৫ম বার">৫ম বার</option>

                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="" class="labelColor">টিকা কেন্দ্রের নাম </label>
                            <input type="text" class="form-control" v-model="vax.kendro_name" required>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="" class="labelColor">স্বাস্থ্য সহকারী/টিকাদান কর্মীর নাম </label>
                            <input type="text" class="form-control" v-model="vax.kormir_name" required readonly >
                        </div>
                    </div>


                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="" class="labelColor">টিকা প্রদানের তারিখ</label>
                            <input type="date" class="form-control" v-model="vax.tikaDate" required readonly>
                        </div>
                    </div>


                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="" class="labelColor">পরবর্তী টিকার তারিখ</label>
                            <input type="date" class="form-control" v-model="vax.nextTikaDate" required>
                        </div>
                    </div>





                </div>

                <div style="text-align:center">
                    <button type="submit" class="btn btn-primary" :disabled="disabled" v-html="buttontex">টিকা প্রদান করুন</button>
                </div>
                <!-- <b-button class="ml-2" @click="resetForm()">রিসেট</b-button> -->
            </div>
        </form>

    </div>
</template>
<script>


export default {





    data() {
        return {
            value: null,
        options: ['বিসিজি', 'পেন্টা (ডিপিটি, হেপ-বি, হিব)', 'ওপিভি', 'পিসিভি', 'আইপিভি', 'এমআর', 'এমআর (হাম ও রুবেলা)'],
            infoModal: {
                id: 'info-modal',
                title: '',
                content: '',
                content_id: '',
            },
            charages: {
                sonod_fee: 0,
                vatAmount: 0,
                taxAmount: 0,
                service: 0,
                totalamount: 0,
            },
            waitForPayment: false,
            submitLoad: false,
            disabled: false,
            sameStatus: '',
            buttontex: 'টিকা প্রদান করুন',
            sonodnamedata: {},
            SonodNamesOptions: {},
            form: {
                id:'',
                first_dose:'',
                second_dose:'',
                third_dose:'',
                forth_dose:'',
            },
            vax:{
                applicantId:'',
                tikaname:'',
                tikadose:'',
                kendro_name:'',
                kormir_name:'',
                tikaDate:'',
                nextTikaDate:'',
            },

            tikalists: {},

            getdivisions: {},
            getdistricts: {},
            getthanas: {},
            getuniouns: {},

            getdivisionsPer: {},
            getdistrictsPer: {},
            getthanasPer: {},
            getuniounsPer: {},
            Pdivision: 7,
            Perdivision: 7,
            applicant_present_district: '',
            applicant_permanent_district: '',
        };
    },

    methods: {


        async getdivisionFun() {
            var res = await this.callApi('get', `/api/getdivisions`, []);
            this.getdivisions = res.data;
        },

        async getdistrictFun() {

            var res = await this.callApi('get', `/api/getdistrict?id=${this.Pdivision}`, []);
            this.getdistricts = res.data;




        },

        async getthanaFun() {
            var res = await this.callApi('get', `/api/getthana?id=${this.applicant_present_district}`, []);
            this.getthanas = res.data;
            var resOwn = await this.callApi('get', `/api/getdistrict?ownid=${this.applicant_present_district}`, []);
            this.form.applicant_present_district = resOwn.data.bn_name

        },

        async getuniounFun() {
            var res = await this.callApi('get', `/api/getunioun?id=${this.thana}`, []);
            this.getuniouns = res.data;
        },



        address() {
            this.getdivisionFun();
        },



        async onSubmit() {
            this.vax.applicantId = this.form.id

            var res = await this.callApi('post', '/api/tikalog', this.vax);

            Notification.customSuccess(`টিকা প্রদান সফল`);
            this.$router.push({ name: 'applicationlist', params:{type:'approved'} })


        },

        async getdata(id) {
            var res = await this.callApi('get', `/api/sonod/single/${id}?admin=true`, []);

            this.form = res.data.sonod

            var res2 = await this.callApi('get', `/api/tikalog?applicantId=${id}`, []);
            this.tikalists = res2.data

                this.buttontex = 'টিকা প্রদান করুন';
                this.vax.tikaDate = this.dateformatGlobal()[0];



        }
    },
    mounted() {
        this.getdata(this.$route.params.id)
        this.address();


        this.vax.kormir_name = this.Users.names

    }
};
</script>
<style  >
.app-heading {
    text-align: center;
    margin: 32px 0;
    font-size: 23px;
    border-bottom: 1px solid #159513;
    color: #ffffff;
    background: #255f95;
}

.form-pannel {
    border: 1px solid #159513;
    padding: 25px 25px 25px 25px;
}

.panel-heading {
    padding: 11px 0px;
    border-top-right-radius: 6px;
    border-top-left-radius: 6px;
    margin-top: 20px;
}

.form-pannel {
    border-bottom-left-radius: 6px;
    border-bottom-right-radius: 6px;
}

.dropdown-menu {
    z-index: 99999;
}

.labelColor {
    color: #493eff;
    font-weight: 600;
}


.multiselect {
    border: 1px solid var(--bgColor2) !important;
    border-radius: 4px;
}


</style>
