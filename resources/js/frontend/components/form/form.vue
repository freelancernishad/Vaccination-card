<template>
    <div>
        <form @submit.stop.prevent="onSubmit">

            <!-- <div class="panel-heading" style="font-weight: bold; font-size: 20px;background:#159513;text-align:center;color:white">{{ sonodnamedata.bnname }} </div> -->
            <div class="panel-heading"
                style="font-weight: bold; font-size: 20px;background:#159513;text-align:center;color:white">গর্ভকালীন
                রেজিস্টেশন </div>


            <div class="form-pannel">

                <div class="row">






                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="" class="labelColor">আইডি নং<span class="text-danger"></span></label>
                            <input type="text" class="form-control" v-model="form.id_no" required>
                        </div>
                    </div>


                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="" class="labelColor">গর্ভবতী মহিলার নাম<span
                                    class="text-danger"></span></label>
                            <input type="text" class="form-control" v-model="form.name" required>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="" class="labelColor">গর্ভবতী মহিলার জাতীয় পরিচয়পত্র<span
                                    class="text-danger"></span></label>
                            <input type="text" class="form-control" v-model="form.pregnant_woman_nid" required>
                        </div>
                    </div>


                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="" class="labelColor">স্বামীর নাম<span class="text-danger"></span></label>
                            <input type="text" class="form-control" v-model="form.husband_name" required>
                        </div>
                    </div>


                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="" class="labelColor">স্বামীর জাতীয় পরিচয়পত্র<span class="text-danger"></span></label>
                            <input type="text" class="form-control" v-model="form.husband_name_nid" required>
                        </div>
                    </div>




                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="" class="labelColor">মোবাইল নম্বর</label>
                            <input type="text" class="form-control" v-model="form.mobile_no" required>
                        </div>
                    </div>


                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="" class="labelColor">বিভাগ</label>

                            <select class='form-control' name="division" id="division" v-model="Pdivision" @change="getdistrictFun" required>
                                <option value="">বিভাগ নির্বাচন করুন</option>
                                <option v-for="div in getdivisions" :key="div.id" :value="div.id">{{ div.bn_name }}
                                </option>
                            </select>

                            <!-- <input type="text" class="form-control" v-model="form.applicant_present_district"> -->
                        </div>
                    </div>

                    <div class="col-md-4">
                    <div class="form-group">
                        <label for="" class="labelColor">জেলা</label>

                        <select class='form-control' name="district" id="district" v-model="applicant_present_district" @change="getthanaFun" required>
                            <option value="">জেলা নির্বাচন করুন</option>
                            <option v-for="dist in getdistricts" :key="dist.id" :value="dist.id">{{ dist.bn_name }}
                            </option>
                        </select>

                        <!-- <input type="text" class="form-control" v-model="form.applicant_present_district"> -->
                    </div>
                </div>



                <div class="col-md-4">
                    <div class="form-group">
                        <label for="" class="labelColor">উপজেলা/থানা</label>

                        <select class='form-control' name="thana" id="thana" v-model="form.upazila" @change="getuniounFun" required>
                            <option value="">উপজেলা নির্বাচন করুন</option>
                            <option v-for="thana in getthanas" :key="thana.id" :value="thana.bn_name">{{ thana.bn_name
                            }}</option>
                        </select>

                        <!-- <input type="text" class="form-control" v-model="form.applicant_present_Upazila"> -->
                    </div>
                </div>
<!--

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="" class="labelColor">ইউনিয়ন</label>

                        <select class='form-control' name="thana" id="thana" v-model="form.upazila" @change="getuniounFun" required>
                            <option value="">ইউনিয়ন নির্বাচন করুন</option>
                            <option v-for="thana in getthanas" :key="thana.id" :value="thana.bn_name">{{ thana.bn_name
                            }}</option>
                        </select>

                        <!-- <input type="text" class="form-control" v-model="form.applicant_present_Upazila"> -->
                    </div>
                </div> -->


                <div class="col-md-4">
                    <div class="form-group">
                        <label for="" class="labelColor">পোষ্ট অফিস</label>
                        <input type="text" class="form-control" v-model="form.post_office" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="" class="labelColor">ওয়ার্ড নং</label>
                        <select v-model="form.word_number" id="word_no" class="form-control" required>
                            <option value="">ওয়াড নং</option>
                            <option value="1">১</option>
                            <option value="2">২</option>
                            <option value="3">৩</option>
                            <option value="4">৪</option>
                            <option value="5">৫</option>
                            <option value="6">৬</option>
                            <option value="7">৭</option>
                            <option value="8">৮</option>
                            <option value="9">৯</option>

                        </select>
                        <!-- <input type="text" class="form-control" v-model="form.applicant_present_word_number"> -->
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="form-group">
                        <label for="" class="labelColor">গ্রাম/মহল্লা</label>
                        <input type="text" class="form-control" v-model="form.village" required>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="" class="labelColor">শেষ মাসিকের তারিখ</label>
                        <input type="date" class="form-control" v-model="form.date_of_last_menstrual_period" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="" class="labelColor">সম্ভাব্য প্রসবের তারিখ</label>
                        <input type="date" class="form-control" v-model="form.probable_date_of_delivery" required>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="" class="labelColor">গ্রাভিড (কত তম গর্ভ)</label>
                        <input type="number" class="form-control" v-model="form.how_many_wombs" required>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="" class="labelColor">কত তম সন্তান </label>
                        <input type="number" class="form-control" v-model="form.how_many_children" required>
                    </div>
                </div>

                </div>
















                <div style="text-align:center">
                    <b-button type="submit" variant="primary">সাবমিট</b-button>
                </div>
                <!-- <b-button class="ml-2" @click="resetForm()">রিসেট</b-button> -->
            </div>
        </form>
        <!-- Info modal -->
        <b-modal :id="infoModal.id" size="xl" :title="infoModal.title" ok-only ok-disabled no-close-on-esc
            no-close-on-backdrop>


            <div class="row">






<div class="col-md-4"><b>আইডি নং :</b> {{ form.id_no }}</div>
<div class="col-md-4"><b>গর্ভবতী মহিলার নাম :</b> {{ form.name }}</div>
<div class="col-md-4"><b>গর্ভবতী মহিলার জাতীয় পরিচয়পত্র :</b> {{ form.pregnant_woman_nid }}</div>
<div class="col-md-4"><b>স্বামীর নাম :</b> {{ form.husband_name }}</div>
<div class="col-md-4"><b>স্বামীর জাতীয় পরিচয়পত্র :</b> {{ form.husband_name_nid }}</div>
<div class="col-md-4"><b>মোবাইল নম্বর :</b> {{ form.mobile_no }}</div>
<div class="col-md-4"><b>বিভাগ :</b> {{ form.division }}</div>
<div class="col-md-4"><b>জেলা :</b> {{ form.district }}</div>
<div class="col-md-4"><b>উপজেলা/থানা :</b> {{ form.upazila }}</div>
<div class="col-md-4"><b>পোষ্ট অফিস :</b> {{ form.post_office }}</div>
<div class="col-md-4"><b>ওয়ার্ড নং :</b> {{ form.word_number }}</div>
<div class="col-md-4"><b>গ্রাম/মহল্লা :</b> {{ form.village }}</div>
<div class="col-md-4"><b>শেষ মাসিকের তারিখ :</b> {{ form.date_of_last_menstrual_period }}</div>
<div class="col-md-4"><b>সম্ভাব্য প্রসবের তারিখ :</b> {{ form.probable_date_of_delivery }}</div>
<div class="col-md-4"><b>গ্রাভিড (কত তম গর্ভ) :</b> {{ form.how_many_wombs }}</div>



</div>

            <form @submit.stop.prevent="finalSubmit" style="margin-top: 50px;">

                <div class="text-center" style="width:50%;margin:0 auto">
                    <h3>আপনার আবেদনটি সফল করার জন্য Confirm বাটন এ চাপ দিন</h3>
                    <button type="submit" class="btn btn-info" v-if="!submitLoad">Confirm</button>
                    <span class="btn btn-info" v-else-if="submitLoad">Please Wait...</span>
                </div>
            </form>

            <template #modal-footer>
                <div></div>
            </template>

        </b-modal>
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
            submitLoad: false,
            form: {
                id_no:'',
                name:'',
                pregnant_woman_nid:'',
                husband_name:'',
                husband_name_nid:'',
                mobile_no:'',
                division:'',
                district:'',
                upazila:'',
                post_office:'',
                word_number:'',
                village:'',
                date_of_last_menstrual_period:'',
                probable_date_of_delivery:'',
                how_many_wombs:'',
                how_many_children:'',

            },
            getdivisions: {},
            getdistricts: {},
            getthanas: {},
            getuniouns: {},

            Pdivision: '',
            Perdivision: '',
            applicant_present_district: '',
            applicant_permanent_district: '',
        };
    },
    watch: {
        '$route': {
            handler(newValue, oldValue) {
                this.form.year = new Date().getFullYear();
                this.sonodname();
            },
            deep: true
        }
    },

    methods: {


        async getdivisionFun() {
            var res = await this.callApi('get', `/api/getdivisions`, []);
            this.getdivisions = res.data;
        },

        async getdistrictFun() {
            var resdiv = await this.callApi('get', `/api/getdivisions?id=${this.Pdivision}`, []);
            console.log(resdiv)
            this.form.division= resdiv.data.bn_name
            var res = await this.callApi('get', `/api/getdistrict?id=${this.Pdivision}`, []);
            this.getdistricts = res.data;




        },

        async getthanaFun() {
            var res = await this.callApi('get', `/api/getthana?id=${this.applicant_present_district}`, []);
            this.getthanas = res.data;
            var resOwn = await this.callApi('get', `/api/getdistrict?ownid=${this.applicant_present_district}`, []);
            this.form.district = resOwn.data.bn_name

        },

        async getuniounFun() {
            var res = await this.callApi('get', `/api/getunioun?id=${this.thana}`, []);
            this.getuniouns = res.data;
        },




        async onSubmit() {

                this.$root.$emit('bv::show::modal', this.infoModal.id)
        },
        async finalSubmit() {
            this.submitLoad = true;

            var payment_type = this.getunionInfos.payment_type;

            var res = await this.callApi('post', '/api/sonod/submit', this.form);
            var datas = res.data;

                Swal.fire({
                    title: 'অভিনন্দন',
                    text: `আপনার গর্ভকালীন রেজিস্টেশন সফলভাবে দাখিল হয়েছে`,
                    icon: 'success',
                    confirmButtonColor: 'green',
                    confirmButtonText: `Ok`,

                }).then(async (result) => {
                    console.log(result)
                    if (result.isConfirmed) {
                        // this.$root.$emit('bv::hide::modal', 'info-modal')
                        this.$router.push({ name: 'home' })
                    } else if (result.isDenied) {
                        // this.$root.$emit('bv::hide::modal', 'info-modal')
                    } else if (result.isDismissed) {
                        //cancel
                        this.$router.push({ name: 'home' })
                    }
                })
        },
    },
    mounted() {
        this.getdivisionFun();

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
