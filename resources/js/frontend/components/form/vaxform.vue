<template>
    <div>

        <form @submit.stop.prevent="finalSubmit">
            <div class="panel-heading"
                style="font-weight: bold; font-size: 20px;background:#159513;text-align:center;color:white">টিকা রেজিস্ট্রেশন </div>


            <div class="form-pannel">

                <div class="row">








                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="" class="labelColor">শিশুর নাম<span
                                    class="text-danger"></span></label>
                            <input type="text" class="form-control" v-model="form.childs_name" required>
                        </div>
                    </div>


                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="" class="labelColor">লিঙ্গ<span
                                    class="text-danger"></span></label>
                            <select class="form-control" v-model="form.gender" required>
                                <option value="">নির্বাচন করুন</option>
                                <option>পুরুষ</option>
                                <option>মহিলা</option>
                            </select>
                        </div>
                    </div>


                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="" class="labelColor">জন্ম তারিখ <span
                                    class="text-danger"></span></label>
                            <input type="date" class="form-control" v-model="form.date_of_birth" required>
                        </div>
                    </div>



                    <div class="col-md-2">
                    <div class="form-group">
                        <label for="" class="labelColor">কত তম সন্তান </label>

                        <select class="form-control"  v-model="form.how_many_children" required>
                            <option value="">নির্বাচন করুন</option>
                            <option value="1">১</option>
                            <option value="2">২</option>
                            <option value="3">৩</option>
                            <option value="4">৪</option>
                            <option value="5">৫</option>
                            <option value="6">৬</option>
                            <option value="7">৭</option>
                            <option value="8">৮</option>
                            <option value="9">৯</option>
                            <option value="10">১০</option>
                        </select>




                    </div>
                </div>


                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="labelColor">মাতার নাম<span
                                    class="text-danger"></span></label>
                            <input type="text" class="form-control" v-model="form.name" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="labelColor">মাতার জাতীয় পরিচয়পত্র<span
                                    class="text-danger"></span></label>
                            <input type="text" class="form-control" v-model="form.pregnant_woman_nid" required>
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="labelColor">পিতার নাম<span class="text-danger"></span></label>
                            <input type="text" class="form-control" v-model="form.husband_name" required>
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="labelColor">পিতার জাতীয় পরিচয়পত্র<span class="text-danger"></span></label>
                            <input type="text" class="form-control" v-model="form.husband_name_nid" required>
                        </div>
                    </div>





                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="" class="labelColor">বিভাগ</label>

                            <select class='form-control' id="division" v-model="Pdivision" @change="getdistrictFun" required>
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

                        <select class='form-control' id="district" v-model="applicant_present_district" @change="getthanaFun" required>
                            <option value="">জেলা নির্বাচন করুন</option>
                            <option v-for="dist in getdistricts" :key="dist.id" :value="dist.id">{{ dist.bn_name }}
                            </option>
                        </select>

                        <!-- <input type="text" class="form-control" v-model="form.applicant_present_district"> -->
                    </div>
                </div>



                <div class="col-md-4">
                    <div class="form-group">
                        <label for="" class="labelColor">উপজেলা/পৌরসভা/সিটি কর্পোরেশন</label>

                        <select class='form-control' id="thana" v-model="thana" @change="getuniounFun" required>
                            <option value="">উপজেলা নির্বাচন করুন</option>
                            <option v-for="thana in getthanas" :key="thana.id" :value="thana.id">{{ thana.bn_name
                            }}</option>
                        </select>

                        <!-- <input type="text" class="form-control" v-model="form.applicant_present_Upazila"> -->
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="form-group">
                        <label for="" class="labelColor">ইউনিয়ন/জোন</label>

                        <select class='form-control'  id="thana" v-model="form.union"  required>
                            <option value="">ইউনিয়ন নির্বাচন করুন</option>
                            <option v-for="union in getuniouns" :key="union.id" :value="union.bn_name">{{ union.bn_name
                            }}</option>
                        </select>


                    </div>
                </div>


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
                        <label for="" class="labelColor">বাড়ি/জিআর/হোল্ডিং নং</label>
                        <input type="text" class="form-control" v-model="form.holding_no" required>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="form-group">
                        <label for="" class="labelColor">গ্রাম/পাড়া/মহল্লা</label>
                        <input type="text" class="form-control" v-model="form.village" required>
                    </div>
                </div>






                <div class="col-md-4">
                        <div class="form-group">
                            <label for="" class="labelColor">শিশুর জন্ম নিবন্ধন নং<span class="text-danger"></span></label>
                            <input type="text" class="form-control" v-model="form.childBirthNo" >
                        </div>
                    </div>



                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="" class="labelColor">মোবাইল নম্বর</label>
                            <input type="text" class="form-control" v-model="form.mobile_no" required>
                        </div>
                    </div>

<!--
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="" class="labelColor">টিকা কেন্দ্রের নাম </label>
                        <input type="text" class="form-control" v-model="form.how_many_children" required>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="" class="labelColor">স্বাস্থ্য সহকারী/টিকাদান কর্মীর নাম </label>
                        <input type="text" class="form-control" v-model="form.how_many_children" required>
                    </div>
                </div> -->




                </div>
















                <div style="text-align:center">
                    <button type="submit" class="btn btn-primary">সাবমিট</button>
                </div>
                <!-- <b-button class="ml-2" @click="resetForm()">রিসেট</b-button> -->
            </div>
        </form>
        <!-- Info modal -->

    </div>
</template>
<script>
export default {
    data() {
        return {

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
                union:'',
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
            thana: '',
            applicant_permanent_district: '',
        };
    },


    methods: {


        async getdivisionFun() {
            var res = await this.callApi('get', `/api/getdivisions`, []);
            this.getdivisions = res.data;
        },

        async getdistrictFun() {
            var resdiv = await this.callApi('get', `/api/getdivisions?id=${this.Pdivision}`, []);
            // console.log(resdiv)
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


            var ress = await this.callApi('get', `/api/getthana?ownid=${this.thana}`, []);
            // console.log(ress.data.bn_name);
            this.form.upazila = ress.data.bn_name;
            // this.getuniouns = ress.data;

            var res = await this.callApi('get', `/api/getunioun?id=${this.thana}`, []);
            this.getuniouns = res.data;


        },





        async finalSubmit() {
            console.log('sdf')
            this.submitLoad = true;

            var payment_type = this.getunionInfos.payment_type;
            this.form['status'] = 'approved';

            var res = await this.callApi('post', '/api/sonod/submit?applicationT=tika', this.form);
            var datas = res.data;

                Swal.fire({
                    title: 'অভিনন্দন',
                    text: `আপনার টিকা রেজিস্ট্রেশন সফলভাবে দাখিল হয়েছে`,
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
