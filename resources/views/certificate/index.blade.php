<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

</head>
<body>
    
<style>
    .cert{
        background-image: url('{{$data["cert_image"]}}');
        background-size: 100% 100%;
        background-repeat: no-repeat;
        width: 100%;
        height: 100%;
        padding-top: 57mm;
        position: relative;
    }
</style>
<div class="cert" dir="rtl">
    <style>
            *{
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }
            .cert_content{
                position: relative;
                color: #818181;
                font-size: 15px;
                line-height: 2rem;
                text-align: center;
            }
           .cert_content ul{
            list-style: none;
           }

        </style>
        <div class="cert_content">
            {{-- <h3 style="color: #8d1314;">{{$cert_data->text_1 ?? $cert_data_main->text_1}} {{$course->e3tmad->first_name}}</h3>
            <h2>{{$cert_data->text_2 ?? $cert_data_main->text_2}} {{$data['name']}}</h2>
            <h2>{{$cert_data->text_3 ?? $cert_data_main->text_3}} {{$data['course_name']}}</h2>
            <h2>{{$cert_data->text_4 ?? $cert_data_main->text_4}} {{$course->duration}} تدريبية</h2>
            <h2>{{$cert_data->text_5 ?? $cert_data_main->text_5}} {{$course->teachers->first()->name}}</h2>
            <h2 style="padding-top: 12px;">ونتمنى له دوام التوفيق والنجاح</h2> --}}
            <h1 style="width: 70%; margin: 0 auto;font-size:26.5px;">تشهد الأمانة العامة للمنظمة العربية للهلال الأحمر والصليب الأحمر بأن المشارك/ة</h1>
            <h2 style="color: #000;font-size:25px;padding-top:1rem;">{{$data['name']}}</h2>
            <h1 style="font-size:26.5px;padding-top:1rem;">قد حضر الدورة التدريبية على منصة المنظمة العربية للهلال الأحمر والصليب الأحمر للتدريب بعنوان</h1>
            <h2 style="color: #000;font-size:25px;padding-top:1rem;">{{$data['course_name']}}</h2>
            <h1 style="font-size:26.5px;padding-top:1rem;">(عن بعد) لمدة ({{$course->duration}}) بتاريخ <span dir=ltr>{{$course->start_date}}</span> - <span dir=ltr>{{$course->expire_at}}</span></h1>
        </div>
        <div class="cert_footer" style="margin-top: -16px;margin-right:30mm;">
            <h3 style="color: #000;font-size:23px;"><span style="color: #818181;">تاريخ الإصدار</span> <span dir=ltr>{{$data['date']}}</span></h3>
            <h3 style="color: #000;font-size:23px;padding-top:4px;"><span style="color: #818181;">رقم الشهادة</span> <span dir=ltr>{{$certificate->id}}</span></h3>
            <h3 style="color: #000;font-size:23px;padding-top:-2px;"><span style="color: #818181;">رابط الشهادة</span> <span dir=rtl><a target="_blank" href="{{asset('storage/certificates/'.$certificate->url)}}" style="text-decoration: none; color:#000;">فتح</a></span></h3>
        </div>
        <div  style="margin-top: -52.6mm;margin-right:181mm;">
            <h3 style="color: #000;font-size:23px;padding-top:-2px;"><span style="color: #818181;">المدرب</span> <span dir=rtl>{{$data['teachers']}}</span></h3>
        </div>
        
</div>
</body>
</html>