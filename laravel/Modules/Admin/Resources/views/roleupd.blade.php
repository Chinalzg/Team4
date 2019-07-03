@extends('admin::layouts.master')

@section('content')
    <body>
    <div class="panel admin-panel">
        <div class="panel-head"><strong class="icon-reorder"> 修改角色信息</strong></div>
        <form method="post" class="form-x margin-large-top" action="{{'roleUpdate'}}">
            <div class="form-group">
                <div class="label">
                    <label>角色名称：</label>
                </div>
                <div class="field">
                    <input type="text" name="role_name" value="{{$data['role_name']}}" class="input w50"  />
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>拥有权限：</label>
                </div>
                <div class="field">
                  
                    @foreach($info as $k=>$v)
                       
                           
                            
                        <input type="checkbox" name="power_name[]" value="{{$v['id']}}" class="checks" class="par{{$v['id']}}">{{$v['power_name']}}
                          
                      
                      
                        
                      

                        
                      

                   

                    
                    @endforeach
                      
                </div>
            </div>
                      <tr>
        <input type="checkbox" id="checkall"/>
          全选 
         
     


            <div class="form-group">
                <div class="label">
                    <label></label>
                </div>
                <div class="field">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="hidden" name="id" value="{{$data['id']}}">
                    <button class="button bg-green" type="submit">确定</button>
                    <button class="button bg-red" type="reset">重置</button>
                </div>
            </div>
        </form>
    </div>
    </body>
    
<script>
        $("#checkall").click(function(){ 
  $("input[name='power_name[]']").each(function(){
      if (this.checked) {
          this.checked = false;
      }
      else {
          this.checked = true;
      }
  });
})
//           $(".checks").click(function(){ 
//             var id = $(this).val();
//           $(".son"+id).each(function(){
//               if (this.checked) {
//                   this.checked = false;
//               }
//               else {
//                   this.checked = true;
//               }
//   });
// })

</script>
@stop
