<div class="panel panel-primary">
  <div class="panel-heading">
    <div class="row">
      <div class="col-xs-12 col-lg-2">
        <h3 class="panel-title">
          <i class="fa fa-list fa-fw"></i>
          &nbsp;عرض الاعلانات
        </h3>
      </div>
      <div class="col-xs-9 col-lg-5 no-padding">
        <div class="input-group">
          <input type="text" class="form-control input-sm" ng-model="searchName" ng-change="searchByName()" placeholder="بحث..." style="line-height:25px;">
          <div class="input-group-btn">
            <button class="btn btn-default btn-sm"><i class="glyphicon glyphicon-search"></i></button>
          </div>
        </div>
      </div>
      <div class="col-xs-9 col-lg-5 form-inline text-left">
        <a class="btn btn-info btn-sm" ui-sref="adsHideList"><em class="fa fa-eye-slash fa-fw"></em>&nbsp;الاعلانات المخفية</a>
        <a class="btn btn-danger btn-sm" ui-sref="adsDeleteList"><em class="fa fa-pencil fa-fw"></em>&nbsp;الاعلانات المحذوفة</a>
        <a class="btn btn-success btn-sm" ui-sref="newAd"><em class="fa fa-plus fa-fw"></em>&nbsp;اعلان جديد</a>
      </div>
    </div>
  </div>
  <div class="table-responsive">
    <div ng-if="posts.length == 0">
      <div class="alert alert-danger" style="margin:20px;">
        <p class="text-center">
          <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
          عفوا لاتوجد بيانات
        </p>
      </div>
    </div>
    <table ng-if="posts.length" class="table table-striped table-bordered table-hover table-condensed">
      <thead>
        <tr>
          <th class="text-center">ر.ت</th>
          <th>اسم الاعلان</th>
          <th class="text-center">تاريخ الاعلان</th>
          <th class="text-center"><em class="fa fa-cog"></em></th>
        </tr>
      </thead>
      <tbody>
        <tr ng-repeat="post in posts">
          <th class="text-center">{{$index+1}}</th>
          <td>{{post.ads_name}}</td>
          <td class="text-center">{{post.ads_date}}</td> 
          <td class="text-center">
            <a class="btn btn-primary btn-sm" ui-sref="readMore({id:post.id})"><em class="fa fa-info fa-fw"></em>&nbsp;قراءة المزيد</a>
            <a class="btn btn-warning btn-sm" ui-sref="editAd({id:post.id})"><em class="fa fa-pencil"></em></a>
            <a class="btn btn-danger btn-sm" ng-click="showDeleteModel(post.id)"><em class="fa fa-trash"></em></a>
            <a class="btn btn-info btn-sm" ng-click="showHideModel(post.id)"><em class="fa fa-eye-slash"></em></a>
          </td>
        </tr> 
      </tbody> 
    </table>
  </div>
  <div class="panel-footer" ng-show="posts.length">
    <div class="row">
      <div class="col-xs-12 col-md-12 text-center">
        <uib-pagination class="hidden-xs btn-sm" boundary-links="true" rotate="false" max-size="5" total-items="total" ng-model="currentPage" items-per-page="pageSize" ng-change="init()" previous-text="السابق" next-text="التالي" first-text="الاول" last-text="الاخير"></uib-pagination>
      </div>
    </div>
  </div>
</div>