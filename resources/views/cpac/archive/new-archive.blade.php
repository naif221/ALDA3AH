@include('cpac/style/header')
@include('cpac/style/slider')


<div id="page-wrapper">

            <div class="row">
                <div class="col-lg-12">
                <br>
                
<a  class="btn btn-default" onclick="goBack()"> <i class="fa fa-chevron-right" aria-hidden="true"></i> رجوع</a>

</br>
</br>
@if($errors->has('title'))

@include('cpac.style.error' , ['Error' => "يجب أن لا يكون عنوان الملف فارغ."])		
	
@endif
@if($errors->has('file_path'))

@include('cpac.style.error' , ['Error' => "يجب أن ترفق ملف."])		
	
@endif


                    <h1 class="page-header">الصادر</h1>

                    
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          معاملة جديدة
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">

{!! Form::open(['url' => 'new-archive' , 'method' => 'POST' , 'files' => true]) !!}
    



<div class="form-group row">
    <label class="col-sm-2 col-form-label">الرقم</label>
    <div class="col-sm-10">
      <input type="text"  name="numberA" >

    </div>
  </div>


  <div class="form-group row">
    <label class="col-sm-2 col-form-label">الجهه المرسل لها</label>
    <div class="col-sm-10">
      <input type="text"  name="destination" >

    </div>
  </div>

  
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">العنوان</label>
    <div class="col-sm-10">
      <input type="text"  name="title" >

    </div>
  </div>

  

  
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">المحتوى</label>
    <div class="col-sm-10">
    <input type="file" name="file_path" >
    </div>
  </div>

<center>

  <button  class="btn btn-success" ><i class="fa fa-upload" aria-hidden="true"></i>  رفع </button>
  <button  class="btn btn-muted" onclick="goBack()"><i class="fa fa-ban" aria-hidden="true"></i> الغاء</button>

{!! Form::close() !!}

</center>
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>

                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>









@include('cpac/style/footer')