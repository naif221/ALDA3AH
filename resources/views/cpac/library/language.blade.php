@include('cpac/style/header')
@include('cpac/style/slider')

<div id="page-wrapper">
            <div class="row">

@if(session('success'))

@include('cpac.style.success', ['success' => session('success')])
@endif

                <div class="col-lg-12">
                    <h1 class="page-header">المكتبة</h1>

                    
                    <a  class="btn btn-primary"   href="new-languge" >
                   <i class="fa fa-pencil-square-o" aria-hidden="true"></i> اضافة لغة جديدة </a>


<br>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            لغات الكتب
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>الرقم</th>
                                            <th> اللغة</th>
                                            <th>عدد الكتب</th>
                                          <!--  <th>تعديل/حذف</th>-->
                                            </tr>
                                    </thead>
                                    <tbody>
                                    
@foreach($languages as $lang)
                                        <tr class="odd gradeX">
                                        	<td>{{$lang->id}}</td>
                                        	<td>{{$lang->language}}</td>
                                            <td>{{count($lang->books)}}</td>
                                       
                                       
                                           <!-- <td><center>
                                            <a href="" onclick="return confirm('تأكيد الحذف؟')" ><i class="fa fa-trash-o fa-2x" aria-hidden="true"></i></a>
                                            </center>
                                        </td>-->
               
                                        </tr>
@endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                           
                        </div>
                        <!-- /.panel-body -->
                    </div>









                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>



@include('cpac/style/footer')