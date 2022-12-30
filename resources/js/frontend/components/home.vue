<template>
    <div>
        <div class="row">
            <div class="mainBody col-md-9 mt-3">
                <div class="pmCover">
                    <!-- <vue-image-slider :images="imageArray" :intervalVal=5000 :width="width" :height="height"  /> -->
                    <vue-flux :options="vfOptions" :images="vfImages" :transitions="vfTransitions" ref="slider">
                        <template v-slot:preloader>
                            <flux-preloader />
                        </template>
                        <!-- <template v-slot:caption>
      <flux-caption />
   </template> -->
                        <!-- <template v-slot:controls>
      <flux-controls />
   </template> -->
                        <!-- <template v-slot:pagination>
      <flux-pagination />
   </template> -->
                        <!-- <template v-slot:index>
      <flux-index />
   </template> -->
                    </vue-flux>
                    <!--        <img width="100%" src="assets/img/National-Portal-Card-PM.jpeg" alt=""> --->
                </div>





                <div class="services mt-3">


                    <div class="row">
                        <div class="col-md-12">
                            <h6 class="serviceTitle position-relative defaltColor">
                                সেবা গ্রহণের জন্য রেজিস্ট্রেশন করুন
                            </h6>
                        </div>


                        <router-link class="col-lg-4 mt-3 mb-3 text-center" :to="{ name: 'childApplication' }">
                            <div class="serviceBox">
                                <div class="serviceLogo">
                                    <img src="https://www.uniontax.gov.bd/public/assets/icon/1662995863____49003.png" width="15%" alt="" />
                                </div>
                                <div class="serviceTitle defaltTextColor">
                                    গর্ভকালীন রেজিস্টেশন
                                </div>
                            </div>
                        </router-link>

                        <router-link class="col-lg-4 mt-3 mb-3 text-center" :to="{ name: 'vaxapplication' }">
                            <div class="serviceBox">
                                <div class="serviceLogo">
                                    <img src="https://www.uniontax.gov.bd/public/assets/icon/1662995863____49003.png" width="15%" alt="" />
                                </div>
                                <div class="serviceTitle defaltTextColor">
                                    টিকা রেজিস্ট্রেশন
                                </div>
                            </div>
                        </router-link>
                        <router-link class="col-lg-4 mt-3 mb-3 text-center" :to="{ name: 'childApplication' }">
                            <div class="serviceBox">
                                <div class="serviceLogo">
                                    <img src="https://www.uniontax.gov.bd/public/assets/icon/1662995863____49003.png" width="15%" alt="" />
                                </div>
                                <div class="serviceTitle defaltTextColor">
                                    টিকা কার্ড যাচাই
                                </div>
                            </div>
                        </router-link>


                    </div>







<div class="row">

                         <div class="col-md-12">
                            <h6 class="serviceTitle position-relative defaltColor">
                                প্রসূতি সেবা, ইপিআই টিকা ও জন্মনিবন্ধন সহজীকরণ
                            </h6>
                        </div>
                        <div class="col-md-12">
                            <p>
                                সরকারিভাবে প্রান্তিক পর্যায়ের সকল নারীদের নিরাপদ মাতৃত্ব এবং মা ও নবজাতকের স্বাস্থ্যসেবা নিশ্চিত করার লক্ষ্যে পরিবার পরিকল্পনা বিভাগ কর্তৃক গর্ভবতী মায়েদের গর্ভ ও প্রসবকালীন বিভিন্ন সেবা প্রদান করে থাকে এবং প্রসবোত্তর থেকে ১৫ মাস পর্যন্ত নবজাতক/শিশুকে স্বাস্থ্য অধিদপ্তর কর্তৃক সম্প্রসারিত টিকাদান কর্মসূচি (ইপিআই) এর আওতায় বিসিজি, পেন্টাভ্যালেন্ট, পিসিভি, পোলিও এবং হাম ও রুবেলা টিকা প্রদান করে থাকে। পরবর্তীতে স্থানীয় ইউনিয়ন পরিষদ, পৌরসভা, সিটি কর্পোরেশন অথবা ক্যান্টনমেন্ট বোর্ডের আওতায় জন্ম নেয়া শিশুর তথ্য সংগ্রহ পূর্বক জন্ম ও মৃত্যু নিবন্ধন আইন অনুযায়ী জন্ম নিবন্ধন রেজিস্টারে লিপিবদ্ধ করেন। প্রাথমিকভাবে লিপিবদ্ধকৃত তথ্য অনুযায়ী পরবর্তীতে ইস্যুকৃত জন্ম সনদ একজন ব্যক্তির মৃত্যু পর্যন্ত বয়স প্রমাণের অন্যতম দলিল হিসেবে ব্যবহৃত হয়ে থাকে।তিনটি ভিন্ন ভিন্ন দপ্তর কর্তৃক প্রদানকৃত এ সকল সেবার তথ্য ম্যানুয়ালি/সনাতন পদ্ধতিতে যথাযথভাবে সংরক্ষণ করা সম্ভব হয়না। ফলে, এ তিনটি দপ্তরের তথ্য সংরক্ষণ পদ্ধতি ও সেবাসমূহ সহজীকরণের লক্ষ্যে প্রসূতি মায়ের তথ্য ডিজিটাল প্লাটফর্মে সংরক্ষণ করে একই জায়গা থেকে গর্ভকালীন ও প্রসব সেবা প্রদান, নবজাতকের ইপিআই টিকাদান কর্মসূচি বাস্তবায়নের ডিজিটাল টিকা কার্ড প্রদান এবং ০-৪৫ দিনের মধ্যে জন্ম নিবন্ধন সহজীকরণের জন্য উপজেলা প্রশাসন, তেঁতুলিয়া, পঞ্চগড় এর উদ্যোগে ২০২২-২৩ অর্থ বছরে ‌সৃষ্টি srishti.gov.bd নামক এই অনলাইন প্লাটফর্মটি নির্মাণের উদ্যোগ গ্রহণ করা হয়।
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <side-bar class-name="col-md-3"></side-bar>
        </div>

        <b-modal :id="actionModalhome.id" size="xl" title="ইউনিয়ন নির্বাচন করুন" ok-only>
                    <union-select :custom-url="actionModalhome.title" />
        </b-modal>

    </div>
</template>
<script>
import {
    VueFlux,
    FluxCaption,
    FluxControls,
    FluxIndex,
    FluxPagination,
    FluxPreloader,
} from "vue-flux";
import FlipCard from "./layouts/FlipCard.vue";
export default {
    created() {
        // if (!User.loggedIn()) {
        //     this.$router.push({ name: "/login" });
        // }
    },
    components: {
        VueFlux,
        FluxCaption,
        FluxControls,
        FluxIndex,
        FluxPagination,
        FluxPreloader,
        FlipCard,
    },
    data() {
        return {
            selectedUser: '',
            flipped: false,
            vfOptions: {
                autoplay: true,
            },
            vfImages: [
                this.$asseturl + "assets/img/padmabanner.jpeg",
                // this.$asseturl + "assets/img/slider2.jpg",
                // this.$asseturl + "assets/img/61ed07bbaac6b597183901.jpg",
                // this.$asseturl + "assets/img/slide1.jpeg",
                // this.$asseturl + "assets/img/slide2.jpeg",
                // this.$asseturl+"assets/img/padmabanner.jpeg",
                // this.$asseturl+"assets/img/slide12.jpg",
                // this.$asseturl+"assets/img/slide11.jpg",
                // "/assets/img/slider2.png",
            ],
            vfTransitions: [
                "blinds2d",
                "blinds3d",
                "blocks1",
                "blocks2",
                "book",
                "camera",
                "concentric",
                "cube",
                "explode",
                "fade",
                "fall",
                "kenburn",
                "round1",
                "round2",
                "slide",
                "swipe",
                "warp",
                "waterfall",
                "wave",
                "zip",
            ],
            actionModalhome: {
                id: 'action-modal-home',
                title: '',
                status: '',
                content: {},
                content_id: '',
            }
            //   vfCaptions: [],
        };
    },
    mounted() {
    },
    methods: {

        sendInfo(item, button) {


            this.actionModalhome.title = item;
            this.selectedUser = item;
            this.$root.$emit('bv::show::modal', this.actionModalhome.id, button)

            console.log(item)
        },
    },
};
</script>
<style lang="css" scoped>
a.prev {
    display: none !important;
}

a.next {
    display: none !important;
}
</style>
