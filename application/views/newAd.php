<div class="well well-sm">
  <h3>
    <i class="fa fa-plus fa-fw"></i>
    إضافة اعلان جديد
  </h3>
  <hr>
  <div class="row">
    <div class="col-md-12">
      <form novalidate ng-submit="newAd()">
        <div class="row">
          <div class="col-md-8">
            <div class="form-group">
              <label>عنوان الاعلان</label>
              <input type="text" class="form-control" ng-model="formAd.ads_name" placeholder="عنوان الاعلان" required>
            </div>
          </div>
          <div class="col-md-2">
            <div class="form-group">
              <label>نوع الاعلان</label>
              <select class="form-control" ng-model="formAd.ads_type_id" ng-options="adType.id as adType.name for adType in objects.adTypesObj" required>
                <option value="" disabled selected>الرجاء الاختيار</option>
              </select>
            </div>
          </div>
          <div class="col-md-2">
            <div class="form-group">
              <label>هل تريد نشر هذا الاعلان ؟</label>
              <select class="form-control" ng-model="formAd.ads_publishing" required>
                <option value="1">نعم</option>
                <option value="0">لا</option>
              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label>محتوى الاعلان</label>
              <div text-angular="text-angular" name="ads_description" ng-model="formAd.ads_description" ta-disabled="disabled" required></div>
            </div>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-md-2 col-md-offset-4">
            <button type="submit" class="btn btn-primary btn-sm btn-block"><i class="fa fa-plus"></i>&nbsp;إضافة</button>
          </div>
          <div class="col-md-2">
            <a class="btn btn-success btn-sm btn-block" ui-sref="adsList"><i class="fa fa-ban"></i>&nbsp;إلغاء</a>
          </div>
        </div>
        <br><br>
      </form>
    </div>
  </div>
</div>