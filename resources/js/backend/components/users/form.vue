<template>
    <div>

<div class="breadcrumbs-area">
    <h3>Sonod List</h3>
    <ul>
        <li>
            <router-link :to="{name:'Dashboard'}">Home</router-link>
        </li>
        <li>Sonod List</li>
    </ul>
</div>

    <form class="row" @submit.stop.prevent="onSubmit">


        <div class="form-group col-md-6">
          <label for="">নাম</label>
          <input type="text" v-model="form.names" class="form-control" placeholder="" aria-describedby="helpId">
        </div>


        <div class="form-group col-md-6">
          <label for="">পদবি</label>

          <select v-model="form.position" class="form-control">
            <option value="">নির্বাচন করুন</option>
            <option value="Admin">এডমিন</option>
            <option value="Family_planning_worker">পরিবার পরিকল্পনা কর্মী</option>
            <option value="Vaccination_workers">টিকা কর্মী</option>
            <option value="Secretary">সচিব</option>
          </select>

        </div>




        <div class="form-group col-md-6">
          <label for="">জেলা</label>

          <select v-model="form.district" class="form-control">
            <option selected value="পঞ্চগড়">পঞ্চগড়</option>
          </select>

        </div>


        <div class="form-group col-md-6">
          <label for="">উপজেলা</label>

          <select v-model="form.thana" class="form-control">

            <option value="">উপজেলা নির্বাচন করুন</option>
            <!-- <option value="পঞ্চগড় সদর">পঞ্চগড় সদর</option>
            <option value="দেবীগঞ্জ">দেবীগঞ্জ</option>
            <option value="বোদা">বোদা</option>
            <option value="আটোয়ারী">আটোয়ারী</option> -->
            <option value="তেঁতুলিয়া">তেঁতুলিয়া</option>


          </select>

        </div>


        <div class="form-group col-md-6">
          <label for="">ইউনিয়ন</label>


          <select id="unioun" v-model="form.unioun" class="searchFrom form-control">
            <option value="">ইউনিয়ন নির্বাচন করুন</option>
            <option>বাংলাবান্ধা</option>
            <option>ভজনপুর</option>
            <option>বুড়াবুড়ী</option>
            <option>দেবনগর</option>
            <option>শালবাহান</option>
            <option>তেঁতুলিয়া</option>
            <option>তিরনইহাট</option>
          </select>


        </div>




        <div class="col-md-12" >
                        <div class="form-group">
                            <label for="" >ওয়ার্ড </label>

                        <Checkbox v-for="(opt,keys) in options" :inputId="keys+'word'" :key="keys" :label="opt.name" :inputValue="opt.word" v-model="form.words" />
                    </div>

                    </div>

        <!-- <div class="form-group col-md-6" v-if="form.thana=='পঞ্চগড় সদর'">
          <label for="">ইউনিয়ন</label>
          <select v-model="form.unioun" class="form-control">
            <option value="">ইউনিয়ন নির্বাচন করুন</option> <option>পঞ্চগড় সদর</option><option>সাতমেরা</option><option>অমরখানা</option><option>হাড়িভাসা</option><option>চাকলাহাট</option><option>হাফিজাবাদ</option><option>কামাত কাজল দীঘি</option><option>ধাক্কামারা</option><option>মাগুরা</option><option>গরিনাবাড়ী</option>
          </select>
        </div>


        <div class="form-group col-md-6" v-else-if="form.thana=='দেবীগঞ্জ'">
          <label for="">ইউনিয়ন</label>
          <select v-model="form.unioun" class="form-control">
            <option value="">ইউনিয়ন নির্বাচন করুন</option> <option>চিলাহাটি</option><option>শালডাঙ্গা</option><option>দেবীগঞ্জ সদর</option><option>পামুলী</option><option>সুন্দরদিঘী</option><option>সোনাহার মল্লিকাদহ</option><option>টেপ্রীগঞ্জ</option><option>দন্ডপাল</option><option>দেবীডুবা</option><option>চেংঠী হাজরা ডাঙ্গা</option>
          </select>
        </div>


        <div class="form-group col-md-6" v-else-if="form.thana=='বোদা'">
          <label for="">ইউনিয়ন</label>
          <select v-model="form.unioun" class="form-control">
            <option value="">ইউনিয়ন নির্বাচন করুন</option> <option >ঝলইশাল শিরি</option><option >ময়দান দীঘি</option><option >বেংহারী</option><option >কাজলদীঘি কালিগঞ্জ</option><option >বড়শশী</option><option >চন্দনবাড়ী</option><option >মাড়েয়া বামনহাট</option><option >বোদা</option><option >সাকোয়া</option><option >পাচপীর</option>
          </select>
        </div>


        <div class="form-group col-md-6" v-else-if="form.thana=='আটোয়ারী'">
          <label for="">ইউনিয়ন</label>
          <select v-model="form.unioun" class="form-control">
            <option value="">ইউনিয়ন নির্বাচন করুন</option> <option>মির্জাপুর</option><option>রাধানগর</option><option>তোড়িয়া</option><option>বলরামপুর</option><option>আলোয়াখোয়া</option><option>ধামোর</option>
          </select>
        </div>


        <div class="form-group col-md-6" v-else-if="form.thana=='তেঁতুলিয়া'">
          <label for="">ইউনিয়ন</label>
          <select v-model="form.unioun" class="form-control">
            <option value="">ইউনিয়ন নির্বাচন করুন</option> <option>বাংলাবান্ধা</option><option>ভজনপুর</option><option>ভজনপুর</option><option>বুড়াবুড়ী</option><option>দেবনগর</option><option>শালবাহান</option><option>তেঁতুলিয়া</option><option>তিমাইহাট</option>
          </select>
        </div> -->



        <div class="form-group col-md-6">
          <label for="">ইমেইল</label>
          <input type="text" v-model="form.email" class="form-control" placeholder="" aria-describedby="helpId">
        </div>


        <div class="form-group col-md-6" v-if="!this.$route.params.id">
          <label for="">পাসওয়ার্ড</label>
          <input type="text" v-model="form.password" class="form-control" placeholder="" aria-describedby="helpId">
        </div>



        <div class="form-group col-md-6">
          <label for="">মোবাইল নাম্বার</label>
          <input type="text" v-model="form.phone" class="form-control" placeholder="" aria-describedby="helpId">
        </div>


        <div class="col-md-12">
    <button class="btn btn-info" type="submit">Submit</button>
</div>
    </form>


    </div>
</template>

<script>

import Checkbox from "./Checkbox.vue";

export default {

    components: {
    Checkbox,
  },

    data(){
        return {
            selectedOptions: [],
            options: {
                1:{word:'1',name:'১নং ওয়ার্ড'},
                2:{word:'2',name:'২নং ওয়ার্ড'},
                3:{word:'3',name:'৩নং ওয়ার্ড'},
                4:{word:'4',name:'৪নং ওয়ার্ড'},
                5:{word:'5',name:'৫নং ওয়ার্ড'},
                6:{word:'6',name:'৬নং ওয়ার্ড'},
                7:{word:'7',name:'৭নং ওয়ার্ড'},
                8:{word:'8',name:'৮নং ওয়ার্ড'},
                9:{word:'9',name:'৯নং ওয়ার্ড'},
            },
            form:{
                id:null,
                unioun:null,
                words:[],
                names:'Chairman',
                email:null,
                phone:'01909756552',
                email_verified_at:null,
                password:'uheba21',
                position:'Chairman',
                full_unioun_name:null,
                district:'পঞ্চগড়',
                thana:'তেঁতুলিয়া',
                gram:null,
                word:null,
                description:null,
                image:null,
                status:null,
                role:1,
                remember_token:null,
                created_at:null,
                updated_at:null,
            },
            unions:{},
        }
    },
    methods:{

        async getsonodById(){
           var id =  this.$route.params.id;
            var res = await this.callApi('get', `/api/update/users/${id}`, []);
            this.form = res.data;
        },


        async onSubmit() {

            var res = await this.callApi('post', '/api/update/users', this.form);
             this.$router.push({ name: 'userlist'})
            Notification.customSuccess('User Update Success');

        },



    },
    mounted(){
        if(this.$route.params.id){

            this.getsonodById();
        }



    }
}
</script>



