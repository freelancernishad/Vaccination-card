<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        @page {
            margin: 20px;
            /* background-color:#F3E308; */
        }
        .bodyBg {
            /* background: #F3E308 !important; */
        }
        .logos {
            width: 50px;
        }
        .bgtitle {
            background: #147bdb;
            color: #ffffff;
            font-size: 15px
                /* font-weight: 900; */
        }
        .childInfo {
            padding-top: 10px !important;
        }
        td {
            font-size: 14px;
        }
        .tikatable tr td{
            font-size:11px;
            text-align: center;
        }
        .tikaTips li{
            font-size:11px;
        }
    </style>
</head>
<body style="font-family: 'bangla', sans-serif;">

    <div style="width:46.5%;float: left;padding:1.5%;">

        <table width="100%">
            <tr>
                <td></td>
                <td style="text-align:center">
                    <h2>'সৃষ্টি' ডিজিটাল টিকাদান কার্ড (শিশু)</h2>
                </td>
                <td style="text-align:right"></td>
            </tr>
        </table>

        <p style="text-align:left;font-size:11px;text-align:justify;line-height: 2em;">
            রেজিস্ট্রেশন নং <b><u>{{ int_en_to_bn($row->id_no) }}</u></b> রেজিস্ট্রেশনের তারিখ: <b><u>{{ int_en_to_bn(date('d M. Y', strtotime ($row->created_at))) }}</u></b> <br>
            শিশুর নাম : <b><u>{{ $row->childs_name }}</u></b> লিঙ্গ: <b><u>{{ $row->gender }}</u></b>  জন্ম তারিখ:
            <b><u>{{ $row->date_of_birth }}</u></b> <br>জন্ম নিবন্ধন নং
            <b><u>{{ $row->childBirthNo }}</u></b> <br> মাতার নাম <b><u>{{ $row->name }}</u></b> জাতীয় পরিচয়পত্র নং <b><u>{{ $row->pregnant_woman_nid }}</u></b><br/>

            পিতার নাম <b><u>{{ $row->husband_name }}</u></b>জাতীয় পরিচয়পত্র নং <b><u>{{ $row->husband_name_nid }}</u></b> <br> বাড়ি/জিআর/হোল্ডিং নং <b><u>{{ int_en_to_bn($row->holding_no) }}</u></b> ওয়ার্ড নং <b><u>{{ int_en_to_bn($row->word_number) }}</u></b> গ্রাম/মহল্লা/পাড়া <b><u>{{ $row->village }}</u></b><br/> ইউনিয়ন/জোন <b><u>{{ $row->post_office }}</u></b> উপজেলা/পৌরসভা/সিটি করপােরেশন <b><u>{{ $row->upazila }}</u></b> <br>জেলা <b><u>{{ $row->district }}</u></b> কেন্দ্রের নাম <b><u>@if($bcgFirstDose){{ $bcgFirstDose->kendro_name  }}@endif</u></b> সাব-রক.........<br>স্বাস্থ্য সহকারী/টিকাদান কর্মীর নাম: <b><u>@if($bcgFirstDose){{ $bcgFirstDose->kormir_name  }}@endif</u></b> মোবাইল নম্বর: <b><u>{{ int_en_to_bn($row->mobile_no)  }}</u></b>
        </p>


        <div style="font-size:11px">
            <div style="text-align: center;margin-bottom:0px">নির্দেশনা</div>
            <div style="text-align: center;margin-bottom:0px">সময়সূটি অনুযায়ী সবগুলো টিকা দেয়া শেষ করুন।</div>
            আপনার এলাকায় জন্মের ২৮ দিনের মধ্যে কোন শিশুর মৃত্যু হলে; যে কোন বয়সের কেউ হামে আক্রান্ত হলে; ১৫ বছরের কম বয়সের কোন ছেলে/মেয়ের এক বা একাধিক হাত অথবা পা হঠাৎ থলথলে প্যারালাইসিস হলে অথবা ১ বছরের কম বয়সী কোনো শিশুর জন্মগতভাবে হৃদরোগ, কানে না শোনা, চোখে ছানি, চোখ ছোট বা বড় ইত্যাদি থাকে তাহলে সাথে সাথে নিকটস্থ স্বাস্থ্য কেন্দ্রে নিয়ে যান অথাব স্বাস্থ্যকর্মীকে খবর দিন।
        </div>





<br>
<br>
<br>
<br>




<h4  style="text-align: center;margin-bottom:0px;font-size:14px;margin-top:30px">ডোজ অনুযায়ী শিশুকে টিকা কেন্দ্রে আনতে হবে</h4>

        <table width="100%" class="tikatable" border="1" style="border-collapse:collapse;font-size:11px">
            <tr >
                <td width='75%' colspan="2" >রেজিস্ট্রেশনের সময় শিশুর জন্ম তারিখ অনুযায়ী ১নং, ৪নং ও ৫নং ঘরে পেন্টাভ্যালেন্ট-১/পিসিভি-১, এমআর ১ম ও ২য় ডোজ টিকা পাওয়ার তারিখ টিকার ক্যালেন্ডার থেকে লিখে দিবেন</td>
                <td width="25%">টিকা পাওয়ার তারিখ</td>
            </tr>


            <tr>
                <td width="10%">১ম বার</td>
                <td>বিসিজি, পেন্টা-১, ওপিভি-১, পিসিভি-১ এবং আইপিভি-১ টিকা পাওয়ার তারিখ ('টিকার ক্যালেন্ডার' থেকে)</td>
                <td style="font-size:12px">@if($bcgFirstDose){{ int_en_to_bn( date("d-m-Y",strtotime($bcgFirstDose->nextTikaDate))) }}@endif</td>
            </tr>


            <tr>
                <td width="10%">২য় বার</td>
                <td>পেন্টা-২, ওপিভি-২ এবং পিসিভি-২ টিকা পাওয়ার তারিখ (সেশন প্ল্যান থেকে)</td>
                <td style="font-size:12px">@if($firstDose){{ int_en_to_bn(date("d-m-Y",strtotime($firstDose->nextTikaDate))) }}@endif</td>
            </tr>


            <tr>
                <td width="10%">৩য় বার</td>
                <td>পেন্টা-৩, ওপিভি-৩, পিসিভি-৩ এবং আইপিভি-২ টিকা পাওয়ার তারিখ (সেশন প্ল্যান থেকে)</td>
                <td style="font-size:12px">@if($secondDose){{ int_en_to_bn(date("d-m-Y",strtotime($secondDose->nextTikaDate))) }}@endif</td>
            </tr>


            <tr>
                <td width="10%">৪র্থ বার</td>
                <td>এমআর ১ম ডোজ টিকা পাওয়ার তারিখ ('টিকার ক্যালেন্ডার' থেকে)</td>
                <td style="font-size:12px">@if($thirthDose){{ int_en_to_bn(date("d-m-Y",strtotime($thirthDose->nextTikaDate))) }}@endif</td>
            </tr>

            <tr>
                <td width="10%">৫ম বার</td>
                <td>এমআর ২য় ডোজ টিকা পাওয়ার তারিখ ('টিকার ক্যালেন্ডার' থেকে)</td>
                <td style="font-size:12px">@if($fourthDose){{ int_en_to_bn(date("d-m-Y",strtotime($fourthDose->nextTikaDate))) }}@endif</td>
            </tr>


        </table>

<br>

        <div style="font-size:11px">
            ২নং ঘরে ১ম ডোজ টিকা প্রদানের পর সেশন প্ল্যান অনুযায়ী ২য় ডোজ টিকা নেয়ার জন্য টিকাদান কেন্দ্রে আসার তারিখ লিখে দিবেন। একইভাবে ৩নং ঘরে ৩য় ডোজ টিকা প্রদানের পর সেশন প্ল্যান অনুযায়ী টিকা নেয়ার জন্য টিকাদান কেন্দ্রে আসার তারিখ লিখে দিবেন।
        </div>
<p style="font-size:11px">দায়িত্বপ্রাপ্ত কর্মকর্তার স্বাক্ষর, নাম ও পদবী:</p>
<p style="font-size:11px">মোবাইল নম্বর:</p>

    </div>
    <div style="width:46.5%;float: right;padding:1.5%">
        <table width="100%">
            <tr>
                <td></td>
                <td style="text-align:center">
                    <h2>শিশুদের টিক দিয়ে প্রতিরোধযোগ্য রোগ সমূহ</h2>
                </td>
                <td style="text-align:right"></td>
            </tr>
        </table>

        <div style="font-size:13px;font-weight: 900;text-align:center;font-style: italic;">
            ১। যক্ষা ২। পোলিও ৩। ডিফথেরিয়া ৪। হুপিং কাশি ৫। ধনুষ্টংকার ৬। হেপাটাইটিস-বি ৭। হিমোফাইলাস ইনফ্লেুয়েঞ্জা-বি জনিত রোগ ৮। হাম
            ৯। মিউমোকক্কাল জনিত নিউমোনিয়া ১০। রুবেলা
            </div>

            <ol style="list-style-type: bengali;margin-bottom:0px" class="tikaTips">
                <li>সময়সূটি অনুযায়ী সবগুলো টিকা নিলে আপনার শিশু উপরে বর্ণিত মারাত্মক সংক্রামক রোগসমূহ হতে রক্ষা পাবে।</li>
                <li>সময়সূচি অনুযায়ী টিকা না নিলে আপনার শিশুর মারাত্মক সংক্রামক রোগসমূহের বিরুদ্ধে রোগ প্রতিরোধ ক্ষমতা তৈরি হবে না।</li>
                <li>বিসিজি টিকার নির্দিষ্ট ডোজটি জন্মের পর পরই দেয়া যায়। টিকা দেয়ার পর বিসিজি টিকার স্থানে (বাম বাহুতে) স্বাভাবিকভাবে ঘা হবে এতে ভয়ের কিছু নাই।</li>
                <li>শিশুকে আইপিভি টিকার দুই ডোজ টিকা; ১ম ডোজ ৬ সপ্তাহ/৪২ দিন হলে, ২য় ডোজ ১৪ সপ্তাহ বয়সে দিতে হবে।</li>
                <li>শিশুর বয়স ৬ সপ্তাহ/৪২ দিন হলেই পেন্টাভ্যালেন্ট (ডিপিটি, হেপাটাইটিস-বি, হিব), ওপিভি এবং পিসিভি টিকার ১ম ডোজ দিতে হবে। তারপর কমপক্ষে ৪ সপ্তাহ/২৮ দিনের ব্যবধানে এ সকল টিকার ২য় এবং ৩য় ডোজ দিতে হবে।</li>
                <li>১০ মাসে পড়লেই/২৭০ দিন পূর্ণ হলেই শিশুকে ১ম ডোজ এবং ১৫ মাস বয়স পূর্ণ হলেই ২য় ডোজ এমআর (হাম ও রুবেলা) টিকা দিতে হবে।</li>
                <li>অসুস্থ শিশুকে সাময়িকভাবে টিকা দেয়া যাবেনা। তবে শিশু সুস্থ হওয়ার সাথে সাথে টিকা দিতে হবে এবং সময়সূচি অনুযায়ী সকল টিকা নেয়া শেষ করতে হবে।</li>
                <li>টিকা দিলে সামান্য জ্বর, টিকার স্থানে ব্যথা এবং সাময়িকভাবে টিকা দেয়ার স্থান শক্ত হয়ে যেতে পারে, এতে ভয়ের কিছু নেই।</li>

            </ol>
            <p style="text-align:center;margin-top:0px;font-size:11px">বাস্তবায়নে: স্বাস্থ্য সেবা বিভাগ</p>


            <br>
            <br>






            <h4  style="text-align: center;margin-bottom:0px;font-size:14px">শিশুকে সবগুলো টিকা দেয়ার জন্য কমপক্ষে ৫ বার টিকা কেন্দ্রে নিয়ে আসতে হবে</h4>

        <table width="100%" class="tikatable" border="1" style="border-collapse:collapse;font-size:11px">


            <tr>
                <td rowspan="2">টিকার নাম</td>
                <td colspan="5">টিকা প্রদানের তারিখ</td>
            </tr>

            <tr>
                <td>১ম বার</td>
                <td>২য় বার</td>
                <td>৩য় বার</td>
                <td>৪র্থ বার</td>
                <td>৫ম বার</td>

            </tr>

            <tr>
                <td>বিসিজি</td>
                <td style='font-size:10px'>@if($bcgFirstDose){{ int_en_to_bn( date("d-m-Y",strtotime($bcgFirstDose->tikaDate))) }}@endif</td>
                <td style='font-size:10px'>@if($bcgSecondDose){{ int_en_to_bn( date("d-m-Y",strtotime($bcgSecondDose->tikaDate))) }}@endif</td>
                <td style='font-size:10px'>@if($bcgThirdDose){{ int_en_to_bn( date("d-m-Y",strtotime($bcgThirdDose->tikaDate))) }}@endif</td>
                <td style='font-size:10px'>@if($bcgFourthDose){{ int_en_to_bn( date("d-m-Y",strtotime($bcgFourthDose->tikaDate))) }}@endif</td>
                <td style='font-size:10px'>@if($bcgFifthDose){{ int_en_to_bn( date("d-m-Y",strtotime($bcgFifthDose->tikaDate))) }}@endif</td>
            </tr>

            <tr>
                <td>পেন্টা (ডিপিটি, হেপ-বি, হিব)</td>
                <td style='font-size:10px'>@if($firstDose){{ int_en_to_bn( date("d-m-Y",strtotime($firstDose->tikaDate))) }}@endif</td>
                <td style='font-size:10px'>@if($secondDose){{ int_en_to_bn(date("d-m-Y",strtotime($secondDose->tikaDate))) }}@endif</td>
                <td style='font-size:10px'>@if($thirthDose){{ int_en_to_bn(date("d-m-Y",strtotime($thirthDose->tikaDate))) }}@endif</td>
                <td style='font-size:10px'></td>
                <td style='font-size:10px'></td>
            </tr>

            <tr>
                <td>ওপিভি</td>
                <td style='font-size:10px'>@if($firstDose){{ int_en_to_bn( date("d-m-Y",strtotime($firstDose->tikaDate))) }}@endif</td>
                <td style='font-size:10px'>@if($secondDose){{ int_en_to_bn(date("d-m-Y",strtotime($secondDose->tikaDate))) }}@endif</td>
                <td style='font-size:10px'>@if($thirthDose){{ int_en_to_bn(date("d-m-Y",strtotime($thirthDose->tikaDate))) }}@endif</td>
                <td style='font-size:10px'></td>
                <td style='font-size:10px'></td>
            </tr>

            <tr>
                <td>পিসিভি</td>
                <td style='font-size:10px'>@if($firstDose){{ int_en_to_bn( date("d-m-Y",strtotime($firstDose->tikaDate))) }}@endif</td>
                <td style='font-size:10px'>@if($secondDose){{ int_en_to_bn(date("d-m-Y",strtotime($secondDose->tikaDate))) }}@endif</td>
                <td style='font-size:10px'>@if($thirthDose){{ int_en_to_bn(date("d-m-Y",strtotime($thirthDose->tikaDate))) }}@endif</td>
                <td style='font-size:10px'></td>
                <td style='font-size:10px'></td>
            </tr>
            <tr>
                <td>আইপিভি</td>
                <td style='font-size:10px'>@if($firstDose){{ int_en_to_bn( date("d-m-Y",strtotime($firstDose->tikaDate))) }}@endif</td>
                <td style='font-size:10px'></td>
                <td style='font-size:10px'>@if($thirthDose){{ int_en_to_bn(date("d-m-Y",strtotime($thirthDose->tikaDate))) }}@endif</td>
                <td style='font-size:10px'></td>
                <td style='font-size:10px'></td>
            </tr>

            <tr>
                <td>এমআর (হাম ও রুবেলা)</td>
                <td style='font-size:10px'></td>
                <td style='font-size:10px'></td>
                <td style='font-size:10px'></td>
                <td style='font-size:10px'>@if($fourthDose){{ int_en_to_bn(date("d-m-Y",strtotime($fourthDose->tikaDate))) }}@endif</td>
                <td style='font-size:10px'>@if($fifthDose){{ int_en_to_bn(date("d-m-Y",strtotime($fifthDose->tikaDate))) }}@endif</td>
            </tr>

        </table>



<br>
            <div style="text-align:center;font-size:12px">
                <div style="margin-bottom:0px">টিকা কার্ডটি স্বয়ংক্রিয়ভাবে তৈরি</div>
                <div style="margin-bottom:0px">কার্ডটি যাচাই করতে নিচের কিউআর কোডটি স্ক্যান করুন</div>
            </div>

<br>
            <div style="text-align:center;font-size:12px">
                <div style="margin-bottom:0px">উপজেলা প্রশাসন, তেঁতুলিয়া’র একটি উদ্ভাবনী উদ্যোগ</div>
                <div style="margin-bottom:0px">www.srishtitetulia.gov.bd</div>
            </div>


    </div>
</body>
</html>
