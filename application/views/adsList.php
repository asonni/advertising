<div class="panel panel-primary">
  <div class="panel-heading">
    <div class="row">
      <div class="col-xs-12 col-lg-2">
        <h3 class="panel-title">عرض الاعلانات</h3>
      </div>
      <div class="col-xs-9 col-lg-9">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="بحث..." style="line-height:25px;">
          <div class="input-group-btn">
            <button class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="table-responsive">
    <table class="table table-striped table-bordered table-hover">
      <thead>
        <tr>
          <th class="text-center">#</th>
          <th>اسم الاعلان</th>
          <th class="text-center">تاريخ الاعلان</th>
          <th class="text-center"><em class="fa fa-cog"></em></th>
        </tr>
      </thead>
      <tbody>
        <tr ng-repeat="post in posts">
          <th class="text-center">{{post.id}}</th>
          <td width="70%">{{post.ads_name}}</td>
          <td width="20%" class="text-center">{{post.ads_date}}</td> 
          <td width="10%" class="text-center">
            <a class="btn btn-info btn-sm" ui-sref="showDesc({id:post.id})"><em class="fa fa-info fa-fw"></em>&nbsp;قراءة المزيد</a>
          </td>
        </tr> 
      </tbody> 
    </table>
  </div>
</div>