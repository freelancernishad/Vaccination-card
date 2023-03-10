<template>
    <div>
        <loader v-if="preLooding" object="#ff9633" color1="#ffffff" color2="#17fd3d" size="5" speed="2" bg="#343a40"
            objectbg="#999793" opacity="80" name="circular"></loader>
        <div class="breadcrumbs-area">
            <h3>আবেদনের তালিকা</h3>
            <ul>
                <li>
                    <router-link :to="{ name: 'Dashboard' }">Home</router-link>
                </li>
                <li>আবেদনের তালিকা</li>
            </ul>
        </div>



        <div class="card">
            <div class="card-header">
                 <h3>রেজিস্ট্রেশন নাম্বার দিয়ে খুঁজুন</h3>
                 <form @submit.stop.prevent="searchSondId">
                <div class="form-group d-flex" style="width:300px">
                    <input type="text" class="form-control" v-model="sonod_id" >

                    <button type="button" disabled class="btn btn-info" v-if="searching" style="font-size: 22px;margin-left: 11px;">অপেক্ষা করুন</button>
                    <button type="submit" class="btn btn-info" v-else style="font-size: 22px;margin-left: 11px;">খুঁজুন</button>

                </div>
            </form>


                <nav aria-label="Page navigation example" v-if="TotalRows>20">
            <ul class="pagination  justify-content-end">
                <!-- <li class="page-item"><a class="page-link" href="#">Previous</a></li> -->
                <li class="page-item" v-for="(pag,index) in Totalpage" :key="'p'+index" v-if="index==0 && pag.url">
                    <router-link class="page-link"
                        :to="{name:'sonod',params:{name:$route.params.name,type:$route.params.type},query:{page:pag.url.split('?')[1].split('=')[1]}}"
                        v-html="pag.label"></router-link>
                </li>
                <li class="page-item" v-for="(pag,index) in Totalpage" :key="'i'+index"
                    :class="{active:pag.active,'disabled':pag.label=='...'}"
                    v-if="index!=0 && pag.label!='Next &raquo;'">
                    <router-link class="page-link"
                        :to="{name:'sonod',params:{name:$route.params.name,type:$route.params.type},query:{page:pag.label}}"
                        v-html="pag.label"></router-link>
                </li>
                <li class="page-item" v-for="(pag,index) in Totalpage" :key="'l'+index"
                    v-if="pag.label=='Next &raquo;'  && pag.url">
                    <router-link class="page-link"
                        :to="{name:'sonod',params:{name:$route.params.name,type:$route.params.type},query:{page:pag.url.split('?')[1].split('=')[1]}}"
                        v-html="pag.label"></router-link>
                </li>
                <!-- <li class="page-item"><a class="page-link" href="#">Next</a></li> -->
            </ul>
        </nav>

            </div>

            <div class="card-body">
                <table class="table table-hover table-striped sonodTable">
                    <thead class="sonodThead">


                        <tr class="sonodTr" v-if="$route.params.type=='approved'">
                            <th class="sonodTh">রেজিস্ট্রেশন নাম্বার</th>
                            <!-- <th>ইউনিয়ন</th> -->
                            <th class="sonodTh">শিশুর নাম</th>
                            <th class="sonodTh">মাতার নাম</th>
                            <th class="sonodTh">পিতার নাম</th>
                            <th class="sonodTh">গ্রাম/মহল্লা</th>
                            <!-- <th>ন্যাশনাল আইডি</th> -->
                            <!-- <th class="sonodTh">আবেদনের তারিখ</th> -->
                            <th class="sonodTh">কার্যক্রম</th>
                            <!-- <th class="sonodTh">ফি</th> -->
                        </tr>

                        <tr class="sonodTr" v-else>
                            <th class="sonodTh">রেজিস্ট্রেশন নাম্বার</th>
                            <!-- <th>ইউনিয়ন</th> -->
                            <th class="sonodTh">নাম</th>
                            <th class="sonodTh">স্বামীর নাম</th>
                            <th class="sonodTh">গ্রাম/মহল্লা</th>
                            <!-- <th>ন্যাশনাল আইডি</th> -->
                            <!-- <th class="sonodTh">আবেদনের তারিখ</th> -->
                            <th class="sonodTh">কার্যক্রম</th>
                            <!-- <th class="sonodTh">ফি</th> -->
                        </tr>


                    </thead>
                    <tbody class="sonodTbody">

                        <tr class="sonodTr" v-for="(item,index) in items" :key="item.id">
                            <td class="sonodTd">{{ item.id_no }}</td>
                            <!-- <td>{{ item.unioun_name }}</td> -->

                            <td class="sonodTd"><span v-if="$route.params.type=='approved'">{{ item.childs_name }}</span><span v-else>{{ item.name }}</span> </td>

                            <td class="sonodTd"><span v-if="$route.params.type=='approved'">{{ item.name }}</span><span v-else>{{ item.husband_name }}</span></td>

                            <td class="sonodTd"  v-if="$route.params.type=='approved'"><span>{{ item.husband_name }}</span></td>

                            <td class="sonodTd">{{ item.village }}</td>

                            <!-- <td class="sonodTd">{{ dateformatGlobal(item.created_at)[6] }}</td> -->
                            <td class="sonodTd">

                                <router-link size="sm" :to="{ name: editRoute, params: { id: item.id } }" v-if="editRoute != ''" class="btn btn-info mr-1 mt-1">প্রসব অনুমোদন করুন</router-link>


                                <router-link size="sm" :to="{ name: Vaccination, params: { id: item.id } }"
                                    v-if="Vaccination != ''" class="btn btn-success mr-1 mt-1">টিকা প্রদান করুন</router-link>



                                <a size="sm" target="_blank" :href="applicationRoute+'/d/' + item.id"
                                    v-if="applicationRoute != ''" class="btn btn-success mr-1 mt-1">টিকা কার্ড</a>



                                <span size="sm" @click="info(item, index, $event.target)" v-if="viewRoute != ''" class="btn btn-info mr-1 mt-1">আবেদনপত্র দেখুন</span>


                                    <a size="sm" target="_blank"
                                    :href="applicationRoute2+'/d/' + item.id"
                                    v-if="applicationRoute2 != ''" class="btn btn-success mr-1 mt-1">বিস্তারিত</a>

                                <span size="sm"
                                    @click="approve(approveRoute, item.id, approveData, $event.target, approveType,item)"
                                    v-if="approveRoute != '' && item.payment_status == 'Unpaid'"
                                    class="btn btn-success mr-1 mt-1">অনুমোদন</span>
                                <span size="sm"
                                    @click="approve('/api/sonod', item.id, approveData, $event.target, 'apiAction',item)"
                                    v-else-if="approveRoute != '' && item.payment_status == 'Paid'"
                                    class="btn btn-success mr-1 mt-1">অনুমোদন</span>
                                <span size="sm" @click="paynow(payRoute, item.id, $event.target)"
                                    v-if="item.payment_status == 'Unpaid' && item.stutus == 'approved' && payRoute != ''"
                                    class="btn btn-info mr-1 mt-1">ফি পরিশোধ করুন</span>
                                <a :href="'/invoice/d/' + item.id" target="_blank" size="sm"
                                    v-if="item.stutus == 'approved'" class="btn btn-info mr-1 mt-1">রশিদ প্রিন্ট</a>
                                <a :href="'/sonod/d/' + item.id" target="_blank" size="sm"
                                    v-if="item.stutus == 'approved' && item.payment_status == 'Paid'"
                                    class="btn btn-info mr-1 mt-1">সনদ</a>
                                <span size="sm" @click="cancel(cancelRoute, item.id, 'cancel', $event.target)"
                                    v-if="cancelRoute != ''" class="btn btn-danger mr-1 mt-1">বাতিল করুন</span>
                            </td>
                            <!-- <td class="sonodTd" style="background: red;color: white;" v-if="item.payment_status=='Unpaid'">
                                অপরিশোধিত
                            </td>
                            <td class="sonodTd" style="background: green;color: white;" v-else>
                                পরিশোধিত
                            </td> -->
                        </tr>



                    </tbody>
                    <tfoot>

                    </tfoot>
                </table>
                <!-- <approve-component></approve-component> -->
            </div>
            <div class="card-footer">

                <nav aria-label="Page navigation example" v-if="TotalRows>20">
            <ul class="pagination  justify-content-end">
                <!-- <li class="page-item"><a class="page-link" href="#">Previous</a></li> -->
                <li class="page-item" v-for="(pag,index) in Totalpage" :key="'p'+index" v-if="index==0 && pag.url">
                    <router-link class="page-link"
                        :to="{name:'sonod',params:{name:$route.params.name,type:$route.params.type},query:{page:pag.url.split('?')[1].split('=')[1]}}"
                        v-html="pag.label"></router-link>
                </li>
                <li class="page-item" v-for="(pag,index) in Totalpage" :key="'i'+index"
                    :class="{active:pag.active,'disabled':pag.label=='...'}"
                    v-if="index!=0 && pag.label!='Next &raquo;'">
                    <router-link class="page-link"
                        :to="{name:'sonod',params:{name:$route.params.name,type:$route.params.type},query:{page:pag.label}}"
                        v-html="pag.label"></router-link>
                </li>
                <li class="page-item" v-for="(pag,index) in Totalpage" :key="'l'+index"
                    v-if="pag.label=='Next &raquo;'  && pag.url">
                    <router-link class="page-link"
                        :to="{name:'sonod',params:{name:$route.params.name,type:$route.params.type},query:{page:pag.url.split('?')[1].split('=')[1]}}"
                        v-html="pag.label"></router-link>
                </li>
                <!-- <li class="page-item"><a class="page-link" href="#">Next</a></li> -->
            </ul>
        </nav>
            </div>
        </div>

        <!-- Info modal -->
        <b-modal :id="infoModal.id" size="xl" :title="infoModal.title">


            <div class="row">

<div class="col-md-4"><b>আইডি নং :</b> {{ infoModal.content.id_no }}</div>
<div class="col-md-4"><b>গর্ভবতী মহিলার নাম :</b> {{ infoModal.content.name }}</div>
<div class="col-md-4"><b>স্বামীর নাম :</b> {{ infoModal.content.husband_name }}</div>
<div class="col-md-4"><b>বিভাগ :</b> {{ infoModal.content.division }}</div>
<div class="col-md-4"><b>জেলা :</b> {{ infoModal.content.district }}</div>
<div class="col-md-4"><b>উপজেলা/থানা :</b> {{ infoModal.content.upazila }}</div>
<div class="col-md-4"><b>পোষ্ট অফিস :</b> {{ infoModal.content.post_office }}</div>
<div class="col-md-4"><b>ওয়ার্ড নং :</b> {{ infoModal.content.word_number }}</div>
<div class="col-md-4"><b>গ্রাম/মহল্লা :</b> {{ infoModal.content.village }}</div>
<div class="col-md-4"><b>শেষ মাসিকের তারিখ :</b> {{ infoModal.content.date_of_last_menstrual_period }}</div>
<div class="col-md-4"><b>সম্ভাব্য প্রসবের তারিখ :</b> {{ infoModal.content.probable_date_of_delivery }}</div>
<div class="col-md-4"><b>গ্রাভিড (কত তম গর্ভ) :</b> {{ infoModal.content.how_many_wombs }}</div>
            </div>

            <template #modal-footer>
<div></div>
      </template>

        </b-modal>
        <!-- Info modal -->
        <b-modal :id="actionModal.id" size="xl" :title="actionModal.title" >
            <div v-if="actionModal.title == 'Cancel'">
                <form v-on:submit.prevent="formcancel">
                    <div class="form-group">
                        <label for="">বাতিল এর কারন উল্লেখ করুন</label>
                        <textarea class="form-control" v-model="b.reson" cols="30" rows="10"
                            style="height:100px;resize:none"></textarea>
                    </div>
                    <button type="submit" class="btn btn-info">Not Approve</button>
                </form>
            </div>
            <div v-else>
                <approvetrade :approve-data="actionModal.status" :sonod-id="actionModal.content_id"
                    :Details="actionModal.content" @event-name="sonodList" v-if="SonodName.enname == 'Trade license'">
                </approvetrade>
                <approvesonod :approve-data="actionModal.status" :sonod-id="actionModal.content_id"
                    :Details="actionModal.content" @event-name="sonodList" v-else>
                </approvesonod>
            </div>



            <template #modal-footer>
<div></div>
      </template>
        </b-modal>
    </div>
</template>
<script>
export default {
    computed: {
    },
    created() {
        if (this.$route.params.type == 'cancel') {
            this.fields.push({ key: 'cancedby', label: 'বাতিল করেছে', sortable: true },);
        }
    },
    data() {
        return {
            searching: false,
            preLooding: true,
            nidverify: false,
            dobverify: false,
            buttonLoader: false,
            Type: '',
            sonod_id: '',
            Vaccination: '',
            editRoute: '',
            viewRoute: '',
            cancelRoute: '',
            approveRoute: '',
            approveType: '',
            payRoute: '',
            applicationRoute: '',
            applicationRoute2: '',
            items: [],
            f: {
                paymentType: '',
                district: '',
            },
            b: {
                reson: '',
            },
            infoModal: {
                id: 'info-modal',
                title: '',
                content: {},
                content_id: '',
            },
            prottoyonModal: {
                id: 'prottoyon-modal',
                title: '',
                content: {},
                content_id: '',
            },
            actionModal: {
                id: 'action-modal',
                title: '',
                status: '',
                content: {},
                content_id: '',
            },
            PerPageData: '20',
            TotalRows: '1',
            Totalpage: {},
        }
    },
    watch: {
        '$route': {
            handler(newValue, oldValue) {
                this.uniondata();
                this.sonodList();
            },
            deep: true
        }
    },
    methods: {
        searchSondId() {
            this.sonodList(true, this.sonod_id)
        },
        async paynow(route, id, button) {
            this.preLooding = true
            Swal.fire({
                title: 'আপনি কি নিশ্চিত?',
                text: `আবেদনটির ফি পরিশোধ করা হয়েছে!`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: `হা নিশ্চিত!`,
                cancelButtonText: `বাতিল`
            }).then(async (result) => {
                if (result.isConfirmed) {
                    var res = await this.callApi('get', `${route}/${id}`, []);
                    Notification.customSuccess(`আবেদনটির ফি পরিশোধ করা হয়েছে`);
                    this.sonodList()
                }
            })
        },
        actionAccess() {

            if(this.$route.params.type=='applied'){

                if (localStorage.getItem('position') == 'Admin') {
                    this.editRoute='';
                    this.viewRoute = 'sonodview';
                    this.approveRoute = '';
                    this.approveType = '';
                    this.approveData = ``;
                    this.applicationRoute = '';
                    this.applicationRoute2 = '';
                    this.Vaccination = '';
                }else if (localStorage.getItem('position') == 'Vaccination_workers') {
                    this.editRoute='sonodedit';
                    this.viewRoute = 'sonodview';
                    this.approveRoute = '/api/sonod';
                    this.approveType = 'apiAction';
                    this.approveData = `approved`;
                    this.applicationRoute = '';
                    this.applicationRoute2 = '';
                    this.Vaccination = '';
                }else if (localStorage.getItem('position') == 'Family_planning_worker') {
                    this.editRoute='sonodedit';
                    this.viewRoute = 'sonodview';
                    this.approveRoute = '/api/sonod';
                    this.approveType = 'apiAction';
                    this.approveData = `approved`;
                    this.applicationRoute = '';
                    this.applicationRoute2 = '';
                    this.Vaccination = '';
                } else if (localStorage.getItem('position') == 'Secretary') {
                    this.editRoute='';
                    this.viewRoute = '';
                    this.approveRoute = '';
                    this.approveType = '';
                    this.approveData = '';
                    this.applicationRoute = '';
                    this.applicationRoute2 = '/information';
                    this.Vaccination = '';
                }
            }else if(this.$route.params.type=='approved'){
                // console.log(localStorage.getItem('position'))
                if (localStorage.getItem('position') == 'Admin') {
                    this.editRoute='';
                    this.viewRoute = 'sonodview';
                    this.approveRoute = '';
                    this.approveType = '';
                    this.approveData = ``;
                    this.applicationRoute = '';
                    this.applicationRoute2 = '';
                    this.Vaccination = '';
                }else if (localStorage.getItem('position') == 'Vaccination_workers') {
                    this.editRoute='';
                    this.viewRoute = 'sonodview';
                    this.approveRoute = '/api/sonod';
                    this.approveType = 'apiAction';
                    this.approveData = `approved`;
                    this.applicationRoute = '/card';
                    this.applicationRoute2 = '/information';
                    this.Vaccination = 'Vaccination';
                } else if (localStorage.getItem('position') == 'Family_planning_worker') {
                    this.editRoute='';
                    this.viewRoute = 'sonodview';
                    this.approveRoute = '/api/sonod';
                    this.approveType = 'apiAction';
                    this.approveData = `approved`;
                    this.applicationRoute = '';
                    this.applicationRoute2 = '/information';
                    this.Vaccination = '';
                } else if (localStorage.getItem('position') == 'Secretary') {
                    this.editRoute='';
                    this.viewRoute = '';
                    this.approveRoute = '';
                    this.approveType = '';
                    this.approveData = '';
                    this.applicationRoute = '';
                    this.applicationRoute2 = '/information';
                    this.Vaccination = '';
                }
            }




        },
        async info(item, index, button) {
            console.log(item)
            this.buttonLoader = true;
            this.infoModal.title = `${item.name}`
            this.infoModal.content = item
            this.buttonLoader = false;
            this.$root.$emit('bv::show::modal', this.infoModal.id, button)
        },
        async approve(route, id, status, button, ApproveType, item) {
            // console.log(item.sonod_name)
            if (ApproveType == 'vueAction') {
                this.actionModal.content_id = `${id}`;
                this.actionModal.status = `${status}`;
                this.actionModal.content = item;
                this.actionModal.title  =  `${status}`;
                this.$root.$emit('bv::show::modal', this.actionModal.id, button)
            } else if (ApproveType == 'apiAction') {
                if (this.Users.position == 'Secretary') {
                    this.actionModal.content_id = `${id}`;
                    this.actionModal.status = `${status}`;
                    this.actionModal.title  =  `${status}`;
                    this.actionModal.content = item;
                    this.$root.$emit('bv::show::modal', this.actionModal.id, button)
                } else {
                    this.preLooding = true




                    Swal.fire({
                        title: 'আপনি কি নিশ্চিত?',
                        text: `আবেদনটি অনুমোদন করতে চান!`,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: `হা নিশ্চিত`,
                        cancelButtonText: `বাতিল`
                    }).then(async (result) => {
                        if (result.isConfirmed) {
                            var res = await this.callApi('get', `${route}/${status}/${id}`, []);
                            Notification.customSuccess(`আবেদনটি অনুমদিত হয়েছে!`);
                            this.preLooding = false
                            this.sonodList()
                        } else {
                            this.preLooding = false
                        }
                    })
                }
            }
        },
        async cancel(route, id, status, button) {
            // console.log(id)
            this.actionModal.content_id = `${id}`;
            this.actionModal.title = `Cancel`;
            this.$root.$emit('bv::show::modal', this.actionModal.id, button)
        },
        async formcancel() {
            var id = this.actionModal.content_id;
            this.b['names'] = this.Users.names;
            this.b['user_id'] = this.Users.id;
            this.b['position'] = this.Users.position;
            this.b['unioun'] = localStorage.getItem('unioun');
            this.b['status'] = 'cancel';
            this.b['sonod_id'] = id;
            var res = await this.callApi('post', `${this.cancelRoute}/cancel/${id}`, this.b);
            // console.log(res)
            this.$root.$emit('bv::hide::modal', this.actionModal.id)
            this.sonodList()
            this.actionModal.content_id = ''
            this.actionModal.title = ''
            this.actionModal.content = {}
            this.b = {
                reson: '',
            }
            Notification.customSuccess(`Your data has been Canceled`);
        },
        async uniondata() {
            if (this.$route.params.name) {
                var res = await this.callApi('get', `/api/get/sonodname/list?data=${this.$route.params.name.replaceAll('_', ' ')}`, []);
                this.$store.commit('setUpdateSonodName', res.data)
            }
        },

        async sonodList(auto = false, sondId = '') {

            if (!auto) this.preLooding = true
            var page = 1;
            if (this.$route.query.page) page = this.$route.query.page;

                var stutus = '';
                var payment_status = '';
                if (this.$route.params.type == 'new') {
                    stutus = 'Pending'
                    if (this.$localStorage.getItem('position') == 'super-admin') {
                        stutus = 'Pending'
                    } else if (this.$localStorage.getItem('position') == 'Chairman') {
                        stutus = 'Secretary_approved'
                    } else {
                        stutus = 'Pending'
                    }
                } else if (this.$route.params.type == 'approved') {
                    stutus = 'approved'
                    if (this.$localStorage.getItem('position') == 'Chairman') {
                        stutus = 'approved'
                        payment_status = 'Paid'
                    } else {
                        stutus = 'approved'
                    }
                } else {
                    stutus = this.$route.params.type;
                }
                var unioun = ``
                if (this.$localStorage.getItem('position') == 'Chairman' || this.$localStorage.getItem('position') == 'Secretary') var unioun = `&unioun_name=${localStorage.getItem('unioun')}`
                if (this.$localStorage.getItem('position') == 'Thana_admin') {
                    var unioun = ``
                }
                if (sondId) {
                    var res = await this.callApi('get', `/api/sonod/list?stutus=${this.$route.params.type}&word=${this.$route.params.word}&unioun=${this.$localStorage.getItem('unioun')}&id_no=${sondId}`, []);
                } else {
                    var res = await this.callApi('get', `/api/sonod/list?page=${page}&stutus=${this.$route.params.type}&word=${this.$route.params.word}&unioun=${this.$localStorage.getItem('unioun')}`, []);
                }
                // console.log('sdf')
                // var res = await this.callApi('get', `/api/sonod/list?page=${page}&sonod_name=${this.$route.params.name}${unioun}&filter[stutus]=${stutus}&filter[payment_status]=${payment_status}`, []);
                this.items = res.data.data
                this.TotalRows = `${res.data.total}`;
                console.log(res.data.total)
                this.Totalpage = res.data.links
                if (!auto) window.scrollTo(0, 0);
                if (!auto) this.preLooding = false

            this.actionAccess()
        },
        age(dateOf = '2001-08-25') {
            var dateofbirth = dateOf.split("-");
            var y1 = dateofbirth[0];
            var m1 = dateofbirth[1];
            var d1 = dateofbirth[2];
            var date = new Date();
            var d2 = date.getDate();
            var m2 = 1 + date.getMonth();
            var y2 = date.getFullYear();
            var month = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
            if (d1 > d2) {
                d2 = d2 + month[m2 - 1];
                m2 = m2 - 1;
            }
            if (m1 > m2) {
                m2 = m2 + 12;
                y2 = y2 - 1;
            }
            var d = d2 - d1;
            var m = m2 - m1;
            var y = y2 - y1;
            return y + ' Years ' + m + ' Months ' + d + ' Days ';
        },
    },
    mounted() {
        this.uniondata();

            this.sonodList();

        setInterval(() => {
            this.sonodList(true,this.sonod_id)
        }, 300000);
    }
}
</script>
<style scoped>
th.position-relative {
    font-size: 13px;
}
th {
    font-size: 11px;
}
td {
    font-size: 12px !important;
}
li.page-item.active a {
    color: white !important;
}










@media
only screen and (max-width: 760px),
(min-device-width: 768px) and (max-device-width: 1024px)  {

	/* Force table to not be like tables anymore */
	.sonodTable, .sonodThead, .sonodTbody, .sonodTh, .sonodTd, .sonodTr {
		display: block;
	}

	/* Hide table headers (but not display: none;, for accessibility) */
	.sonodThead .sonodTr {
		position: absolute;
		top: -9999px;
		left: -9999px;
	}

	.sonodTr { border: 1px solid #ccc; }

    .sonodTr:nth-child(odd) {
      background: #ccc;
    }
	.sonodTd {
		/* Behave  like a "row" */
		border: none;
		border-bottom: 1px solid #eee;
		position: relative;
        padding-top: 12px;
    padding-bottom: 12px;
		padding-left: 50%;
	}

	.sonodTd:before {
		/* Now like a table header */
		position: absolute;
		/* Top/left values mimic padding */
		top: 6px;
		left: 6px;
		width: 45%;
		padding-right: 10px;
		white-space: nowrap;
	}

	/*
	Label the data
	*/
	.sonodTd:nth-of-type(1):before { content: "সনদ নাম্বার"; }
	.sonodTd:nth-of-type(2):before { content: "নাম"; }
	.sonodTd:nth-of-type(3):before { content: "পিতার/স্বামীর নাম"; }
	.sonodTd:nth-of-type(4):before { content: "গ্রাম/মহল্লা"; }
	.sonodTd:nth-of-type(5):before { content: "আবেদনের তারিখ"; }
	.sonodTd:nth-of-type(6):before { content: "কার্যক্রম"; }
	.sonodTd:nth-of-type(7):before { content: "ফি"; }

}




</style>
