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
                                <td width='80%'>টিকা কেন্দ্রে আসার তারিখসমূহ</td>
                                <td width="20%">তারিখ</td>
                            </tr>
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
                            </tr>
                        </table>







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
            disabled: true,
            sameStatus: '',
            buttontex: 'টিকা প্রদান করুন',
            sonodnamedata: {},
            SonodNamesOptions: {},
            form: {
                first_dose:'',
                second_dose:'',
                third_dose:'',
                forth_dose:'',
            },

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

            var res = await this.callApi('post', '/api/sonod/update', this.form);
            Notification.customSuccess(`টিকা প্রদান সফল`);
            this.$router.push({ name: 'applicationlist', params:{type:'approved'} })


        },

        async getdata(id) {
            var res = await this.callApi('get', `/api/sonod/single/${id}?admin=true`, []);
            this.form = res.data.sonod

            if(this.form.first_dose && this.form.second_dose && this.form.third_dose && this.form.forth_dose){
                this.disabled = true;
                this.buttontex = 'টিকা দেওয়া সম্পন্ন হয়েছে';
            }else if(this.form.first_dose && this.form.second_dose && this.form.third_dose){
                this.disabled = false;
                this.buttontex = '৪র্থ বারের টিকা প্রদান করুন';
                this.form.forth_dose = this.dateformatGlobal()[3];
            }else if(this.form.first_dose && this.form.second_dose){
                this.disabled = false;
                this.buttontex = '৩য় বারের টিকা প্রদান করুন';
                this.form.third_dose = this.dateformatGlobal()[3];
            }else if(this.form.first_dose){
                this.disabled = false;
                this.buttontex = '২য় বারের টিকা প্রদান করুন';
                this.form.second_dose = this.dateformatGlobal()[3];
            }else{
                this.disabled = false;

                this.buttontex = '১ম বারের টিকা প্রদান করুন';
                this.form.first_dose = this.dateformatGlobal()[3];
            }


        }
    },
    mounted() {
        this.getdata(this.$route.params.id)
        this.address();
    }
};
</script>
<style scoped >
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
</style>
