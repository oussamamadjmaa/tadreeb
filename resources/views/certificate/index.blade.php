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
        background-position: center;
        background-size: contain;
        background-repeat: no-repeat;
        width: 100%;
        height: 100%;
        padding-top: 72mm;
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
                color: #000;
                font-size: 15px;
                line-height: 2rem;
                text-align: center;
            }
           .cert_content ul{
            list-style: none;
           }
           
        </style>
        <div class="cert_content">
            <h3 style="color: #8d1314;">{{$cert_data->text_1 ?? $cert_data_main->text_1}} {{$course->e3tmad->first_name}}</h3>
            <h2>{{$cert_data->text_2 ?? $cert_data_main->text_2}} {{$data['name']}}</h2>
            <h2>{{$cert_data->text_3 ?? $cert_data_main->text_3}} {{$data['course_name']}}</h2>
            <h2>{{$cert_data->text_4 ?? $cert_data_main->text_4}} {{$course->duration}} تدريبية</h2>
            <h2>{{$cert_data->text_5 ?? $cert_data_main->text_5}} {{$course->teachers->first()->name}}</h2>
            <h2 style="padding-top: 12px;">ونتمنى له دوام التوفيق والنجاح</h2>
        </div>
</div>
</body>
</html>