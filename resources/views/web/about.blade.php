@include('web.navbar')

<br>
<div class="col-lg-12 col-md-12 col-sm-12">
<div class="panel panel-default">
<div class="panel-heading">
    المكتب التعاوني للدعوة و الارشاد بمحافظة عفيف
    </div>
    
    <div class="panel-body twitter-height">
        <div class="table-responsive">
             
             {!! App\About::find(1)->post !!}
             
        </div>
       
    </div>
   
</div>
</div>



@include('web.footer')